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

    public function add_product()
    {
        $product_name = $_POST['product_name'];
        $brand_name = $_POST['brand_name'];
        $model_number = $_POST['model_number'];
        $quantity = $_POST['quntity'];
        $product_cost= $_POST['product_cost'];
        $supplier_id = $_POST['supplier'];
        $warranty = $_POST['warranty'];
        $sales_price = $_POST['sales_price'];
        $serial_number = $_POST['serial_number'];
        $reorder_level = $_POST['reorder_level'];
        $product_status=true;
        $item_status=true;
        $product_date=date("Y-m-d");
        $product_id = $this->sale->get_product_id();
        //print_r($serial_number);
      // $unique_serial_number= $this->unique_serial_number($serial_number,$product_id,$quantity);
 

            //$row=$serial_number[1]."#".$product_id;
           // print_r($row);

            foreach ($serial_number as $key =>$value){
                 $serial_number[$key]=$value."#".$product_id;
            }
//            print_r($serial_number);

      //  print_r($product_date);
       // print_r($item_status);
      //  print_r($product_id);
       // print_r($quantity);
    if($this->sale->add_new_product($product_id,$product_name,$product_cost,$brand_name,$reorder_level,$model_number,$quantity,$warranty,$product_status,$product_date,$serial_number,$sales_price,$item_status,$supplier_id)){
        header('location: ../views/newproduct.php');
    }else{
            echo "dhskfshdj";
    }

    }
    public function valid_prodcuts(){
        return $this->sale->view_products();
    }
    public function sell($id){
       print_r($id);

   //   header('location: ../views/bill.php');
    }

    public function dashbord_search($id)
    {
        // print_r($id);
        $row=$this->sale->dashbord_search($id);
        echo $row;
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
}else if(isset($_GET['action']) && $_GET['action'] == '') {
     $id=$_POST['search'];
    $controller->dashbord_search($id);
}



/*
dashbord_search
<script type="text/javascript">
    $(document).ready(function(){
        load_data();
        function load_data(query)
          {
              $.ajax({
                  url:"../controller/authenitication.php?action=search",
                  method:"post",
                  data:{query:query},
                  success:function(data)
                  {
                      $('#view-tbl').html(data);
                  }
              });
          }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });





<table id="table-data">
            <thead>
            <tr>
                <th>User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Job Position</th>
                <th scope="col">Active/non-Active</th>
                <th scope="col">View Details</th>
            </tr>
            </thead>
            <tbody>
                    <?php

                       foreach ($sql as $k => $v){
                             ?>


            <tr>
                 <td><?php echo $sql[$k]["emp_id"] ?></td>
                <td><?php echo $sql[$k]["username"] ?></td>
                 <td><?php echo $sql[$k]["position"] ?></td>
                <td><label class="switch">

                        <input type="checkbox" id="active" onclick="active()">
                        <span class="slider round"></span>

                    </label>
                </td>
                <td><a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>" class="view"><button>View</button></a></td>
            </tr>
                      <?php

                         } ?>
            </tbody>


        </table>
*/
