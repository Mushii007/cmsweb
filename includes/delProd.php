<?php 
$pagetitle = 'Delete Prduct'; 
//include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
//$time_date = date('Y-m-d');

if(isset($_POST['btn-del']))
{
 $id = $_GET['product_id'];
 $prod->delProd($id);
 header("Location: delProd.php?deleted"); 
}


?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); ?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php"); ?>
<div id="page-wrapper">

            <div class="container-fluid">

 <?php
 if(isset($_GET['deleted']))
 {
  ?>
        <div class="alert alert-success">
     <strong>Success!</strong> Slide was deleted... 
  </div>
        <?php
 }
 else
 {
  ?>
        <div class="alert alert-danger">
     <strong>Sure !</strong> to remove the following slide ? 
  </div>
        <?php
 }
 ?> 

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); ?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php"); ?>


  
  <?php
  if(isset($_GET['product_id']))
  {
   ?>
         <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>Product ID</th>
         <th>SKU #</th>
         <th>Product Title</th>
       
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM products WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['product_id']));
         $inc=1;
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php echo $inc++; ?></td>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['sku_no']); ?></td>
             <td><?php print($row['product_title']); ?></td>
        
         
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
  }
  ?>


<p>
<?php
if(isset($_GET['product_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="../includes/prodList.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="<?php echo BASE_URL; ?>includes/products.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div>
</div>



<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php"); 


?>