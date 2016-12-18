<?php

class Post{


private $db;
 
 function __construct($DB_con){

$this->db= $DB_con;

 }

public function addPost($title,$content,$excerpt,$feature_image,$author){


   $stmt = $this->db->prepare("INSERT INTO posttable(title,content,excerpt,feature_image,post_time,author) VALUES(:title, :content, :excerpt, :feature_image, NOW(),:author)");
   $stmt->bindparam(":title",$title);
   $stmt->bindparam(":content",$content);
   $stmt->bindparam(":excerpt",$excerpt);
  $stmt->bindparam(":feature_image",$feature_image);
  $stmt->bindparam(":author",$author);
  //$stmt->bindparam(":post_time",$post_time);
  
  
   
   $stmt->execute();
   return true;
 
 


}

public function viewPost($query){
$stmt=$this->db->prepare($query);
$stmt->execute();
 if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
//     $tit=trim($row['title']);
// $tit=str_ireplace("","-",$tit);
// echo $tit;
    ?>
   <div class="row"></div>             
<div class="container">
	<div class="jumbotron row">
			<div class="col-xs-12 col-md-3">
				<img src="./upload/<?php echo $row['feature_image'];?>" class="" alt="..." width="250" height="250" > 
			</div>
			<div class="col-xs-12 col-md-8">
				  <h2><?php print($row['title']); ?></h2>
				  <p><?php print($row['excerpt']); ?></p>
				  <p><a class="btn btn-primary btn-lg" href="./post/readPost.php?post_title=<?php echo urldecode($row['title']);?>">Learn more</a></p>
				  <span class="glyphicon glyphicon-time"></span> Posted on <?php echo date('Y-m-d', strtotime($row['post_time'])); ?>  at <?php echo date('H:i A', strtotime($row['post_time']));?>

			 </div>
			 </div>
			 <br/>




</div>



                <?php
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
	
}
public function delPost($postid){

$stmt=$this->db->prepare('DELETE FROM posttable WHERE id=:id ');
$stmt->bindparam(":id",$postid);
$stmt->execute();

return true;

	
}
public function get_post_ids($id){

$stmt= $this->db->prepare("Select * from posttable WHERE id=:id");
$stmt->execute(array(":id"=>$id));
$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;

}
public function editPost($id,$title,$content,$excerpt,$feature_image,$author){
try{
$stmt= $this->db->prepare("UPDATE posttable SET title=:title, content=:content, excerpt=:excerpt, feature_image=:feature_image, post_time= NOW(), author=:author WHERE id=:id");

 $stmt->bindparam(":id",$id); 
 $stmt->bindparam(":title",$title);
 $stmt->bindparam(":content",$content);
 $stmt->bindparam(":excerpt",$excerpt);
$stmt->bindparam(":feature_image",$feature_image);
$stmt->bindparam(":author",$author);

$stmt->execute();
   return true;

	}

catch (PDOException $e){

echo $e->getMessage();
return false;

}
}


public function PostList($querynew){
$stmt = $this->db->prepare($querynew);
  $stmt->execute();

  if($stmt->rowCount()>0)
  {
     $serialno=1;
    

   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                
                <td><?php echo $serialno++; ?></td>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['title']); ?></td>
                <td><?php print($row['post_time']); ?></td>
                
                <td align="center">
                <a href="editPost.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delPost.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
  
 }
 

// Slider fucntions

 public function addSlider($slide_title,$slide_img){

$stmt = $this->db->prepare("INSERT INTO sliders(slide_title,slide_img) VALUES(:slide_title, :slide_img)");
   $stmt->bindparam(":slide_title",$slide_title);
   $stmt->bindparam(":slide_img",$slide_img);
   
  //$stmt->bindparam(":post_time",$post_time);
  
  
   
   $stmt->execute();
   return true;


 
}

public function getSlider($querynew1){

$stmt = $this->db->prepare($querynew1);
  $stmt->execute();

  if($stmt->rowCount()>0)
  {
     $serialno=0;
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
if ($serialno == 0){
     ?>
 

      <div class="item active">
              <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://localhost/cmsweb/banners/<?php 
                 echo $row['slide_img'];?>');"></div>
                <div class="carousel-caption">
                    <h2><?php echo $row['slide_title'];?></h2>
                </div>
            </div>






     <?php
  }else{?>
     

<div class="item">
<div class="fill" style="background-image:url('http://localhost/cmsweb/banners/<?php 
                 echo $row['slide_img'];?>');"></div>
                <div class="carousel-caption">
                    <h2><?php echo $row['slide_title'];?></h2>
                </div>
                </div>
             
 <?php
  }
  $serialno++;
 }


}
}

public function slideList($slideQuery)
{
$stmt = $this->db->prepare($slideQuery);
  $stmt->execute();

  if($stmt->rowCount()>0)
  {
     $serialno=1;
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>

  <tr>
                <td><?php echo $serialno++; ?></td>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['slide_title']); ?></td>
                <td><img src="http://localhost/cmsweb/banners/<?php print($row['slide_img']); ?>" alt="<?php print($row['slide_img']); ?>" width="50" height="50"/></td>
                
                <td align="center">
                <a href="editslide.php?slide_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delSlide.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>
                </tr>



<?php
}
}
else{  ?>

   <tr>
            <td>Nothing here...</td>
            </tr>
            <?php

}
}

public function editSlide($id,$slide_title,$slide_img){

try{
$stmt= $this->db->prepare("UPDATE sliders SET slide_title=:slide_title, slide_img=:slide_img WHERE id=:id");

 $stmt->bindparam(":id",$id); 
 $stmt->bindparam(":slide_title",$slide_title);
 $stmt->bindparam(":slide_img",$slide_img);

$stmt->execute();
   return true;

  }

catch (PDOException $e){

echo $e->getMessage();
return false;

}

}
public function get_slide_ids($id){

$stmt= $this->db->prepare("Select * from sliders WHERE id=:id");
$stmt->execute(array(":id"=>$id));
$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;

}

public function delSlide($id){

$stmt= $this->db->prepare("DELETE FROM sliders WHERE id=:id");
$stmt->bindparam(":id",$id);
$stmt->execute();
return true;

}

}

?>