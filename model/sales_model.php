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
                     for($i=0;$i<1;$i=$i+1){
                        $tot_quantity[$i] = $tot_quantity[$i] + $quantity;
                     }
                     $tot_quantity;
                     for($i=0;$i<1;$i=$i+1){
                        $tot_quantity1 = $tot_quantity1 + $tot_quantity[$i];
                     }
                
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
        $query = $this->mysqli->query("SELECT items.item_id,items.serial_no,product_list.warrenty,category.category_name,brand.brand_name,model.model_name,model.sales_price FROM items INNER JOIN product_list ON items.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id AND items.item_status=1 ");
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
    
     
    public function insert_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$cheque_no,$recived_date,$due_date,$bank_name,$telephone_no,$serial_no,$email_address,$address){ //nuwan
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
    
      $stmt3 = $this->mysqli->prepare("INSERT INTO  cheque(bill_no,cheque_id,received_date,due_date,bank_name)
      VALUES (?,?,?,?,?)");

     $stmt3->bind_param('sssss',$bill_no,$cheque_no,$recived_date,$due_date,$bank_name);
     $stmt3->execute();

    $stmt4= $this->mysqli->prepare("INSERT INTO  purchase(bill_no,serial_no,cust_id)
     VALUES (?,?,?)");

     $stmt4->bind_param('sss',$bill_no,$serial_no,$cust_id);
     return $stmt4->execute();    
     
    }
    public function insert_cash_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$telephone_no,$serial_no,$email_address,$address){ //nuwan
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
    $stmt3= $this->mysqli->prepare("INSERT INTO  purchase(bill_no,serial_no,cust_id)
     VALUES (?,?,?)");

     $stmt3->bind_param('sss',$bill_no,$serial_no,$cust_id);
     return $stmt3->execute();    
     
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
        $query = $this->mysqli->query("SELECT purchase.bill_no,customer.cust_name,cust_telephone.telephone_no,bill.date_time from bill INNER JOIN purchase ON bill.bill_no=purchase.bill_no INNER JOIN customer ON purchase.cust_id=customer.cust_id INNER JOIN cust_telephone ON customer.cust_id=cust_telephone.cust_id");
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
    
    
}
