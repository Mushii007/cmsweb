<?php 
$pagetitle = 'Delete Slide'; 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
//$time_date = date('Y-m-d');



if(isset($_POST['btn-del']))
{
 $id = $_GET['delete_id'];
 $post->delSlide($id);
 header("Location: delSlide.php?deleted"); 
}


?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php"); ?>
<div id="page-wrapper">

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




            <div class="container-fluid">
  
  <?php
  if(isset($_GET['delete_id']))
  {
   ?>
         <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>Slide ID</th>
         <th>Slide Title</th>
         <th>Slide Image</th>
       
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM sliders WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         $inc=1;
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php echo $inc++; ?></td>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['slide_title']); ?></td>
             <td><img src="<?php echo BASE_URL ;?>/banners/<?php echo $row['slide_img']; ?>" width="100" height="100"></td>
         
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
if(isset($_GET['delete_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="<?php echo BASE_URL; ?>includes/slides.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div> 
</div>
<?php   
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
?>