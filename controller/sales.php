<?php
require_once("../model/sales_model.php");

class sales
{

    public function __construct()
    {

        $this->sale = new sales_model();

    }
   public function get_supplier_names(){
        return $this->sale->get_names();
   }
    public function get_category_name(){
    return $this->sale->get_category_name();
   }

   public function get_brand_name(){
    return $this->sale->get_brand_name();
   }
  
   public function get_model_name(){
    return $this->sale->get_model_name();
   }
   public function add_new_model(){
       $model_name = $_POST['model_number'];
        $quantity =0;
        $sales_price = $_POST['sales_price'];
        $specification =$_POST['specification'];
        $reorder_level = $_POST['reorder_level'];
        print_r($reorder_level);
        
    if($model_name==" "){
        echo "wrong";
    }else{
        if ($this->sale->get_model_id($model_name)=="0"){
               
           if ($this->sale->add_new_model($model_name,$quantity,$reorder_level,$sales_price,$specification)) {
                //  $_SESSION['addnewproduct']="Add new product is successful ";
                 header('location: ../views/view_all_products.php');
                    echo "successful";
              } else {
                //  $_SESSION['addnewproduct']="Add new product is unsuccessful ";
                  //  header('location: ../views/newproduct.php');
                  echo "unsuccessful1";
              }      
        }else{
             echo "alredy exits ";
        }
    

       
    }
   }
    public function add_product()
    {
      
        $category_id = $_POST['category'];
        $brand_id = $_POST['brand'];
        $model_id = $_POST['model'];
        $quantity = $_POST['quantity'];
        $product_cost= $_POST['product_cost'];
        $supplier_id = $_POST['supplier'];
        $warranty = $_POST['warranty'];
        $sales_price = $_POST['sales_price'];
        $serial_number = $_POST['serial_number'];
        $reorder_level = $_POST['reorder_level'];
        $product_status=true;
        $item_status=true;
        $product_date=date("Y-m-d");
      //  $product_id = $this->sale->get_product_id();
    //    $model_details = $this->sale->get_model_details($model_id); 
      
      
        $count=0; $arr=0;
      
       
         if($quantity<0){
                 $quantity_error="password must be more than 0";
                 $count++;
         }

         if($product_cost>$sales_price){
             $count++;
         }
         if($product_cost<0 || $sales_price<0){
              $count++;
         }
         if($quantity<$reorder_level){
             $count++;
         }

         if($quantity!=$arr){
             $count++;
         }
 
     //     $total_quantity = $model_details[0]["quantity"] + $quantity;
   //      print_r($total_quantity);
 //       if ($this->sale->update_model($model_id,$quantity,$reorder_level,$sales_price,$specification)){
 

  //  if($count==0) {
     if($total1=$this->sale->add_new_product($category_id, $product_cost, $brand_id, $reorder_level, $model_id, $quantity,$product_status, $product_date, $serial_number,$item_status, $supplier_id,$warranty))
      {    //  $_SESSION['addnewproduct']="Add new product is successful ";
        //   header('location: ../views/view_all_products.php');
       // print_r($total1);   
        echo "successful";
        } else {
          //  $_SESSION['addnewproduct']="Add new product is unsuccessful ";
           //   header('location: ../views/newproduct.php');
             echo "unsuccessful1";
        }
    // else{
    //    $_SESSION['addnewproduct']="Add new product is unsuccessful ";
    //   echo "unsuccessfull2";
     //      header('location: ../views/newproduct.php');
        //$_SESSION['addnewproduct']="Add new product is unsuccessful ";
      //}
                  

    }
    public function valid_prodcuts(){
        return $this->sale->view_products();
    }
    public function sell($id){
       print_r($id);

   //   header('location: ../views/bill.php');
    }

    public function dashbord_search()
    {
         $id=$_POST['query'];

        $row= $this->sale->dashbord_search($id);
        //    print_r($row);
        //  print_r($row);
        $_SESSION['dashbord_search']=$row;
        header('location: ../views/search_product_result.php');
    }
  public function get_bill_no() //nuwans
    {
       $row=$this->sale->get_bill_no();
       return $row;
     
    }
    
      public function add_bill(){ //nuwan
        $item_id=$_POST['hidden_itemid'];
        $id= $this->sale->get_emp_id();
        $bill_no= $this->sale->get_bill_no();
        $date_time = $_POST['date_time'];
        $amount = $_POST['hidden_total'];
        $cust_name = $_POST['cust_name'];
        $email_address= $_POST['email_address'];
        $address = $_POST['address'];
        $telephone_no = $_POST['telephone_no'];
        $serial_no=$_POST['hidden_sno'];
        $payment_method = $_POST['payment_method'];
        $bank_name = $_POST['bank_name'];
        $cheque_no = $_POST['cheque_no'];
        $recived_date = $_POST['recived_date'];
        $due_date = $_POST['due_date'];
        $cust_id= $this->sale->get_cust_id();
        $total_items=$_POST['hidden_total_i'];
      
        //print_r($total_items);
     if($payment_method=="cheque"){
     if($this->sale->insert_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$cheque_no,$recived_date,$due_date,$bank_name,$telephone_no,$serial_no,$email_address,$address,$total_items,$item_id)){
         header('location: ../views/view_purchase_list.php');
         echo'<script>alert("payment Done")</script>';
        }
    }
        else if($payment_method=="cash"){
            if($this->sale->insert_cash_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$telephone_no,$serial_no,$email_address,$address,$total_items,$item_id)){
                header('location: ../views/view_purchase_list.php');
                echo'<script>alert("payment Done")</script>';
               }   
        }
    
    }
     public function get_product_details(){//nuwan
        return $this->sale->get_product();
   }
  /* public function get_brand($id){//new 22
    return $this->sale->get_brand_name($id);
}*/

    
     public function view_search_product($id,$model)
    {
        //print_r($id);
      //  print_r($model);

        $row= $this->sale->view_search_product($id,$model);
        print_r($row);
      //  $_SESSION['view_search_product']=$row;
     //   print_r($row['product.p_name']);
     //   header('location: ../views/view_search_product.php');

    }
    public function display_customers_details(){
        return $this->sale->view_customers();
    }
 /*   public function add_id($id){   //
        if(isset($_POST["add_to_bill"]))
        {  
            if(isset($_SESSION["purchase"]))
            {  header('location: ../views/email.php');
                $item_array=array_column($_SESSION["purchse"],"item_id");
                if(!in_array($_GET["item_id"],$item_array_id))
                {
                   $count=count($_SESSION["purchase"]);
                   $item_array=array(
                       'item_id'=> $_GET["item_id"],
                       'category_name'=>$_POST["hidden_pname"],
                       'brand_name'=>$_POST["hidden_bname"],
                       'model_name'=>$_POST["hidden_mname"],
                       'warrenty'=>$_POST["hidden_warrenty"],
                       'sales_price'=>$_POST["hidden_sprice"]
                   );
                   $_SESSION["purchase"][$count]=$item_array;
                }
                 else{ 
                    echo '<script>alert("Item Alredy Added")</script>';

                     }            
            }
             else{  header('location: ../views/email.php');
            $item_array=array(
                'item_id'=> $_GET["item_id"],
                'category_name'=>$_POST["hidden_pname"],
                       'brand_name'=>$_POST["hidden_bname"],
                       'model_name'=>$_POST["hidden_mname"],
                       'warrenty'=>$_POST["hidden_warrenty"],
                       'sales_price'=>$_POST["hidden_sprice"]
                          );
            $_SESSION["purchase"][0]=$item_array;
            
                 }
      } }
    */
    public function add_category(){
        $category_name = $_POST['category_name'];
        
        


        if($category_name==" "){
            echo "wrong";
        }else{
            if ($this->sale->check_new_category($category_name)=="0"){
                   
                if ($this->sale->add_new_category($category_name)) {
                    //  $_SESSION['addnewproduct']="Add new product is successful ";
                    // header('location: ../views/view_all_products.php');
                        echo "successful";
                  } else {
                    //  $_SESSION['addnewproduct']="Add new product is unsuccessful ";
                      //  header('location: ../views/newproduct.php');
                      echo "unsuccessful1";
                  }      
            }else{
                echo "alredy exits ";
            }


           
        }
       
    }
    
    public function add_brand(){
        $brand_name = $_POST['brand_name'];
        
        if($brand_name==" "){
            echo "wrong";
        }else{
            if ($this->sale->check_new_brand($brand_name)=="0"){
                   
                if ($this->sale->add_new_brand($brand_name)) {
                    //  $_SESSION['addnewproduct']="Add new product is successful ";
                    // header('location: ../views/view_all_products.php');
                        echo "successful";
                  } else {
                    //  $_SESSION['addnewproduct']="Add new product is unsuccessful ";
                      //  header('location: ../views/newproduct.php');
                      echo "unsuccessful1";
                  }      
            }else{
                echo "alredy exits ";
            }


           
        }
       
    }
    public function view_bill($id){
       $row= $this->sale->get_bill_details($id);
    }

}
$controller = new sales();
if(isset($_GET['action']) && $_GET['action'] == "get_supplier_names") {
    $controller->get_supplier_names();
}else if(isset($_GET['action']) && $_GET['action'] == 'add_product') {
    $controller->add_product();
}else if(isset($_GET['action']) && $_GET['action'] == 'valid_prodcuts') {
    $controller->valid_prodcuts();
}else if(isset($_GET['action']) && $_GET['action'] == 'sell') {
    $id=$_GET["id"];
    $controller->sell($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'dashbord_search') {

    $controller->dashbord_search();
}else if(isset($_GET['action']) && $_GET['action'] == 'add_bill') { //nuwan
    $controller->add_bill();
}else if(isset($_GET['action']) && $_GET['action'] == 'get_product_details') {//nuwan
    $id=$_GET['id'];// new22
    $controller->get_product_details();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_search_product') {
     $id=$_GET['id'];
     $model=$_GET['id1'];
    $controller->view_search_product($id,$model);
}else if(isset($_GET['action']) && $_GET['action'] == 'get_bill_no') {//nuwan
    $controller->get_bill_no();
}else if(isset($_GET['action']) && $_GET['action'] == 'display_customers_details') {//nuwan n
    $controller->display_customers_details();
}/*else if(isset($_GET['action']) && $_GET['action'] == 'add_id') {//new22 
    $id=$_GET['id'];
    $controller->add_id($id);
}*/else if(isset($_GET['action']) && $_GET['action'] == 'add_category') {
    $controller->add_category();
}else if(isset($_GET['action']) && $_GET['action'] == 'add_brand') {
    $controller->add_brand();
}else if(isset($_GET['action']) && $_GET['action'] == 'get_category_name') {
    $controller->get_category_name();
}else if(isset($_GET['action']) && $_GET['action'] == 'get_brand_name') {
    $controller->get_brand_name();
}
else if(isset($_GET['action']) && $_GET['action'] == 'add_new_model') {
    $controller->add_new_model();
}else if(isset($_GET['action']) && $_GET['action'] == 'get_model_name') {
    $controller->get_model_name();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_bill') {
    $id=$_GET['id'];
    $controller->view_bill($id);
}

