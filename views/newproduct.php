<?php
include 'clerk_sidebar.php';
require '../controller/sales.php';
$data=new sales();
$sql=$data->get_supplier_names();
//print_r($sql);
?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
    <link rel="stylesheet" href="../public/css/test.css">
</head>
<div class="content" style="width: auto;">
    <h1 id="tbl-heading"  >Add new Product</h1>

    <form action="../controller/sales.php?action=add_product" method="post">
        <div class="update-tbl">
            <table>
                <tbody>

                <tr>
                    <th>Product Name</th>
                    <td>
                        <input class="text" type="text" name="product_name" placeholder="Product Name" required="">
                    </td>
                </tr>
                <tr>
                    <th>Brand Name</th>
                    <td>
                        <input class="text" type="text" name="brand_name" placeholder="brand_name" required="">
                    </td>
                </tr>
                <tr>
                    <th>Model Number</th>
                    <td>
                        <input class="text" type="text" name="model_number" placeholder="model_number" required="">

                    </td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>
                        <input class="text" type="number" name="quntity" placeholder="Quantity" required="">

                    </td>
                </tr>
                <tr>
                    <th>Product Cost</th>
                    <td>
                        <input class="text" type="text" name="product_cost" placeholder="product_cost" required="">

                    </td>
                </tr>
                <tr>
                    <th>Sales Price</th>
                    <td>
                        <input class="text" type="text" name="sales_price" placeholder="sales_price" required="">

                    </td>
                </tr>
                <tr>
                    <th>Warranty</th>
                    <td>
                        <input class="text" type="text" name="warranty" placeholder="warranty" required="">

                    </td>
                </tr>

                <tr>
                    <th>Supplier</th>
                    <td>
                        <div class="container">
                            <div class="main">

                                <select class="select_supplier" name="supplier" >
                                    <?php

                                    foreach ($sql as $k => $v){
                                        ?>
                                        <option value="<?php echo $sql[$k]["sup_id"] ?>"><?php echo $sql[$k]["sup_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                    </td>
                </tr>

                <tr>
                    <th>Re-Order Level</th>
                    <td>
                        <input class="text" type="text" name="reorder_level" placeholder="reorder_level" required="">

                    </td>
                </tr>

                <tr>
                    <th>Serial Number</th>



                    <td>
                        <table id="mytable">
                            <tbody>
                            <tr id="template">
                                <td>
                                    <input id="name" class="text" type="text" name="serial_number[]" placeholder="serial_number" required="" />
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </td>




                </tr>

                <tr>

                    <td>
                        <button id="add" style="float: right;">Add new row</button>

                    </td>

                </tr>



                <tr>
                    <td colspan=2><input type="submit" name="add_product" value="Add"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
<div class="footerc">
			<p>© Tactota Solutions All rights reserved </p>
      </div>
</div>

<script>
    function create_custom_dropdowns() {
        $('select').each(function (i, select) {
            if (!$(this).next().hasClass('dropdown-select')) {
                $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function (j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });

        $('.dropdown-select ul').before('<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()" class="dd-searchbox" type="text"></div>');
    }

    // Event listeners

    // Open/close
    $(document).on('click', '.dropdown-select', function (event) {
        if($(event.target).hasClass('dd-searchbox')){
            return;
        }
        $('.dropdown-select').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });

    // Close when clicking outside
    $(document).on('click', function (event) {
        if ($(event.target).closest('.dropdown-select').length === 0) {
            $('.dropdown-select').removeClass('open');
            $('.dropdown-select .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });

    function filter(){
        var valThis = $('#txtSearchValue').val();
        $('.dropdown-select ul > li').each(function(){
            var text = $(this).text();
            (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();
        });
    };
    // Search

    // Option click
    $(document).on('click', '.dropdown-select .option', function (event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown-select').find('.current').text(text);
        $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown-select', function (event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
        // Space or Enter
        //if (event.keyCode == 32 || event.keyCode == 13) {
        if (event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function () {
        create_custom_dropdowns();
    });

</script>
<!--
<script>

    $(document).ready(function() {
        $("#add").click(function() {
            $('#mytable tbody>tr:last').clone(true).insertAfter('#mytable tbody>tr:last');
            $('#mytable tbody>tr:last #name').val('');
            return false;
        });
    });
</script>
-->
<script>
    var row = 1;
    $(function() {
        $('#add').click(function(e) {
            e.preventDefault();
            var template = $('#template')
                .clone()                        // CLONE THE TEMPLATE
                .attr('id', 'row' + (row++))    // MAKE THE ID UNIQUE
                .appendTo($('#mytable tbody'))  // APPEND TO THE TABLE
                .show();
            // SHOW IT
            $('#mytable tbody>tr:last #name').val('');
        });

    });
</script>

