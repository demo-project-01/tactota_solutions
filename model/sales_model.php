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
         $result = "";
         $query = $this->mysqli->query("SELECT p_name FROM product where p_id='" . $id . "'");

         while ($row = $query->fetch_assoc()) {
             $result = $row;
         }
         return $result;
     }


}
