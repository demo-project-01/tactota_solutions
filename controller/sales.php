<?php
require_once("../model/sales_model.php");
session_start();
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

   public function check_model(){
    $model_name = $_POST['model_name'];
    $row1 = $this->sale->get_model_id($model_name);
    if($row1 != "0" )
    {
        echo "taken";
    }else{
        echo "not_taken";
    }      
   }
   public function add_new_model(){
       $model_name = $_POST['model_number'];
        $quantity = 0;
        $sales_price = $_POST['sales_price'];
        $specification =$_POST['specification'];
        $reorder_level = $_POST['reorder_level'];
     //   print_r($reorder_level);
        
    if($model_name==" "){
        echo "wrong";
    }else{
        if ($this->sale->get_model_id($model_name)=="0"){
               
           if ($this->sale->add_new_model($model_name,$quantity,$reorder_level,$sales_price,$specification)) {
                  $_SESSION['addnewmodel']="Add new model is successful ";
                 header('location: ../views/newmodel.php');
                    //echo "successful";
              } else {
                  $_SESSION['addnewmodel']="Add new model is unsuccessful ";
                    header('location: ../views/newmodel.php');
                  //echo "unsuccessful1";
              }      
        }else{
            $_SESSION['addnewmodel']="Add new model is unsuccessful ";
                    header('location: ../views/newmodel.php');
                  //echo "unsuccessful1";
           //  echo "alredy exits ";
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
      //  $reorder_level = $_POST['reorder_level'];
        $product_status=true;
        $item_status=true;
        $product_date=date("Y-m-d");
      //  $product_id = $this->sale->get_product_id();
    //    $model_details = $this->sale->get_model_details($model_id); 
      
        $count=0; $arr=0;
           $c=0;
            //  $row=$this->sale->check_brand_equal_model($model_id);




              foreach($serial_number as $value){
                     $c++;
                }
            if($quantity!=$c){
                $count++; 
            }
 
        if($quantity<=0){
                 $quantity_error="password must be more than 0";
                 $count++;
              //   print_r($count);

         }

         if($product_cost>$sales_price){
             $count++;
          //   print_r($count);
         }
         if($product_cost<0 || $sales_price<0){
              $count++;
              //print_r($count);
         }
         if($quantity<$reorder_level){
             $count++;
            //  print_r($count);
         }

         if($quantity==$arr){
             $count++;
          //  print_r($count);
         }
 
     //     $total_quantity = $model_details[0]["quantity"] + $quantity;
   //      print_r($total_quantity);
 //       if ($this->sale->update_model($model_id,$quantity,$reorder_level,$sales_price,$specification)){
 //print_r($count);

  if($count==0) {
     if($total1=$this->sale->add_new_product($category_id,$sales_price,$product_cost, $brand_id, $reorder_level, $model_id, $quantity,$product_status, $product_date, $serial_number,$item_status, $supplier_id,$warranty))
      {    $_SESSION['addnewproduct']="Add new product is successful ";
        header('location: ../views/newproduct.php');
       // print_r($total1);   
        echo "successful";
        } else {
           $_SESSION['addnewproduct']="Add new product is unsuccessful ";
              header('location: ../views/newproduct.php');
             echo "unsuccessful1";
        }
    } else{
        $_SESSION['addnewproduct']="Add new product is unsuccessful ";
    //   echo "unsuccessfull2";
           header('location: ../views/newproduct.php');
        //$_SESSION['addnewproduct']="Add new product is unsuccessful ";
      //}
    }           
         
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
        $id= $_SESSION['emp_id'];
        $bill_no= $this->sale->get_bill_no();
        $date_time = $_POST['date_time'];
        $amount = $_POST['total_amount']*(100- $_POST['discount'])/100;
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
        $model_no=$this->sale->get_model_no($serial_no,$total_items);
        //print_r($model_no); 
        if($recived_date>$due_date and $payment_method=="cheque"){
            echo'<script>alert("invalid check dates")</script>';
        }

    else{

     if($payment_method=="cheque"){
        if(empty($bank_name)OR empty($cheque_no) OR empty($recived_date) OR empty($due_date) ){
            echo'<script>alert("No complete cheque details")</script>';
        }
     else { 
         if($this->sale->insert_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$cheque_no,$recived_date,$due_date,$bank_name,$telephone_no,$serial_no,$email_address,$address,$total_items,$item_id,$model_no)){
        unset($_SESSION["purchase"]);
        $_SESSION["flash_payment"]="Payment Done";
         header('location: ../views/purchase.php');
         echo'<script>alert("payment Done")</script>';
        }
    }

    }
        else if($payment_method=="cash"){
            if($this->sale->insert_cash_bill($id,$cust_name,$bill_no,$date_time,$amount,$payment_method,$cust_id,$telephone_no,$serial_no,$email_address,$address,$total_items,$item_id,$model_no)){
                unset($_SESSION["purchase"]);
                $_SESSION["flash_payment"]="Payment Done";
                 header('location: ../views/purchase.php');
                echo'<script>alert("payment Done")</script>';
               }   
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


    public function check_category(){
        $category_name = $_POST['category_name'];
        $row1 = $this->sale->check_new_category($category_name);
        if($row1 != "0" )
        {
            echo "taken";
        }else{
            echo "not_taken";
        }
    }

    public function add_category(){
        $category_name = $_POST['category_name'];
        
        


        if($category_name==" "){
            $_SESSION['addnewcategory']="Add newcategory is unsuccessful ";
            header('location: ../views/newcategory.php');
          //  echo "wrong";
        }else{
            if ($this->sale->check_new_category($category_name)=="0"){
                   
                if ($this->sale->add_new_category($category_name)) {
                      $_SESSION['addnewcategory']="Add new category is successful ";
                    header('location: ../views/newcategory.php');
                    //    echo "successful";
                  } else {
                      $_SESSION['addnewcategory']="Add new category is unsuccessful ";
                      header('location: ../views/newcategory.php');
                      //echo "unsuccessful1";
                  }      
            }else{
                      $_SESSION['addnewcategory']="Add newcategory is unsuccessful ";
                        header('location: ../views/newcategory.php');
              //  echo "alredy exits ";
            }


           
        }
       
    }
      
    
    public function check_brand(){
        $brand_name = $_POST['brand_name'];
        $row1 = $this->sale->check_new_brand($brand_name);
        if($row1 != "0" )
        {
            echo "taken";
        }else{
            echo "not_taken";
        }
    }
    
    public function add_brand(){
        $brand_name = $_POST['brand_name'];
        
        if($brand_name==" "){
            echo "wrong";
        }else{
            if ($this->sale->check_new_brand($brand_name)=="0"){
                   
                if ($this->sale->add_new_brand($brand_name)) {
                     $_SESSION['addnewbrand']="Add new brand is successful ";
                     header('location: ../views/newbrand.php');
                     //   echo "successful";
                  } else {
                      $_SESSION['addnewbrand']="Add new brand is unsuccessful ";
                        header('location: ../views/newbrand.php');
                     // echo "unsuccessful1";
                  }      
            }else{
                $_SESSION['addnewbrand']="Add new brand is already exists ";
                header('location: ../views/newbrand.php');
               // echo "alredy exits ";
            }


           
        }
       
    }
    public function view_bill($id){
       
       $payment=$this->sale->get_payment_method($id);
      // print_r($_SESSION['bill_details']);
      if($payment=="cheque"){
        $row= $this->sale->get_bill_details($id);
        $_SESSION['bill_details']=$row;
        //print_r($_SESSION['bill_details']);
        header('location: ../views/bill_details.php');
      }
       else if($payment=="cash"){
        $row= $this->sale->get_cashbill_details($id);
        $_SESSION['bill_details']=$row;
        //print_r($_SESSION['bill_details']);
        header('location: ../views/cashbill_details.php');
       }
    }
    public function view_cheques(){
        return $this->sale->get_cheques_details();
    }
    public function view_cheques_by_bank(){
        return $this->sale->get_cheques_details_by_bank();
    }

    public function view_cheque($id){
        $row=$this->sale->get_cheque($id);
        $_SESSION['cheque_details']=$row;
        header('location: ../views/cheque_clearance.php');
    }
    public function remove_cheque($id){
        if($this->sale->clear_cheque($id)){
            header('location: ../views/view_all_cheques.php');
        }else{
            
            echo'<script>alert("Error")</script>';
        }
        
    }

    public function get_sales_price(){
        $category = $_SESSION['category'];
        $brand = $_SESSION['brand'];
        $model = $_SESSION['model'];

        $row=$this->sale->get_sales_price($category,$brand,$model);
          if($row !="0"){
             echo "1000";
          }else{
              echo "2000";
          }

    }

    public function search_cheque(){
         $id = $_POST['query'];
         $row1 = $this->sale->search_cheque($id);

         if($row1!=""){
            $_SESSION['search_cheque']=$row1;
            header('location: ../views/view_all_cheques_search.php');
            //   print_r($row1);
        }else if($row1==0) {
            echo "NOT FOUND";
        }
    }
    public function  bill_details($row){
        $row1=$this->sale->bill_details_search($row);
           if($row1!=""){
                $_SESSION['bill_search']=$row1;
                header('location: ../views/purchased_bill_details_search.php');
            }else if($row1==0) {
                echo "NOT FOUND";
            }
    }
    public function valid_prodcuts_search($model){
        return $this->sale->view_products_search($model);
    }

    public function get_model_brand(){
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $row = $this->sale->check_brand_equal_model($brand,$model);
        if($row != "0" )
        {
            echo "taken";
        }else{
            echo "not_taken";
        }
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
}else if(isset($_GET['action']) && $_GET['action'] == 'cheque_clearance') {
    $id=$_GET['id'];
    $controller->view_cheque($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'remove_cheque') {
    $id=$_GET['id'];
    $controller->remove_cheque($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'get_sales_price') {
  
    $controller->get_sales_price();
}else if(isset($_GET['action']) && $_GET['action'] == 'check_category') {
  
    $controller->check_category();
}else if(isset($_GET['action']) && $_GET['action'] == 'check_brand') {
  
    $controller->check_brand();
}else if(isset($_GET['action']) && $_GET['action'] == 'check_model') {
  
    $controller->check_model();
}else if(isset($_GET['action']) && $_GET['action'] == 'search_cheque') {
  
    $controller->search_cheque();
}else if(isset($_GET['action']) && $_GET['action'] == 'bill_details') {
    $row=$_POST['query'];
     $controller->bill_details($row);
}else if(isset($_GET['action']) && $_GET['action'] == 'get_model_brand') {

     $controller->get_model_brand();
}





