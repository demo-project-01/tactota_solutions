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
    
    public function get_view_supplier_product_details($id){//new22
       // $result = "";
        //$query = $this->mysqli->query("SELECT * FROM supplier INNER JOIN product  AND supplier.sup_id='" . $id . "'");
        $query = $this->mysqli->query("SELECT s.sup_id, p.product_id,c.category_name,b.brand_name, m.model_no from supplier AS s,product_list as p ,supplier_product as sp ON sp.sup_id=s.sup_id INNER JOIN category AS c ON p.category_id=c.category_id INNER JOIN brand AS b ON p.brand_id=b.brand_id INNER JOIN model AS m ON p.model_id=m.model_id AND p.p_id=sp.p_id AND s.sup_id='" . $id . "' ");
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
     public function display_stockreminders(){   //reshani  ,view stock reminders
       // $result="";
         
         $query=$this->mysqli->query("SELECT product_list.p_id,category.category_name,brand.brand_name,model.model_name FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN supplier_product ON product_list.p_id=supplier_product.p_id WHERE model.total_quantity<=model.reorder_level AND YEAR(CURRENT_DATE())-YEAR(supplier_product.date)<1");  /*modified*/
         while ($row = $query->fetch_assoc()) {
             $result[] = $row;   
         }
         return $result;   
     }
    public function count_suppliers(){   //reshani
        $query=$this->mysqli->query("SELECT COUNT(sup_id) FROM supplier");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
     }
    public function count_reminder_items(){   //reshani
        $query=$this->mysqli->query("SELECT COUNT(model.total_quantity<=model.reorder_level AND YEAR(CURRENT_DATE())-YEAR(supplier_product.date)<1) FROM supplier_product,model");
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
    public function count_sold_items(){
        $query=$this->mysqli->query("SELECT COUNT(purchase.item_id) FROM purchase");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
    }
    public function count_stock_details(){
        $query=$this->mysqli->query("SELECT COUNT( DISTINCT product_list.category_id) FROM product_list WHERE product_list.product_status!=0");
        while ($row = $query->fetch_assoc()) {
            $result = $row;   
        }
        return $result;  
    }
    

     public function display_few_stockreminders(){   //reshani  ,view few stock reminders in clerk dashbaord
        // $result="";
   //$query=$this->mysqli->query("SELECT * FROM product WHERE quantity<=reorder_level ORDER BY p_id LIMIT 5");
   $query=$this->mysqli->query("SELECT DISTINCT category.category_name,brand.brand_name FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN supplier_product ON product_list.p_id=supplier_product.p_id WHERE model.total_quantity<=model.reorder_level AND YEAR(CURRENT_DATE())-YEAR(supplier_product.date)<1 ORDER BY category.category_name LIMIT 5");

         while ($row = $query->fetch_assoc()) {
             $result[] = $row;
         }
         return $result;
    }
    public function display_reminder_suppliers($id){          //nuwan
       // $result="";
        $query=$this->mysqli->query("SELECT supplier.email_address,supplier.sup_name,supplier.sup_id,sup_address.address,product_list.p_id,supplier_product.unit_price,items.serial_no,items.item_status FROM supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN sup_address ON supplier_product.sup_id=sup_address.sup_id INNER JOIN product_list ON supplier_product.p_id=product_list.p_id INNER JOIN items ON product_list.p_id=items.p_id AND items.item_status='1' AND product_list.p_id='" . $id . "'");
        while ($row = $query->fetch_assoc()) {               
            $result[] = $row;
        }
        return $result;
    
    }
     public function diplay_return_items(){       //reshani, display retrun items
           $query=$this->mysqli->query("SELECT category.category_name,brand.brand_name,model.model_name,shop_return_items.returned_date,shop_return_items.description FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id INNER JOIN shop_return_items ON items.item_id= shop_return_items.item_id");
           while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    public function display_returnitem($id){          //reshani, display one return item details

        $result="";
        $query=$this->mysqli->query("SELECT items.serial_no,product_list.p_id,category.category_name,brand.brand_name,model.model_name,items.item_id FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id WHERE items.serial_no='" . $id . "'");
        while ($row = $query->fetch_assoc()) {
            $result= $row;
        }
        return $result;
    
    }
    public function shopkeeper_return_items(){        //reshani
        $query=$this->mysqli->query("SELECT product_list.p_id,category.category_name,brand.brand_name,model.model_name,items.serial_no,items.item_id FROM product_list INNER JOIN category ON product_list.category_id=category.category_id INNER JOIN brand ON product_list.brand_id=brand.brand_id INNER JOIN model ON product_list.model_id=model.model_id INNER JOIN items ON product_list.p_id=items.p_id AND items.item_status='1'");
        while ($row = $query->fetch_assoc()) {
            $result[]= $row;
        }
        return $result;
    }
    public function get_supid_serial_no($serial_no){   //reshani
        $result="";
        $query=$this->mysqli->query("SELECT supplier.sup_id,items.serial_no FROM  supplier_product INNER JOIN supplier ON supplier_product.sup_id=supplier.sup_id INNER JOIN items ON supplier_product.p_id=items.p_id AND items.serial_no LIKE '$serial_no'");
        while ($row = $query->fetch_assoc()) {
            $result= $row['sup_id'];
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

    public function add_return_item($sup_id,$returned_date,$description,$item_id){   //reshani,add retrun items to return_items_table
        $stmt=$this->mysqli->prepare("INSERT INTO shop_return_items(sup_id,returned_date,description,item_id) VALUES(?,?,?,?)");
        if($stmt==false){
            return 0;
        }else{
            $stmt->bind_param('ssss',$sup_id,$returned_date,$description,$item_id);
            return $stmt->execute();
        
        }
    }
    public function add_item_status($item_status,$item_id){     //reshani 
        $stmt = $this->mysqli->prepare("UPDATE items SET item_status= ? WHERE item_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('ss',$item_status,$item_id);
            return $stmt->execute();
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
    
}
