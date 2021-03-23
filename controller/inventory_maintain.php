<?php
require_once("../model/inventory_maintain_model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
class inventory_maintain
{
    public function __construct()
    {

        $this->inven = new inventory_maintain_model();

    }

    public function newsuppliers()
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile_no = $_POST['moblile_no'];
        $email = $_POST['email'];

        if (empty($name)) {
            $errors['lastname'] = "Lastname is required";
        }
        if (empty($address)) {
            $errors['address'] = "Address is required";
        }
        if (empty($mobile_no)) {
            $errors['mobile_no'] = "Mobile number is required";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        }

        $row = $this->inven->valid_email($email);
        $row1 = $this->inven->valid_name($name);

        if ($row != "0") {

            echo "email already does not has";
        }
        else if($row1 != "0" )
        {
            echo "name already has";
        }else{
            $sup_id = $this->inven->getsupid();
            echo $sup_id;
            if($this->inven->supplier_register($sup_id,$name,$address,$mobile_no,$email) !=0){
                header('location: ../views/supplier_details.php');
            }else{
                echo "wrong";
            }
        }
    }

    public function view_suppliers($row)
    {

          $row1=$this->inven->get_details1($row);
     // print_r($row1);
          if($row1!=""){
            $_SESSION['supplier_details']=$row1;
            header('location: ../views/supplier_details_search.php');
            //   print_r($row1);
        }else if($row1==0) {
            echo "NOT FOUND";
        }
    }

 
     public function supplier_profile($id)      //this added by michelle
    {
         // print_r($id);
        $row = $this->inven->get_view_details($id);
        $row2 = $this->inven->get_view_supplier_product_details($id);  //mish
        //print_r($row2);
        if ($row2=='0')
        {
            $_SESSION['supplier_product_details'] = $row2;
            
        }

        else{
            $_SESSION['supplier_product_details'] = $row2;
        }
        /* echo "<br>";
         print_r($row['sup_name']);
         echo "<br>";
         print_r($row['email_address']);
         echo "<br>";
         print_r($row['address']);
         echo "<br>";
         print_r($row['telephone_no']);
        */
        $_SESSION['supplier_profile_details'] = $row;
        header('location: ../views/supplier_profile.php');
    }
    
    public function update_product($row){

            $row1=$this->inven->get_product_details_search($row);
    //  print_r($row);
       if($row1!=""){
            $_SESSION['update_product']=$row1;
            header('location: ../views/view_all_product_search.php');
            //   print_r($row1);
        }else if($row1==0) {
            echo "NOT FOUND";
        }
    }

    public function view_product_details($id)
    {
         //print_r($id);
        $row= $this->inven->get_view_product_details($id);
          //$p=$row['pp_name'];
       //   print_r($row);
         // print_r($row['p_name']);
          // echo "<br>";
    //      print_r($row['p_id']);
         $_SESSION['product_details1']=$row;
      //   print_r($_SESSION['product_details1']);
        header('location: ../views/update_product.php');

    }

    public function update_product_details($id)
    {

        $reorder_level=$warranty=$p_cost=$sales_price="";
        $reorder_level=$_POST['reorder_level'];
        $warranty=$_POST['warranty'];
        //$p_cost=$_POST['p_cost'];
        $sales_price=$_POST['sales_price'];
      //  print_r($reorder_level);
        //echo "<br>";
       // print_r($warranty);
        //echo "<br>";
       // print_r($p_cost);
        // echo "<br>";
       // print_r($sales_price);
        $row=$this->inven->update_product_details($id,$reorder_level,$warranty,$sales_price);
        if ($row == "0") {
            header('location: ../views/update_product.php');
        }else{
            header('location: ../views/view_all_products.php');
        }
    }
    public function display_reminders(){   //reshani
        return $this->inven->display_stockreminders();
    }

    public function countsuppliers(){              //reshani clerk dashboard
        return $this->inven->count_suppliers();
    }

    public function count_reminderitems(){      //reshani
        return $this->inven->count_reminder_items();
    }

    public function count_users(){      //reshani
        return $this->inven->count_verified_users();
    }
    public function countproducts(){     //reshani
        return $this->inven->count_products();
    }
    public function countsold_items(){     //reshani
        return $this->inven->count_sold_items();
    }
    public function countstock_details(){   //reshani
        return $this->inven->count_stock_details();
    }


    public function reminderitems_suppliers($id){    //nuwan
      //  print_r($id);
        $row=$this->inven->display_reminder_suppliers($id);
     //  print_r($row);
        $_SESSION['reminderitem_suppliers']=$row;
       header('location: ../views/stockreminders.php');
    }
    public function display_onereturnitem_details($id){    //reshani
        $row=$this->inven->display_returnitem($id);       
        $_SESSION['return_item']=$row;
        header('location: ../views/view_one_returnitem.php');
      }
    public function add_returnitem_details(){       //reshani
       // $description="";
        $item_status=0;
        $serial_no=$_POST['serial_no'];
        $description=$_POST['description'];
        $returned_date=date("Y-m-d");
        $sup_id=$this->inven->get_supid_serial_no( $serial_no);
        $item_id=$this->inven->get_item_id($serial_no);
        $model_no=$_POST['model_name'];
        /*printf($item_id);
        printf($sup_id);
        printf($serial_no);
        printf($description);
        printf($returned_date);
        printf($item_status);*/
       //$serial_no=$this->inven->get_supid_serial_no1();

       if($this->inven->add_return_item($sup_id,$returned_date,$description,$item_id)){
            if($this->inven->add_item_status($item_status,$item_id,$model_no)){
                header('location: ../views/shopkeeper_return_items.php');
            }
            
        }else{
            echo "error";
        }

    }

    public function display_shop_returnitem_details(){   //reshani
        return $this->inven->diplay_shop_return_items();
    }
    public function display_cus_returnitem_details(){   //reshani
        return $this->inven->diplay_cus_return_items();
    }
    public function display_shopkeeper_return_items(){  //reshani
        return $this->inven->shopkeeper_return_items();
    }
    public function display_all_returnitem_details(){
        return $this->inven->all_return_items();
    }

   /*public function delete_reminder_suppliers($serial_no){   //reshani
        $item_status=0;
        $row= $this->inven->delete_reminder_supplier($serial_no,$item_status);
        
        if($row=="0"){
            echo "wrong";
        }else{
            $row=$this->inven->display_reminder_suppliers($serial_no,$item_status);       
            $_SESSION['reminderitem_suppliers']=$row;
            header('location: ../views/stockreminders.php');
        }
        
    }*/
    /*public function delete(){
        header('location: ../views/stockreminders.php');
    }*/
    public function display_few_reminders(){   //reshani    display few reminder items in clerk dashboard
        return $this->inven->display_few_stockreminders();
    }
    public function customer_details(){           //reshani
        
        $cust_name=$email_address=$address =$telephone_no ="";
        $cust_name = $_POST['cust_name'];
        $email_address = $_POST['email_address'];
        $address = $_POST['address'];
        $telephone_no = $_POST['telephone_no'];
        

        if (empty($cust_name)) {
            $errors['lastname'] = "Lastname is required";
        }
        if (empty($email_address )) {
            $errors['email_address '] = "Email is required";
        }
        if (empty($address)) {
            $errors['address'] = "Address is required";
        }
        if (empty( $telephone_no)) {
            $errors['telephone_no'] = "Mobile number is required";
        }

        $row = $this->inven->valid_email_address($email_address);
        $row1 = $this->inven->valid_cust_name($cust_name);

        if ($row != "0") {

            echo "email already does not has";
        }
        else if($row1 != "0" )
        {
            echo "name already has";
        }else{
            $cust_id = $this->inven->getcustid();
            //echo $cust_id;
            if($this->inven->add_customer_details($cust_id,$cust_name,$email_address,$address,$telephone_no) !=0){
                //echo "success";
                header('location: ../views/add_customer_successful.php');
            }else{
                echo "wrong";
            }
        }
    }
    public function view_one_product_details($id)
    {
        //print_r($id);
        $row= $this->inven->get_view_product_details($id);
        //$p=$row['pp_name'];
     //     print_r($row);
        // print_r($row['p_name']);
        // echo "<br>";
        //      print_r($row['p_id']);

       $_SESSION['one_product_details']=$row;
        // print_r($_SESSION['product_details']);
      header('location: ../views/view_one_product.php');

    }
    
    public function delete_product_details($id)
    {
        print_r($id);
        $row= $this->inven->get_delete_product_details($id);
        $quantity=$row['quantity'];
        $count_serial_number=$row['COUNT(item.serial_no)'];
        $value=false;
        print_r($quantity);
        echo "</br>";
        print_r($count_serial_number);
        $row= $this->inven->delete_product_details($id,$quantity,$count_serial_number,$value);
        if($row=="0"){
            echo "wrong";
        }else{
            header('location: ../views/view_all_products.php');
        }
        // header('location: ../view/list_updateproduct.php');
    }
    
       public function dashbord_return_search()
    {     // print_r($value);
           $id=$_POST['query'];

            $row= $this->inven->dashbord_return_search($id);

            if($row==0){
                $row1= $this->inven->dashbord_customer_return_product($id);
                if($row==0){
                    $_SESSION['return_search']="Not found";
                    header('location: ../views/returnitems_result.php');
                }else{
                    $_SESSION['return_search']=$row1;
                    header('location: ../views/returnitems_result.php');
                   // print_r($row1);
                }
            }else{
                $_SESSION['return_search']=$row;
                header('location: ../views/returnitems_result.php');
               // print_r($row);
            }


    }

    public function send_email_form($id,$id1)
    {
        $_SESSION['send_suplier_email']=$id;

        header('location: ../views/email.php');

    }

    public function send_email_supplier()
    {
        $sup_email=$_POST['to'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        //print_r($sup_email);
        //print_r($subject);
        //print_r($message);
        $this->email_sent_supplier($sup_email,$subject,$message);
    }

    public function   email_sent_supplier($sup_email,$subject,$message){
        require_once "../vendor/autoload.php";
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'projectt541@gmail.com'; // YOUR gmail email
        $mail->Password = '#project32'; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom('projectt541@gmail.com', 'Tactota Solution');
        $mail->addAddress($sup_email);
        //$mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = '';

        $result=$mail->send();
        if($result==false){
            echo "worng";
        }else{
           // header('location: ../views/check_email.php');
            echo "true";
        }
   }

   public function view_supplier_details($id)      //michelle 123456789 
   {
       $row= $this->inven->get_view_details($id);
       $_SESSION['update_supplier']=$row;
       header('location: ../views/update_supplier.php');

   }
   public function update_supplier($id)     // omg
   {

       $name=$email=$address=$telephone="";
       $name=$_POST['sup_name'];
       $email=$_POST['email_address'];
       $address=$_POST['address'];
       $telephone=$_POST['telephone_no'];
       $row=$this->inven->update_supplier_details($id,$name,$email,$address,$telephone);
       if ($row == "0") {
           header('location: ../views/update_supplier.php');
       }else{
           header('location: ../views/supplier_details.php');
       }
   }

   public function inbox_supplier($row){
       $this->inven->suplier_reply();
        $row1=$this->inven->inbox_supplier($row);
   //  print_r($row1);
         if($row1!=""){
           $_SESSION['inbox_supplier']=$row1;
          header('location: ../views/inbox_suppier_reply_search.php');
        //    print_r($row1);
       }else if($row1==0) {
           echo "NOT FOUND";
       }  

   }

   public function view_categories(){
        $row=$this->inven->view_categories();
        return $row;
   }

   public function view_brands(){
        $row=$this->inven->view_brands();
        return $row;

   }

   public function view_models(){
    $row=$this->inven->view_models();
    return $row;
    }
    public function sold_category_count(){    
        $row=$this->inven->sold_category_count();
    return $row;
    }
    

    public function view_inbox_email($id){
        $row = $this->inven->view_inbox_email($id);
     //   print_r($row['email_id']);
        if($row!=""){  
           $_SESSION['view_inbox_email']=$row;
          header('location:../views/view_inbox.php');
        }else{
            $_SESSION['view_inbox_email']="No details";
            header('location:../views/view_inbox.php');
        }
    }

    public function view_inbox_delete($id){
        $row = $this->inven->view_inbox_delete($id);
        if($row =="0"){
          // print_r("no");
            header('location:../views/inbox_supplier_reply.php');
        }else{
           // print_r("yes");
            header('location:../views/inbox_supplier_reply.php'); 
        }
    }

    public function get_bills(){
        return $this->inven->get_bills_monthly();
    }
    public function get_bought_products(){
        return $this->inven->get_products_monthly();
    }
    public function current_stock(){
        return $this->inven->current_stock();
    }

    public function max_min_sales()
    {
        return $this->inven->max_min_sales();
    }
    public function max_sales_with_categories()
    {
        return $this->inven->max_sales_with_categories();
    }
    public function min_sales_with_categories()
    {
        return $this->inven->min_sales_with_categories();
    }
    public function sold_items()
    {
        return $this->inven->sold_items_all();
    }
    

}



      $controller = new inventory_maintain();
if(isset($_GET['action']) && $_GET['action'] == "newsuppliers") {
     $controller->newsuppliers();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_suppliers') {
     $row=$_POST['query'];
    //print_r($row);
    $controller->view_suppliers($row);
}else if(isset($_GET['action']) && $_GET['action'] == 'supplier_profile' ) {
    $id=$_GET["id"];
    $controller->supplier_profile($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product') {
   $row=$_POST['query'];
    //print_r($row);
    $controller->update_product($row);
}else if(isset($_GET['action']) && $_GET['action'] == 'view_product_details') {
    $id=$_GET["id"];
    $controller->view_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product_details') {
    $id=$_GET["id"];
    $controller->update_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_supplier') {
    $id=$_GET["id"];
    $controller->update_supplier($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'update_supplier_details') {
    $id=$_GET["id"];
    $controller->view_supplier_details($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'display_reminders'){  //reshani
    $controller->display_reminders();
}
else if(isset($_GET['action']) && $_GET['action'] == 'reminderitems_suppliers'){  //nuwan
    $id=$_GET["id"];
   $controller->reminderitems_suppliers($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'display_onereturnitem_details'){  //reshani
    $id=$_GET["id"];
    $controller->display_onereturnitem_details($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'display_returnitem_details'){  //reshani
    $controller->display_returnitem_details();
}
else if(isset($_GET['action']) && $_GET['action'] == 'add_returnitem_details'){  //reshani
    $controller->add_returnitem_details();
}
else if(isset($_GET['action']) && $_GET['action'] == 'display_shopkeeper_return_items'){  //reshani
    $controller->display_shopkeeper_return_items();
}
/*else if(isset($_GET['action']) && $_GET['action'] == 'delete_reminder_suppliers'){  //reshani
    $serial_no=$_GET["id"];
    $controller->delete_reminder_suppliers($serial_no);
}*/
/*else if(isset($_GET['action']) && $_GET['action'] == 'delete'){  //reshani
    $controller->delete();
  }*/

else if(isset($_GET['action']) && $_GET['action'] == 'display_few_reminders'){   //reshani
    $controller->display_few_reminders();
 }
else if(isset($_GET['action']) && $_GET['action'] == 'customer_details'){   //reshani
    $controller->customer_details();
 }else if(isset($_GET['action']) && $_GET['action'] == 'delete_product_details') {
    $id=$_GET["id"];
    $controller->delete_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'view_one_product_details') {
    $id=$_GET["id"];
    $controller->view_one_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'send_email_form') {
    $id=$_GET["id"];
    $id1=$_GET["id1"];
    $controller->send_email_form($id,$id1);
}else if(isset($_GET['action']) && $_GET['action'] == 'send_email_supplier') {

    $controller->send_email_supplier();
}else if(isset($_GET['action']) && $_GET['action'] == 'inbox_supplier') {
    $row=$_POST['query'];
    $controller->inbox_supplier($row);

}else if(isset($_GET['action']) && $_GET['action'] == 'view_inbox'){   
    $id=$_GET["id"];
  //  print_r($id);
   $controller->view_inbox_email($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'view_inbox_delete'){   
    $id=$_GET["id"];
  //  print_r($id);
   $controller->view_inbox_delete($id);

}else if(isset($_GET['action']) && $_GET['action'] == 'countsuppliers'){   //reshani
    $controller->countsuppliers();

}else if(isset($_GET['action']) && $_GET['action'] == 'count_reminderitems'){   //reshani
    $controller->count_reminderitems();
}else if(isset($_GET['action']) && $_GET['action'] == 'count_users'){   //reshani admin dashboard
    $controller->count_users();

}else if(isset($_GET['action']) && $_GET['action'] == 'countproducts'){   //reshani
    $controller->countproducts();

}else if(isset($_GET['action']) && $_GET['action'] == 'countsold_items'){   //reshani
    $controller->countsold_items();

}else if(isset($_GET['action']) && $_GET['action'] == 'countstock_details'){   //reshani
    $controller->countstock_details();

}else if(isset($_GET['action']) && $_GET['action'] == 'view_categories'){   //reshani
    $controller->view_categories();

}else if(isset($_GET['action']) && $_GET['action'] == 'view_models'){   //reshani
    $controller->view_models();

}else if(isset($_GET['action']) && $_GET['action'] == 'view_brands'){   //reshani
    $controller->view_brands();
}




