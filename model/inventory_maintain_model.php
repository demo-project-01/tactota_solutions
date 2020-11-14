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
                                        VALUES (?,?,?)");

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

     public function get_details(){
   
        $query = $this->mysqli->query("SELECT * FROM  supplier INNER JOIN sup_address ON supplier.sup_id=sup_address.sup_id INNER JOIN sup_telephone ON sup_address.sup_id=sup_telephone.sup_id");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

     public function get_view_details($id){     //michelle edited query 
         $result = "";
         //$query = $this->mysqli->query("SELECT * FROM supplier INNER JOIN sup_address ON supplier.sup_id=sup_address.sup_id INNER JOIN sup_telephone ON sup_address.sup_id=sup_telephone.sup_id  AND supplier.sup_id='" . $id . "'");
         $query=$this->mysqli->query("SELECT s.sup_id,s.sup_name,s.email_address,sa.address,st.telephone_no FROM  supplier AS s, sup_telephone AS st, sup_address AS sa where s.sup_id=sa.sup_id AND s.sup_id=st.sup_id");
         while ($row = $query->fetch_assoc()) {
             $result = $row;
         }
         return $result;
     }

    public function get_product_details(){

        $query = $this->mysqli->query("SELECT * FROM  product INNER JOIN supplier_product ON product.p_id=supplier_product.p_id INNER JOIN item ON product.p_id=item.p_id ");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function get_view_product_details($id){
       $result = "";
        $query = $this->mysqli->query("SELECT product.p_id,product.p_name,product.brand_name,product.model_no,product.quantity,product.p_cost,product.reorder_level,product.warranty,item.sales_price FROM  product INNER JOIN item ON product.p_id=item.p_id AND product.p_id='" . $id . "'");
        while ($row = $query->fetch_assoc()) {
            $result = $row;
        }
        return $result;
    }

    public function update_product_details($id,$reorder_level,$warranty,$p_cost,$sales_price){
        $stmt = $this->mysqli->prepare("UPDATE product INNER JOIN item ON product.p_id =item.p_id  SET  product.p_cost= ?,  product.reorder_level= ? ,  product.warranty= ?,  item.sales_price= ?
                                        WHERE product.p_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('sssss',$p_cost,$reorder_level,$warranty,$sales_price,$id);
            return $stmt->execute();
        }
    }
     public function display_stockreminders(){   //reshani  ,view stock reminders
        // $result="";
         $query=$this->mysqli->query("SELECT * FROM product WHERE quantity<=reorder_level");  /*modified*/
         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
     }
     public function display_few_stockreminders(){   //reshani  ,view few stock reminders in clerk dashbaord
        // $result="";
   //$query=$this->mysqli->query("SELECT * FROM product WHERE quantity<=reorder_level ORDER BY p_id LIMIT 5");
   $query=$this->mysqli->query("SELECT DISTINCT p_name FROM product WHERE quantity<=reorder_level ORDER BY p_name LIMIT 5");

         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
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
    public function valid_cust_name($cust_name){         //reshani ,add customer details
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
    }
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
    
}
