<?php
require_once("database.php");

class inventory_maintain_model
{
    public function __construct() {
        $this->mysqli = database::getInstance()->getConnection();
    }
    public function valid_email($email)
    {
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM  supplier WHERE email_address='" . $email . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['sup_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function valid_name($name){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM supplier WHERE sup_name='" . $name . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['sup_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function getsupid(){


        $query = $this->mysqli->query("SELECT * from supplier order by sup_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['sup_id'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "SUP" . sprintf('%04s', $result);
            return $result;
        }else
        {
            $result = "SUP0001";

            return $result;
        }

    }
    public function supplier_register($sup_id,$name,$address,$mobile_no,$email){
        $stmt = $this->mysqli->prepare("INSERT INTO supplier (sup_id,sup_name,email_address)
                                        VALUES (?,?,?)"); //modified by reshani

        if($stmt == false)
        {
            return 0;
        }else{
            $stmt->bind_param('sss',$sup_id,$name,$email);

            $stmt1 = $this->mysqli->prepare("INSERT INTO sup_address (sup_id,address)
                                        VALUES (?,?)");
            $stmt2 = $this->mysqli->prepare("INSERT INTO sup_telephone (sup_id,telephone_no)
                                        VALUES (?,?)");
            $stmt->execute();
            $stmt1->bind_param('ss',$sup_id,$address);
            $stmt1->execute();
            $stmt2->bind_param('ss',$sup_id,$mobile_no);
            return $stmt2->execute();
        }
    }
        public function get_details1($id){

        $query = $this->mysqli->query("SELECT * FROM  supplier INNER JOIN sup_address ON supplier.sup_id=sup_address.sup_id INNER JOIN sup_telephone ON sup_address.sup_id=sup_telephone.sup_id WHERE sup_name LIKE  '%" . $id . "%' OR email_address LIKE  '%" . $id . "%' OR address LIKE  '%" . $id . "%' OR telephone_no   LIKE  '%" . $id . "%'  ");
           if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }else
        {
            return 0;
        }
    }
  

  public function get_view_details($id){
         $result = "";
         $query = $this->mysqli->query("SELECT * FROM supplier INNER JOIN sup_address ON supplier.sup_id=sup_address.sup_id INNER JOIN sup_telephone ON sup_address.sup_id=sup_telephone.sup_id  AND supplier.sup_id='" . $id . "'");
         //$query = $this->mysqli->query("SELECT * FROM supplier AS s INNER JOIN sup_address AS sa ON s.sup_id=sa.sup_id INNER JOIN sup_telephone AS st ON s.sup_id=st.sup_id INNER JOIN supplier_product AS sp ON s.sup_id=sp.sup_id INNER JOIN product AS p ON sp.p_id=p.p_id AND s.sup_id='".$id."' ");
         while ($row = $query->fetch_assoc()) {
             $result = $row;
         }
         return $result;
     }
    
    public function get_view_supplier_product_details($id){
        $query = $this->mysqli->query("SELECT distinct m.model_name,s.sup_id, p.p_id,c.category_name,b.brand_name
        FROM supplier_product AS sp, supplier AS s, product_list AS p ,category AS c, model AS m, brand AS b 
        WHERE sp.sup_id=s.sup_id AND sp.p_id=p.p_id AND p.category_id=c.category_id AND p.brand_id=b.brand_id AND p.model_id=m.model_id AND s.sup_id='" . $id . "' ");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }   
        return $result;
        }
        else{
            return 0;
        }
    }
    public function get_product_details_search($row){
        //   $result = "";
        //$query = $this->mysqli->query("SELECT DISTINCT * FROM  product INNER JOIN supplier_product ON product.p_id=supplier_product.p_id INNER JOIN item ON product.p_id=item.p_id AND product_status=1 WHERE product.p_name LIKE  '%" . $row . "%' OR product.brand_name LIKE  '%" . $row . "%' OR product.model_no LIKE  '%" . $row . "%' ");
        $query = $this->mysqli->query("SELECT DISTINCT * FROM   product_list INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN supplier_product ON product_list.p_id=supplier_product.p_id INNER JOIN category ON product_list.category_id=category.category_id WHERE category.category_name LIKE  '%" . $row . "%' OR brand.brand_name LIKE  '%" . $row . "%' OR model.model_name LIKE  '%" . $row . "%' ");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }else
        {
            return 0;
        }
    }  

    public function get_view_product_details($id){
       $result = "";
        $query = $this->mysqli->query("SELECT * FROM   product_list INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN supplier_product ON product_list.p_id=supplier_product.p_id INNER JOIN category ON product_list.category_id=category.category_id AND product_list.p_id='" . $id . "'");
        while ($row = $query->fetch_assoc()) {
            $result = $row;
        }
        return $result;
    }

    public function update_product_details($id,$reorder_level,$warranty,$sales_price){
        $stmt = $this->mysqli->prepare("UPDATE product_list INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN supplier_product ON product_list.p_id=supplier_product.p_id  SET model.reorder_level= ? ,  product_list.warranty= ?,  model.sales_price= ?
                                        WHERE product_list.p_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('ssss',$reorder_level,$warranty,$sales_price,$id);
            return $stmt->execute();
        }
    }
     public function display_stockreminders($row){   //reshani  ,view stock reminders
        //$result="";
         $query=$this->mysqli->query("SELECT product_list.p_id,category.category_name,brand.brand_name,model.model_name FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE model.total_quantity<=model.reorder_level  AND category.category_name LIKE  '%" . $row. "%' OR brand.brand_name LIKE  '%" . $row . "%' OR model.model_name LIKE  '%" . $row . "%' GROUP BY model.model_name ");  /*modified*/
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
    public function count_suppliers(){   //reshani
        $query=$this->mysqli->query("SELECT COUNT(sup_id) FROM supplier");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
     }
    public function count_reminder_items(){   //reshani
        $query=$this->mysqli->query("SELECT COUNT(model_id) from model WHERE model.total_quantity<=model.reorder_level");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;   
    }

    public function count_verified_users(){    //reshani
        $query=$this->mysqli->query("SELECT COUNT(emp_id) FROM user_account WHERE user_account.verified!=0");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
    }

    public function count_products(){   //reshani
        $query=$this->mysqli->query("SELECT COUNT(category.category_id) FROM category");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
    }
    public function count_sold_items(){    //reshani
        $query=$this->mysqli->query("SELECT COUNT(purchase.item_id) FROM purchase");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
    }
    public function count_stock_details(){   //reshani
        $query=$this->mysqli->query("SELECT COUNT( DISTINCT product_list.category_id) FROM product_list WHERE product_list.product_status!=0");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
    }
    public function count_check_reminders(){    //reshani
        $query=$this->mysqli->query("SELECT COUNT(cheque.cheque_id) FROM cheque WHERE cheque.cheque_status=1");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;
    }
  

    /*public function count_items(){
        $query=$this->mysqli->query("SELECT COUNT(items.item_id) FROM items");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;
    }*/
    

     public function display_few_stockreminders(){   //reshani  ,view few stock reminders in clerk dashbaord
        // $result="";
   //$query=$this->mysqli->query("SELECT * FROM product WHERE quantity<=reorder_level ORDER BY p_id LIMIT 5");
   $query=$this->mysqli->query("SELECT DISTINCT category.category_name,brand.brand_name FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id  WHERE model.total_quantity<=model.reorder_level  ORDER BY category.category_name LIMIT 4");

         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
    }
    public function display_reminder_suppliers($id){          //nuwan
       // $result="";
        $query=$this->mysqli->query("SELECT supplier.email_address,supplier.sup_name,supplier.sup_id,sup_address.address,product_list.p_id,supplier_product.unit_price FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN sup_address ON supplier_product.sup_id=sup_address.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id WHERE product_list.p_id='" . $id . "'");
        while ($row = $query->fetch_assoc()) {               
            $result[] = $row;
        }
        return $result;
    
    }
    public function diplay_shop_return_items(){       //reshani, display all retrun items
        $query=$this->mysqli->query("SELECT items.serial_no,category.category_name,brand.brand_name,model.model_name,shop_return_items.returned_date,shop_return_items.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN shop_return_items ON items.item_id= shop_return_items.item_id");
        if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
     }else
     {
         return 0;
     }
 }
 public function diplay_cus_return_items(){
    $query=$this->mysqli->query("SELECT items.serial_no,category.category_name,brand.brand_name,model.model_name,customer_return_item.returned_date,customer_return_item.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN customer_return_item ON items.item_id=customer_return_item.item_id");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }else
    {
        return 0;
    }
}
public function display_returnitem($id){          //reshani, display one return item details

   // $result="";
    $query=$this->mysqli->query("SELECT items.item_status,items.serial_no,product_list.p_id,category.category_name,brand.brand_name,model.model_name,items.item_id FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id WHERE items.serial_no='" . $id . "'");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }else
    {
        return 0;
    }

}
public function diplay_shop_return_items_search($id){
    $query=$this->mysqli->query("SELECT items.serial_no,category.category_name,brand.brand_name,model.model_name,shop_return_items.returned_date,shop_return_items.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN shop_return_items ON items.item_id= shop_return_items.item_id WHERE items.serial_no LIKE  '%" . $id . "%' OR category.category_name LIKE  '%" . $id . "%' OR brand.brand_name LIKE  '%" . $id . "%' OR model.model_name LIKE  '%" . $id . "%' OR shop_return_items.returned_date LIKE  '%" . $id . "%'");  
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }else
    {
        return 0;
    }
}
public function diplay_cus_return_items_search($id){
    $query=$this->mysqli->query("SELECT items.serial_no,category.category_name,brand.brand_name,model.model_name,customer_return_item.returned_date,customer_return_item.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN customer_return_item ON items.item_id=customer_return_item.item_id WHERE items.serial_no LIKE  '%" . $id . "%' OR category.category_name LIKE  '%" . $id . "%' OR brand.brand_name LIKE  '%" . $id . "%' OR model.model_name LIKE  '%" . $id . "%' OR customer_return_item.returned_date LIKE  '%" . $id . "%'");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }else
    {
        return 0;
    }
}



    public function shopkeeper_return_items(){        //reshani
        $query=$this->mysqli->query("SELECT  product_list.p_id,category.category_name,brand.brand_name,model.model_name,items.serial_no,items.item_id,items.item_status FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id WHERE items.item_status!=2 AND items.item_status!=3 LIMIT 15");
        while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    public function all_return_items(){
        $query=$this->mysqli->query("SELECT items.serial_no,category.category_name,brand.brand_name,model.model_name,customer_return_item.returned_date,customer_return_item.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN customer_return_item ON items.item_id=customer_return_item.item_id UNION SELECT items.serial_no,category.category_name,brand.brand_name,model.model_name,shop_return_items.returned_date,shop_return_items.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN shop_return_items ON items.item_id= shop_return_items.item_id");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }else
        {
            return 0;
        }
}
    public function get_supid_serial_no($serial_no){   //reshani
        $result="";
        $query=$this->mysqli->query("SELECT supplier.sup_id,items.serial_no FROM  supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN items ON supplier_product.p_id=items.p_id AND items.serial_no LIKE '$serial_no'");
        while ($row = $query->fetch_assoc()) {
            $result= $row['sup_id'];
        }
        return $result;
    }
    public function get_custid_serial_no($serial_no){    //reshani
        $result="";
        $query=$this->mysqli->query("SELECT purchase.cust_id,items.serial_no FROM  purchase INNER JOIN items ON purchase.item_id=items.item_id AND items.serial_no LIKE '$serial_no'");
        while ($row = $query->fetch_assoc()) {
            $result= $row['cust_id'];
        }
        return $result;
    }
    public function get_item_id($serial_no){   //reshani
        $result="";
        $query=$this->mysqli->query("SELECT items.item_id FROM items WHERE items.serial_no='" . $serial_no . "'");
        while ($row = $query->fetch_assoc()) {
            $result= $row['item_id'];
        }
        return $result;
    }

  /*  public function get_supid_serial_no1(){   //reshani
        $query=$this->mysqli->query("SELECT supplier.sup_id,item.serial_no FROM  supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN item ON supplier_product.p_id=item.p_id");
       // $query=$this->mysqli->query("SELECT item.serial_no FROM  supplier_product INNER JOIN item ON supplier_product.p_id=item.p_id");
        while ($row = $query->fetch_assoc()) {
            $result= $row['serial_no'];
        }
        return $result;
    }*/

    public function add_return_item($sup_id,$returned_date,$description,$item_id){   //reshani,add retrun items to shop_return_items_table
        $stmt=$this->mysqli->prepare("INSERT INTO shop_return_items(sup_id,returned_date,description,item_id) VALUES(?,?,?,?)");
        if($stmt==false){
            return 0;
        }else{
            $stmt->bind_param('ssss',$sup_id,$returned_date,$description,$item_id);
            return $stmt->execute();
        
        }
    }
    public function add_customer_return_item($cust_id,$returned_date,$description,$item_id){   //reshani,add retrun items to customer_return_items_table
        $stmt=$this->mysqli->prepare("INSERT INTO customer_return_item(cust_id,returned_date,description,item_id) VALUES(?,?,?,?)");
        if($stmt==false){
            return 0;
        }else{
            $stmt->bind_param('ssss',$cust_id,$returned_date,$description,$item_id);
            return $stmt->execute();
            
        
        }
    }
    public function add_item_status($item_status_shop,$item_id,$model_no){     //reshani  shop retirn item
        $stmt = $this->mysqli->prepare("UPDATE items SET item_status= ? WHERE item_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('ss',$item_status_shop,$item_id);
             $stmt->execute();
        }
        $stmt1 = $this->mysqli->prepare("UPDATE model SET model.total_quantity=model.total_quantity-1 WHERE model.model_name=?");  
        $stmt1->bind_param('s',$model_no); 
       return $stmt1->execute();
    }

    public function add_item_status_cust($item_status_cust,$item_id){  //reshani customer return
        $stmt = $this->mysqli->prepare("UPDATE items SET item_status= ? WHERE item_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('ss',$item_status_cust,$item_id);
             $stmt->execute();
        }
    }
     public function valid_email_address($email_address)        //reshani  ,add customer details
    {
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM  customer WHERE email_address='" . $email_address . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['cust_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }
   /* public function valid_cust_name($cust_name){         //reshani ,add customer details
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM customer WHERE cust_name='" . $cust_name . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['cust_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }
    public function getcustid(){         //reshani ,add customer details
        $query = $this->mysqli->query("SELECT * from customer order by cust_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['cust_id'];
            }

            $result = substr($result, 4, 6);
            $result = (int) $result + 1;
            $result = "CUST" . sprintf('%04s', $result);
            return $result;
        }else
        {
            $result = "CUST0001";

            return $result;
        }

     }
     public function add_customer_details($cust_id,$cust_name,$email_address,$address,$telephone_no){    //reshani
        $stmt = $this->mysqli->prepare("INSERT INTO customer (cust_id,cust_name,email_address,address)
        VALUES (?,?,?,?)");
        //var_dump($stmt);
        if($stmt == false)
        {
            return 0;
        }else{
        $stmt->bind_param('ssss',$cust_id,$cust_name,$email_address,$address);
        $stmt2 = $this->mysqli->prepare("INSERT INTO cust_telephone (cust_id,telephone_no) VALUES (?,?)");
        $stmt->execute();
        $stmt2->bind_param('ss',$cust_id,$telephone_no);
        return $stmt2->execute();
        }

    }   */
   
/*public function delete_reminder_supplier($serial_no,$item_status){      //reshani
        $stmt=$this->mysqli->prepare("UPDATE item SET item.item_status=? WHERE item.serial_no=?");
        if($stmt==false){
            return 0;
        }else{
            $stmt->bind_param('ss',$item_status,$serial_no);
            $stmt->execute();
        }
    }*/

     
      
    

     public function get_delete_product_details($id){
        $result = "";
        $query = $this->mysqli->query("SELECT product.quantity,COUNT(item.serial_no) FROM  product INNER JOIN item ON product.p_id=item.p_id AND product.p_id='" . $id . "'");
        while ($row = $query->fetch_assoc()) {
            $result = $row;
        }
        return $result;
    }
    public function delete_product_details($id,$quantity,$count_serial_number,$value){
        if($quantity<$count_serial_number){

            $stmt = $this->mysqli->prepare("UPDATE product INNER JOIN item ON product.p_id =item.p_id  SET  product.product_status= ?,  item.item_status= ? 
                                        WHERE product.p_id=?");
            if($stmt==FALSE)
                return 0;
            else{
                $stmt->bind_param('sss',$value,$value,$id);
                return $stmt->execute();
            }

        }else if($quantity==$count_serial_number){
            $stmt = $this->mysqli->prepare("DELETE FROM product WHERE p_id=?");
            if($stmt==FALSE)
                return 0;
            else{
                $stmt->bind_param('s',$id);
                return $stmt->execute();
            }
        }
    }
     public function dashbord_return_search($id){
        $query = $this->mysqli->query("SELECT p_name FROM product INNER JOIN item ON product.p_id=item.p_id where item.serial_no LIKE   '%" . $id . "%'");

        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
            if($result==""){
               return 0;
            }else{
                return $result;
            }
        }
     //   return $result;
    }

    public function dashbord_customer_return_product($id){
        $query = $this->mysqli->query("SELECT p_name FROM bill INNER JOIN purchase ON bill.bill_no=purchase.bill_no INNER JOIN item ON purchase.serial_no=item.serial_no INNER JOIN product ON item.p_id=product.p_id where bill.bill_no LIKE   '%" . $id . "%'");

        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
            if($result==""){
                return 0;
            }else{
                return $result;
            }
        }
    }
    public function update_supplier_details($id,$name,$email,$address,$telephone){
        $stmt = $this->mysqli->prepare("UPDATE supplier AS s INNER JOIN  sup_address AS sa ON s.sup_id=sa.sup_id INNER JOIN sup_telephone AS st ON s.sup_id=st.sup_id SET s.sup_name= ? , s.email_address= ? , sa.address=?, st.telephone_no=? where s.sup_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('sssss',$name,$email,$address,$telephone,$id);
            return $stmt->execute();
        }
    }

     
    public function inbox_supplier($id){
        $query = $this->mysqli->query("SELECT * FROM supplier_reply  WHERE date LIKE  '%" . $id . "%' OR email LIKE  '%" . $id . "%' ");
        if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
     }else
     {
         return 0;
     }
    }

    public function view_categories()
    {
        $query = $this->mysqli->query("SELECT * FROM category");
        while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    public function view_brands()
    {
        $query = $this->mysqli->query("SELECT * FROM brand");
        while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    public function view_models()
    {
        $query = $this->mysqli->query("SELECT * FROM model");
        while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    public function sold_category_count()
    {
        $query = $this->mysqli->query("SELECT category.category_name,count(category_name) as total FROM purchase,items,product_list, category WHERE purchase.item_id=items.item_id AND items.p_id=product_list.p_id AND category.category_id=product_list.category_id group by category_name ");
        while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    
    public function suplier_reply(){
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'projectt541@gmail.com';
        $password = '#project32';

/* try to connect */
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
        $emails = imap_search($inbox,'UNSEEN');

/* if emails are returned, cycle through each... */
        if($emails) {
	
	
	    $output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
  
	foreach($emails as $email_number) {
		
		/* get information specific to this email */
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,2);
		
		/* output the email header information */
  //  	$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
	//	$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
    //    $output.= '<span class="from">'.$overview[0]->from.'</span>';
	//	$output.= '<span class="date">on '.$overview[0]->date.'</span>';
	//	$output.= '</div>';
		
		/* output the email body */
	//	$output.= '<div class="body">'.$message.'</div>';
        $stmt=$this->mysqli->prepare("INSERT INTO supplier_reply(date,email,subject,description)
        VALUES (?,?,?,?)"); 
        if($stmt == false){
           return 0;
        }else{
            $stmt->bind_param('ssss',$overview[0]->date,$overview[0]->from,$overview[0]->subject,$message);
            $stmt->execute();
        }
            
   
	}
   

      
}   


   } 

   public function review_reply(){
    $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
    $username = 'projectt541@gmail.com';
    $password = '#project32';

/* try to connect */
    $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
    $emails = imap_search($inbox,'UNSEEN');

/* if emails are returned, cycle through each... */
    if($emails) {


    $output = '';

/* put the newest emails on top */
rsort($emails);

/* for every email... */

foreach($emails as $email_number) {
    
    /* get information specific to this email */
    $overview = imap_fetch_overview($inbox,$email_number,0);
    $message = imap_fetchbody($inbox,$email_number,2);
    $date=date("Y-m-d");
    /* output the email header information */
//  	$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
//	$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
//    $output.= '<span class="from">'.$overview[0]->from.'</span>';
//	$output.= '<span class="date">on '.$overview[0]->date.'</span>';
//	$output.= '</div>';
    
    /* output the email body */
//	$output.= '<div class="body">'.$message.'</div>';
    $stmt=$this->mysqli->prepare("INSERT INTO feedback(date,email,subject,description)
    VALUES (?,?,?,?)"); 
    if($stmt == false){
       return 0;
    }else{
        $stmt->bind_param('ssss',$date,$overview[0]->from,$overview[0]->subject,$message);
        $stmt->execute();
    }
        

} 

    }
}
public function review_clerk(){
    $query = $this->mysqli->query("SELECT * FROM feedback");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
    return $result;
   }


   
 
   public function view_inbox_email($id){
    $query = $this->mysqli->query("SELECT * FROM supplier_reply  WHERE email_id=".$id." ");
    while ($row = $query->fetch_assoc()) {
        $result = $row;
    }
    return $result;
   }

   public function view_inbox_delete($id){
    $stmt = $this->mysqli->prepare("DELETE FROM supplier_reply WHERE email_id = ?");
   
    if($stmt==false){
        return 0;
    }else{
        $stmt->bind_param("i", $id);
         return  $stmt->execute();
    }
  

   }
   public function get_bills_monthly(){
    $query = $this->mysqli->query("SELECT * FROM bill WHERE MONTH(CURRENT_DATE())-MONTH(bill.date_time)<=1");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function get_products_monthly(){
    $query = $this->mysqli->query("SELECT supplier_product.date,supplier_product.unit_price,supplier_product.quantity,supplier.sup_name,brand.brand_name,category.category_name,model.model_name FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE MONTH(CURRENT_DATE())-MONTH(supplier_product.date)<=1");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function current_stock(){
    $query = $this->mysqli->query("SELECT model.model_name,model.total_quantity,brand.brand_name,category.category_name,product_list.p_id FROM model INNER JOIN product_list ON model.model_id=product_list.model_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}

public function max_min_sales()
{
    $query = $this->mysqli->query("SELECT category.category_name,model.model_name,brand.brand_name, count(model.model_name)as total ,bill.date_time FROM purchase,items,product_list,category,model,bill,brand WHERE purchase.item_id=items.item_id AND items.p_id=product_list.p_id AND category.category_id=product_list.category_id AND model.model_id=product_list.model_id AND purchase.bill_no=bill.bill_no AND product_list.brand_id=brand.brand_id AND MONTH(bill.date_time) = MONTH(CURRENT_DATE()) group by model.model_name ORDER BY total DESC");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function max_sales_with_categories()
{
    $query = $this->mysqli->query("CREATE OR REPLACE VIEW countingmodels AS SELECT items.item_id,items.p_id,purchase.bill_no,product_list.category_id, category.category_name,model.model_id,model.model_name, brand.brand_name, COUNT(model.model_id) as total FROM purchase,items,product_list, category,model,brand WHERE purchase.item_id=items.item_id AND items.p_id=product_list.p_id AND category.category_id=product_list.category_id AND model.model_id=product_list.model_id AND brand.brand_id=product_list.brand_id GROUP BY model.model_id");
    $query2=$this->mysqli->query("SELECT category_name, model_name, brand_name,total
    from countingmodels where total =
    (
      select Max(total)
      from countingmodels as f where f.category_name=countingmodels.category_name
    )
    group by category_name, total, model_name");
    while ($row = $query2->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function min_sales_with_categories()
{
    $query = $this->mysqli->query("CREATE OR REPLACE VIEW countingmodels AS SELECT items.item_id,items.p_id,purchase.bill_no,product_list.category_id, category.category_name,model.model_id,model.model_name, brand.brand_name, COUNT(model.model_id) as total FROM purchase,items,product_list, category,model,brand WHERE purchase.item_id=items.item_id AND items.p_id=product_list.p_id AND category.category_id=product_list.category_id AND model.model_id=product_list.model_id AND brand.brand_id=product_list.brand_id GROUP BY model.model_id");
    $query2=$this->mysqli->query("SELECT category_name, model_name, brand_name,total
    from countingmodels where total =
    (
      select Min(total)
      from countingmodels as f where f.category_name=countingmodels.category_name
    )
    group by category_name, total, model_name");
    while ($row = $query2->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function sold_items_all()
{
    $query = $this->mysqli->query("SELECT category.category_name,model.model_name,brand.brand_name,product_list.p_id, count(model.model_name)as total FROM purchase,items,product_list,category,model,bill,brand WHERE purchase.item_id=items.item_id AND items.p_id=product_list.p_id AND category.category_id=product_list.category_id AND model.model_id=product_list.model_id AND purchase.bill_no=bill.bill_no AND product_list.brand_id=brand.brand_id AND MONTH(bill.date_time) = MONTH(CURRENT_DATE()) group by model.model_name ORDER BY product_list.p_id ASC");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function sold_k(){
    $query = $this->mysqli->query("SELECT product_list.p_id,category.category_name,model.model_name,brand.brand_name,count(model.model_name)as total FROM purchase,items,product_list,category,model,bill,brand WHERE purchase.item_id=items.item_id AND items.p_id=product_list.p_id AND category.category_id=product_list.category_id AND model.model_id=product_list.model_id AND purchase.bill_no=bill.bill_no AND product_list.brand_id=brand.brand_id AND MONTH(bill.date_time) = MONTH(CURRENT_DATE()) group by model.model_name ORDER BY product_list.p_id ASC");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}

public function model_k(){

   $query = $this->mysqli->query("SELECT Column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'model'");


  while ($row = $query->fetch_assoc()) {
    $result[] = $row;
}
return $result;
 
}

public function current_stock_report_download(){
    $query = $this->mysqli->query("SELECT product_list.p_id,category.category_name,brand.brand_name,model.model_name,model.total_quantity FROM model INNER JOIN product_list ON model.model_id=product_list.model_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function get_expences()
{
    $query=$this->mysqli->query("SELECT sum(supplier_product.unit_price * supplier_product.quantity) AS tot FROM supplier_product WHERE month(supplier_product.date)=month(CURRENT_DATE()) AND YEAR(CURRENT_DATE())=YEAR(supplier_product.date)");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
    return $result;
}
public function get_income()
{
    $query=$this->mysqli->query("SELECT sum(bill.amount) AS tot FROM bill WHERE month(bill.date_time)=month(CURRENT_DATE()) AND YEAR(CURRENT_DATE())=YEAR(bill.date_time)");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
    return $result;
}
public function get_bills_week_details(){
    $query = $this->mysqli->query("SELECT * FROM bill WHERE (CURRENT_DATE())-(bill.date_time)<=7");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function get_bought_products_week_details(){
    $result = "";
    $query = $this->mysqli->query("SELECT supplier_product.date,supplier_product.unit_price,supplier_product.quantity,supplier.sup_name,brand.brand_name,category.category_name,model.model_name FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE (CURRENT_DATE())-(supplier_product.date)<=7");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_bills_month_details(){
    $query = $this->mysqli->query("SELECT * FROM bill WHERE (CURRENT_DATE())-(bill.date_time)<=31");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function get_bought_products_month_details(){
    $query = $this->mysqli->query("SELECT supplier_product.date,supplier_product.unit_price,supplier_product.quantity,supplier.sup_name,brand.brand_name,category.category_name,model.model_name FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE (CURRENT_DATE())-(supplier_product.date)<=365");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_bills_year_details(){
    $query = $this->mysqli->query("SELECT * FROM bill WHERE (CURRENT_DATE())-(bill.date_time)<=365");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function get_bought_products_year_details(){
    $query = $this->mysqli->query("SELECT supplier_product.date,supplier_product.unit_price,supplier_product.quantity,supplier.sup_name,brand.brand_name,category.category_name,model.model_name FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE (CURRENT_DATE())-(supplier_product.date)<=365");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;

}
public function get_bills_range($date1,$date2){
    $query = $this->mysqli->query("SELECT * FROM bill WHERE bill.date_time BETWEEN '$date1' AND '$date2'");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function get_bought_products_range($date1,$date2){
    $result="";
    $query = $this->mysqli->query("SELECT supplier_product.date,supplier_product.unit_price,supplier_product.quantity,supplier.sup_name,brand.brand_name,category.category_name,model.model_name FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id WHERE supplier_product.date BETWEEN '$date1' AND '$date2'");
    while ($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
  return $result;
}
public function review_annual(){
  $query = $this->mysqli->query("SELECT * from feedback where YEAR(date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }else
    {
        return 0;
    }
}
public function review_monthly(){
    $query = $this->mysqli->query("SELECT * from feedback where MONTH(date) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))");
      if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
              $result[] = $row;
          }
          return $result;
      }else
      {
          return 0;
      }
  }

  public function review_weekly(){
    $query = $this->mysqli->query("SELECT * from feedback where date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY");
      if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
              $result[] = $row;
          }
          return $result;
      }else
      {
          return 0;
      }
  }
  public function review_time($row,$row1){
    $query = $this->mysqli->query("SELECT * from feedback where (date between $row1 AND $row)");
      if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
              $result[] = $row;
          }
          return $result;
      }else
      {
          return 0;
      }
  }
  public function review_all(){
    $query = $this->mysqli->query("SELECT * from feedback");
      if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
              $result[] = $row;
          }
          return $result;
      }else
      {
          return 0;
      }
  }
}
