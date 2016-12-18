<?php
$pagetitle = 'All Post';
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
?>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php"); ?>
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
                        <h2>Bordered Table</h2>
                        <div class="table-responsive">
                            <table class='table table-bordered table-responsive'>
								     <tr>
								     <th>Serial #</th>
								     <th>Post ID</th>
								     <th>Post Tile</th>
								     <th>Posted time</th>
								     
								     <th colspan="2" align="center">Actions</th>
								     </tr>
								<?php

								$querylist="SELECT id,title,post_time FROM posttable";

								$post->PostList($querylist);


								?>
								     </table>
                        </div>
                    </div>



                </div>
                </div>
                
<!-- <div class="container">
<table class='table table-bordered table-responsive'>
     <tr>
     <th>Serial #</th>
     <th>Post ID</th>
     <th>Post Tile</th>
     <th>Posted time</th>
     
     <th colspan="2" align="center">Actions</th>
     </tr>
<?php

$querylist="SELECT id,title,post_time FROM posttable";

$post->PostList($querylist);


?>
     </table>
</div> -->






<?php //include_once './footer.php';

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/footer.php");
 ?>