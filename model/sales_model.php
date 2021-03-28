<?php
require_once("database.php");

class sales_model
{
    public function __construct() {
        $this->mysqli = database::getInstance()->getConnection();
    }

    public function get_names(){
        $query = $this->mysqli->query("SELECT sup_id,sup_name FROM  supplier ");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
    
     public function get_category_name(){
        $query = $this->mysqli->query("SELECT * FROM  category ");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function get_brand_name(){
        $query = $this->mysqli->query("SELECT * FROM  brand ");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function get_model_name(){
        $query = $this->mysqli->query("SELECT * FROM  model ");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function get_product_id(){
      $query = $this->mysqli->query("SELECT * from product_list order by p_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['p_id'];
            }
            
            return $result;
        
       }
    }

    public function add_new_model($model_name,$quantity,$reorder_level,$sales_price,$specification){
        $stmt=$this->mysqli->prepare("INSERT INTO model (model_name,total_quantity,specification,reorder_level,sales_price)
        VALUES (?,?,?,?,?)"); 
        if($stmt == false){
           return 0;
        }else{
            $stmt->bind_param('sssss',$model_name,$quantity,$specification,$reorder_level,$sales_price);
            return  $stmt->execute();
        }
           
        
    }
    
    public function update_model($model_id,$quantity,$reorder_level,$sales_price,$specification){
        $stmt = $this->mysqli->prepare("UPDATE model SET quantity= ?, specification=?, reorder_level= ? ,  sales_price= ? WHERE model_id=?");
              if($stmt==FALSE)
               return 0;
                 else{
                  $stmt->bind_param('sssss',$quantity,$specification,$reorder_level,$sales_price,$model_id);
                    return $stmt->execute();
                        } 
    }
    
    public function get_model_id($model_name){
        $query = $this->mysqli->query("SELECT model_id FROM  model WHERE model_name='" .$model_name. "'");  
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row;
            }
            return $result;
        }else
        {
            return 0;
        }
    
    }


    public function get_total_quantity($model_id){
    $query = $this->mysqli->query("SELECT total_quantity FROM  model WHERE model_id='" .$model_id. "'");  
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result = $row;
        }
        return $result;
    }else
    {
        return 0;
    }
}








public function add_new_product($category_id, $product_cost, $brand_id, $reorder_level, $model_id, $quantity,$product_status, $product_date, $serial_number,$item_status, $supplier_id,$warranty){

         $stmt=$this->mysqli->prepare("INSERT INTO product_list(product_status,category_id,model_id,brand_id,warrenty) VALUES (?,?,?,?,?)");                                 
        if($stmt == false){
            return 0;
        }else{

              $stmt->bind_param('sssss',$product_status,$category_id,$model_id,$brand_id,$warranty);
               $stmt->execute(); 
                $product_id = $this->get_product_id();
                     $tot_quantity=$this->get_total_quantity($model_id);
                     $tot_quantity1 = array_sum($tot_quantity);
                     $tot_quantity1 = $tot_quantity1 + $quantity;
                     $stmt3 = $this->mysqli->prepare("UPDATE  model SET total_quantity=? WHERE model_id =?");
                     if($stmt3==FALSE)
                         return 0;
                     else{
                         $stmt3->bind_param('ss',$tot_quantity1,$model_id);
                         $stmt3->execute();
                     }

            for($i=0;$i<$quantity;$i+=1){
                $stmt1 = $this->mysqli->prepare("INSERT INTO  items (item_status,serial_no,p_id)
                                        VALUES (?,?,?)");
                        
                $stmt1->bind_param('sss',$item_status,$serial_number[$i],$product_id);
                $stmt1->execute();
               
            }

           $stmt2= $this->mysqli->prepare("INSERT INTO  supplier_product(sup_id,p_id,date,unit_price,quantity)VALUES (?,?,?,?,?)");
              $stmt2->bind_param('sssss',$supplier_id,$product_id,$product_date,$product_cost,$quantity);
                  return $stmt2->execute();

       
           
      }   
    }
    public function view_products(){
        $query = $this->mysqli->query("SELECT items.item_id,items.serial_no,product_list.warrenty,category.category_name,brand.brand_name,model.model_id,model.model_name,model.sales_price FROM items INNER JOIN product_list ON items.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id AND  items.item_status=1 ");
        while ($row = $query->fetch_assoc()) {

               $result[] = $row;
        }
        return $result;
    }

     public function dashbord_search($id){
         $query = $this->mysqli->query("SELECT DISTINCT p_name,model_no,brand_name FROM product where p_name LIKE   '%" . $id . "%'");

         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
     }
    
    
     public function view_search_product($id,$model){

         $query = $this->mysqli->query("SELECT product.p_name,product.quantity,product.brand_name,product.model_no,product.p_cost,product.warranty,item.sales_price FROM product INNER JOIN item ON product.p_id=item.p_id AND product.p_name='" . $id . "' AND product.model_no='" . $model . "'" );
         while ($row = $query->fetch_assoc()) {

             $result[] = $row;
         }
         return $result;
     }
    
     
    public function insert_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$cheque_no,$recived_date,$due_date,$bank_name,$telephone_no,$serial_no,$email_address,$address,$total_items,$item_id,$model_no){ //nuwan
      $stmt=$this->mysqli->prepare("INSERT INTO customer(cust_id,cust_name,email_address,cust_address)
        VALUES (?,?,?,?)");
 
    $stmt->bind_param('ssss',$cust_id,$cust_name,$email_address,$address);
    $stmt->execute();

    $stmt1= $this->mysqli->prepare("INSERT INTO  cust_telephone(cust_id,telephone_no)
         VALUES (?,?)");

         $stmt1->bind_param('ss',$cust_id,$telephone_no);
         $stmt1->execute();
     
         $stmt2 = $this->mysqli->prepare("INSERT INTO bill (bill_no,date_time,amount,payment_method,emp_id) VALUES (?,?,?,?,?)");
      $stmt2->bind_param('sssss',$bill_no,$date_time,$amount,$payment_method,$id);
    $stmt2->execute();
    
     

     for($i=0;$i<$total_items;$i++){ 
     $stmt4 = $this->mysqli->prepare("INSERT INTO  purchase (bill_no,item_id,cust_id)
     VALUES (?,?,?)");

     $stmt4->bind_param('sss',$bill_no,$item_id[$i],$cust_id);
     $stmt4->execute();
     }
     for($j=0;$j<$total_items;$j++){
     $stmt5 = $this->mysqli->prepare("UPDATE  items SET item_status=0 WHERE serial_no=?");  
     $stmt5->bind_param('s',$serial_no[$j]); 
     $stmt5->execute();
    }
   
    $stmt3 = $this->mysqli->prepare("INSERT INTO  cheque(bill_no,cheque_id,received_date,due_date,bank_name)
    VALUES (?,?,?,?,?)");

   $stmt3->bind_param('sssss',$bill_no,$cheque_no,$recived_date,$due_date,$bank_name);
    $stmt3->execute();

   for($j=0;$j<$total_items;$j++){
    $stmt6 = $this->mysqli->prepare("UPDATE model SET model.total_quantity=model.total_quantity-1 WHERE model.model_name=?");  
    $stmt6->bind_param('s',$model_no[$j]); 
    $stmt6->execute();

   }
   return 1;
     
    }
    public function insert_cash_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$telephone_no,$serial_no,$email_address,$address,$total_items,$item_id,$model_no){ //nuwan
        $stmt=$this->mysqli->prepare("INSERT INTO customer(cust_id,cust_name,email_address,cust_address)
        VALUES (?,?,?,?)");
 
    $stmt->bind_param('ssss',$cust_id,$cust_name,$email_address,$address);
    $stmt->execute();

    $stmt1= $this->mysqli->prepare("INSERT INTO  cust_telephone(cust_id,telephone_no)
         VALUES (?,?)");

         $stmt1->bind_param('ss',$cust_id,$telephone_no);
         $stmt1->execute();

         $stmt2 = $this->mysqli->prepare("INSERT INTO bill (bill_no,date_time,amount,payment_method,emp_id) VALUES (?,?,?,?,?)");
         $stmt2->bind_param('sssss',$bill_no,$date_time,$amount,$payment_method,$id);
       $stmt2->execute();
       
    for($i=0;$i<$total_items;$i++){ 
        $stmt3 = $this->mysqli->prepare("INSERT INTO  purchase (bill_no,item_id,cust_id)
        VALUES (?,?,?)");
   
        $stmt3->bind_param('sss',$bill_no,$item_id[$i],$cust_id);
        $stmt3->execute();
        }
        for($j=0;$j<$total_items;$j++){
        $stmt4 = $this->mysqli->prepare("UPDATE  items SET item_status=0 WHERE serial_no=?");  
        $stmt4->bind_param('s',$serial_no[$j]); 
        $stmt4->execute();
       }   
       for($j=0;$j<$total_items;$j++){
        $stmt5 = $this->mysqli->prepare("UPDATE model SET model.total_quantity=model.total_quantity-1 WHERE model.model_name=?");  
        $stmt5->bind_param('s',$model_no[$j]); 
        $stmt5->execute();
    
       }
         return 1;
      
    }

    public function get_cust_id(){ //nuwan
        $query = $this->mysqli->query("SELECT * from customer order by cust_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['cust_id'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "C" . sprintf('%04s', $result);
            return $result;
        }else
        {
            $result = "C0001";

            return $result;
        }
    }
    
     

     public function get_bill_no(){
        $result = "";
        $query = $this->mysqli->query("SELECT * from bill order by bill_no desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['bill_no'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "B" . sprintf('%04s', $result);
            return $result;
        }else
        {
            $result = "B0001";

            return $result;
        }
    }
   public function get_product(){//nuwan
    
        $query = $this->mysqli->query("SELECT * from category");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
   /* public function get_brand_name($id){//new22
        $query = $this->mysqli->query("SELECT brand.brand_name,brand.brand_id FROM brand INNER JOIN product_list ON brand.brand_id=product_list.brand_id AND product_list.category_id='" . $id . "'");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;

    }*/

    public function product_id($serial_no){ //nuwan new
        $query = $this->mysqli->query("SELECT p_id from item WHERE serial_no='" . $serial_no . "'");
  
    }
    public function get_emp_id(){
        $query = $this->mysqli->query("SELECT emp_id from employee order by emp_id desc LIMIT 1");
        while ($row = $query->fetch_assoc()) {
            $result = $row['emp_id'];
        }
      return $result;
    }

    public function view_customers(){
        $query = $this->mysqli->query("SELECT  DISTINCT bill.bill_no,customer.cust_name,cust_telephone.telephone_no,bill.date_time from bill INNER JOIN purchase ON bill.bill_no=purchase.bill_no INNER JOIN customer ON purchase.cust_id=customer.cust_id INNER JOIN cust_telephone ON customer.cust_id=cust_telephone.cust_id");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
      return $result;
    }
     public function add_new_category($category_name){
        $stmt=$this->mysqli->prepare("INSERT INTO category (category_name)
        VALUES (?)");
         if($stmt == false){
             return 0;
               }else{

           $stmt->bind_param('s',$category_name);
         return $stmt->execute();
    }
  }
    public function check_new_category($category_name){
    $query = $this->mysqli->query("SELECT * FROM  category WHERE category_name='" .$category_name. "'");  
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result = 1;
        }
        return $result;
    }else
    {
        return 0;
    }

   } 
     public function check_new_brand($brand_name){
    $query = $this->mysqli->query("SELECT * FROM  brand WHERE brand_name='" .$brand_name. "'");  
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result = 1;
        }
        return $result;
    }else
    {
        return 0;
    }

   }
   
   public function add_new_brand($brand_name){
    $stmt=$this->mysqli->prepare("INSERT INTO brand (brand_name)
    VALUES (?)");
     if($stmt == false){
         return 0;
           }else{

       $stmt->bind_param('s',$brand_name);
     return $stmt->execute();
}
}
public function get_bill_details($id){

    $query = $this->mysqli->query("SELECT purchase.bill_no,customer.email_address,customer.cust_address,customer.cust_name,cust_telephone.telephone_no,cheque.bank_name,cheque.due_date,cheque.received_date,cheque.cheque_id,bill.date_time,bill.amount,bill.payment_method,employee.first_name,model.model_name,brand.brand_name,items.serial_no,model.sales_price,product_list.warrenty,category.category_name from bill INNER JOIN purchase ON bill.bill_no=purchase.bill_no INNER JOIN customer ON purchase.cust_id=customer.cust_id INNER JOIN cust_telephone ON customer.cust_id=cust_telephone.cust_id INNER JOIN cheque ON bill.bill_no=cheque.bill_no INNER JOIN employee ON bill.emp_id=employee.emp_id INNER JOIN items ON purchase.item_id=items.item_id INNER JOIN product_list ON items.p_id=product_list.p_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN category ON product_list.category_id=category.category_id WHERE bill.bill_no='" .$id. "'");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_cashbill_details($id){
    
    $query = $this->mysqli->query("SELECT purchase.bill_no,customer.email_address,customer.cust_address,customer.cust_name,cust_telephone.telephone_no,bill.date_time,bill.amount,bill.payment_method,employee.first_name,model.model_name,brand.brand_name,items.serial_no,model.sales_price,product_list.warrenty,category.category_name from bill INNER JOIN purchase ON bill.bill_no=purchase.bill_no INNER JOIN customer ON purchase.cust_id=customer.cust_id INNER JOIN cust_telephone ON customer.cust_id=cust_telephone.cust_id INNER JOIN employee ON bill.emp_id=employee.emp_id INNER JOIN items ON purchase.item_id=items.item_id INNER JOIN product_list ON items.p_id=product_list.p_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN category ON product_list.category_id=category.category_id WHERE bill.bill_no='" .$id. "'");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_payment_method($id){
    $query = $this->mysqli->query("SELECT payment_method from bill WHERE bill.bill_no='" .$id. "'");
    while ($row = $query->fetch_assoc()) {
        $result = $row['payment_method'];
    }
   return $result;
}
public function get_cheques_details(){
    $query = $this->mysqli->query("SELECT cheque.cheque_id,cheque.bank_name,cheque.due_date,bill.amount,cheque.bill_no from cheque INNER JOIN bill ON cheque.bill_no=bill.bill_no WHERE cheque.cheque_status=1 order by cheque.due_date ASC");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_cheques_details_by_bank(){
    $query = $this->mysqli->query("SELECT cheque.cheque_id,cheque.bank_name,cheque.due_date,bill.amount,cheque.bill_no from cheque INNER JOIN bill ON cheque.bill_no=bill.bill_no WHERE cheque.cheque_status=1 order by cheque.bank_name ASC");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_cheque($cheque_id){
      
    $query = $this->mysqli->query("SELECT cheque.cheque_id,cheque.bank_name,cheque.due_date,cheque.received_date,bill.amount,cheque.bill_no from cheque INNER JOIN bill ON cheque.bill_no=bill.bill_no WHERE cheque.cheque_id='" .$cheque_id. "'");
    while ($row = $query->fetch_assoc()) {
        $result= $row;
    }
   return $result;
}
public function clear_cheque($id){
    $stmt = $this->mysqli->prepare("UPDATE  cheque SET cheque_status=0 WHERE cheque_id=?");  
    $stmt->bind_param('s',$id); 
    return $stmt->execute();
    
}
public function get_model_no($id,$total_items){
    
   
   for($j=0;$j<$total_items;$j++){
    $query = $this->mysqli->query("SELECT model.model_name from items INNER JOIN product_list ON items.p_id=product_list.p_id INNER JOIN model ON product_list.model_id=model.model_id WHERE items.serial_no='" .$id[$j]. "'");
    while ($row = $query->fetch_assoc()) {
        $result[]= $row['model_name'];
    }
   }
   return $result;
}
public function get_sales_price($category,$brand,$model){
    $result = "";
    $query = $this->mysqli->query("SELECT sales_price FROM product_list INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN category ON product_list.category_id=category.category_id WHERE category.category_name='" . $category . "' AND brand.brand_name='".$brand."' AND model.model_name='".$model."'");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result = $row['sales_price'];
        }
        return $result;
    }else
    {
        return 0;
    }
}

public function search_cheque($id){
    $query = $this->mysqli->query("SELECT cheque.cheque_id,cheque.bank_name,cheque.due_date,bill.amount,cheque.bill_no from cheque INNER JOIN bill ON cheque.bill_no=bill.bill_no WHERE (cheque.cheque_id LIKE '%".$id."%' OR cheque.bank_name LIKE '%".$id."%' OR cheque.due_date LIKE '%".$id."%' OR bill.amount LIKE '%".$id."%' OR cheque.bill_no LIKE '%".$id."%') AND cheque.cheque_status=1"); 
    if ($query->num_rows > 0) { 
    while ($row = $query->fetch_assoc()) {
            $result = $row;
        }
        return $result;
    }else
    {
        return 0;
    }
   
} 
public function bill_details_search($row){
    $query = $this->mysqli->query("SELECT  DISTINCT bill.bill_no,customer.cust_name,cust_telephone.telephone_no,bill.date_time from bill INNER JOIN purchase ON bill.bill_no=purchase.bill_no INNER JOIN customer ON purchase.cust_id=customer.cust_id INNER JOIN cust_telephone ON customer.cust_id=cust_telephone.cust_id WHERE bill.bill_no LIKE  '%" . $row . "%'");
    if ($query->num_rows > 0){ 
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
      return $result;
       }
       else
        {
            return 0;
        }
 }
 public function view_products_search($model){
    $query = $this->mysqli->query("SELECT items.item_id,items.serial_no,product_list.warrenty,category.category_name,brand.brand_name,model.model_id,model.model_name,model.sales_price FROM items INNER JOIN product_list ON items.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE items.item_status=1 AND model.model_name LIKE  '%" . $model . "%'");
    if ($query->num_rows > 0){ 
    while ($row = $query->fetch_assoc()) {

           $result[] = $row;
    }
    return $result;
    }
    else
    {
        return 0;
    }

 }

}
