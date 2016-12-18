<?php
$pagetitle = 'Slides';
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");

?>


<?php 
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
     <tr>
     <th>Serial #</th>
     <th>Slide ID</th>
     <th>Slide Title</th>
     <th>Slide Img</th>
   
     <th colspan="3" align="center">Actions</th>
     </tr>
<?php

$slideList="SELECT id,slide_title,slide_img FROM sliders";

$post->slideList($slideList);


?>
     </table>
</div>
</div>
</div>
</div>






<?php //include_once './footer.php';

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
 ?>