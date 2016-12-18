<?php 
$pagetitle = 'Delete Slide'; 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");


//$time_date = date('Y-m-d');



if(isset($_POST['btn-del']))
{
 $id = $_GET['delete_id'];
 $post->delPost($id);
 header("Location: delPost.php?deleted"); 
}


?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php"); ?>
<div class="container">

 <?php
 if(isset($_GET['deleted']))
 {
  ?>
        <div class="alert alert-success">
     <strong>Success!</strong> Post was deleted... 
  </div>
        <?php
 }
 else
 {
  ?>
        <div class="alert alert-danger">
     <strong>Sure !</strong> to remove the following Post ? 
  </div>
        <?php
 }
 ?> 
</div>

<div id="page-wrapper">

            <div class="container-fluid">

  
  <?php
  if(isset($_GET['delete_id']))
  {
   ?>
         <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>Post Id</th>
         <th>Post Title</th>
         <th>Post Time</th>
       
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM posttable WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         $inc=1;
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php echo $inc++; ?></td>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['title']); ?></td>
             <td><?php print($row['post_time']); ?></td>
         
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
  }
  ?>
</div>
</div>
<p>
<?php
if(isset($_GET['delete_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="<?php echo BASE_URL; ?>includes/allPost.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="<?php echo BASE_URL; ?>includes/allPost.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>


<?php   
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
?>