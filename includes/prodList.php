<?php
$pagetitle = 'Products List'; 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php");
?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <?php echo $pagetitle ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i><?php echo $pagetitle ?>
                            </li>
                        </ol>
                    </div>
                </div>

<div class="row">
                    <div class="col-lg-12">
<table class='table table-bordered table-responsive'>
     <tr class="warning">
     <th>Serial #</th>
     <th>SKU #</th>
     <th>Product ID</th>
     <th>Product Name</th>
     <th>Product Desc</th>
     <th>Brand</th>
     <th>Category</th>
     <th>Quantity</th>
     <th>Price</th>
     <th>Featured Image</th>
     
     <th colspan="2" align="center">Actions</th>
     </tr>




<?php

$prodlist="SELECT * FROM products";

$prod->prodList($prodlist);
?>
</table>
</div>
</div>
</div>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/footer.php");
?>