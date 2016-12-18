<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");

?>


      <div class="container">
       <?php
  if(isset($_GET['post_id']) || isset($_GET['post_title']))
  {
   ?>

   <?php
         $stmt = $DB_con->prepare("SELECT * FROM posttable WHERE title=:title");
         $stmt->execute(array(":title"=>$_GET['post_title']));
   
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
            $pageTitle=$row['title'];
             ?>
      
         
            <div class="row">
            <div class="col-md-12">
            <h1 class="text-center"><?php echo $row['title']; ?></h1>

        <?php  // echo "<li><a href='".BASE_URL."/includes/readPost.php?post_title=$pageTitle'>$pageTitle</a></li>"; ?>
        <?php  // $a=str_replace('/includes/readPost.php?post_title=',$pageTitle,'/cmsweb/'.$pageTitle);

       // ?>
        
          <hr>
             </div>
             <div class="col-md-3">
<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date('Y-m-d', strtotime($row['post_time'])); ?>  at <?php echo date('H:i A', strtotime($row['post_time']));?></p>

</div>
           <div class="col-md-3">
<p><span class="glyphicon glyphicon-user"></span> by <a href="#">Start Bootstrap</a></p>

</div>
</div>
 <hr>

                <!-- Preview Image -->
<div class="row">
<div class="col-md-12 ">
                <img class="img-responsive featured-image" src="/cmsweb/upload/<?php echo $row['feature_image'];?>" alt="" >
                </div>
</div>
                <hr>
<div class="row">
<div class="col-md-12 post_content">
<p class="lead"><?php echo $row['content'];?></p>
</div>
</div>

                <hr>



         



      <?php
       }
   }
   ?>
      </div>
<?php   

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");


?>