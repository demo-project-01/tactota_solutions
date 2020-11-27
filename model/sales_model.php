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

    public function get_product_id(){
        $query = $this->mysqli->query("SELECT * from product order by p_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['p_id'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "P" . sprintf('%04s', $result);
            return $result;
        }else
        {
            $result = "P0001";

            return $result;
        }
    }


 public function add_new_product($product_id,$product_name,$product_cost,$brand_name,$reorder_level,$model_number,$quantity,$warranty,$product_status,$product_date,$serial_number,$sales_price,$item_status,$supplier_id){
       $stmt=$this->mysqli->prepare("INSERT INTO product (p_id,p_name,p_cost,brand_name,reorder_level,model_no,quantity,warranty,product_status,product_date)
                                        VALUES (?,?,?,?,?,?,?,?,?,?)");
        if($stmt == false){
            return 0;
        }else{

              $stmt->bind_param('ssssssssss',$product_id,$product_name,$product_cost,$brand_name,$reorder_level,$model_number,$quantity,$warranty,$product_status,$product_date);
              $stmt->execute();
            for($i=0;$i<$quantity;$i+=1){
                $stmt1 = $this->mysqli->prepare("INSERT INTO  item (serial_no,sales_price,p_id,item_status)
                                        VALUES (?,?,?,?)");

                $stmt1->bind_param('ssss',$serial_number[$i],$sales_price,$product_id,$item_status);
                $stmt1->execute();

            }


            $stmt2= $this->mysqli->prepare("INSERT INTO  supplier_product(sup_id,p_id)VALUES (?,?)");
              $stmt2->bind_param('ss',$supplier_id,$product_id);
                  return $stmt2->execute();

       }

    }
    public function view_products(){
        $query = $this->mysqli->query("SELECT product.quantity,product.p_id,product.p_name,product.brand_name,product.model_no,product.p_cost,product.warranty,item.sales_price FROM product INNER JOIN item ON product.p_id=item.p_id");
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
    
        $query = $this->mysqli->query("SELECT item.serial_no,product.p_id,product.p_name,product.brand_name,product.model_no,product.warranty,item.sales_price FROM product INNER JOIN item ON product.p_id=item.p_id");
        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

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

}
