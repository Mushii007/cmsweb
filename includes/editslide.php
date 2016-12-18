<?php 
$pagetitle = 'Edit Slide';
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php");
$time_date = date('Y-m-d');
//echo $time_date;
if(isset($_GET['slide_id']))
{
 $id = $_GET['slide_id'];
 extract($post->get_slide_ids($id)); 
}

if(isset($_POST['btnsave']))
{
 $id = $_GET['slide_id'];
 $slide_title = $_POST['slide_title'];
 $slides = $_FILES['slide_img']['name'];
 $temp_dir = $_FILES['slide_img']['tmp_name'];
 $postimage_size = $_FILES['slide_img']['size'];
//$post_time= $_POST['posttime'];
 //$contact = $_POST['contact_no'];
function randStrGen($len){
    $result = "";
    $chars = "ABCDEF0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}


$randstr = randStrGen(16);
if ($slides){
      $upload_dir = 'C:\\xampp\\htdocs\\cmsweb\\banners\\'; // upload directory
      $imgExt = strtolower(pathinfo($slides,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$slide_img = $randstr."_".$time_date.".".$imgExt;
//$feature_image = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($postimage_size < 5000000)        {
          move_uploaded_file($temp_dir,$upload_dir.$slide_img);
		  //print_r($_FILES);
        }
        else{
          echo  "Sorry, your file is too large.";
        }
      }else{
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
}

else{

	 $slide_img;
}



 
 if($post->editSlide($id, $slide_title, $slide_img))
 {
  echo $msg = '<div id="page-wrapper"><div class="alert alert-info">
    <strong>WOW!</strong> Record was updated successfully <a href="index.php">HOME</a>!
    </div></div>';
 }
 else
 {
  echo $msg = '<div id="page-wrapper"><div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while updating record !
    </div></div>';
 }
}


?>

 
    <?php

?>

<div id="page-wrapper">
<?php  //echo isset($successMsg);?> 
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
 
                        <h1 class="page-header">
                           <?php echo $pagetitle; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <?php echo $pagetitle; ?>
                            </li>
                        </ol>
                    </div>
                </div>

  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <form method='post' action="" name="addForm" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Title</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="slide_title" placeholder="Enter Slider Title" name="slide_title" value="<?php echo $slide_title; ?>">
      </div>
    </div>
<!-- <div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Employee Name</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="emp_name" placeholder="Employee name" name="name">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Employee Phone#</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="emp_phone" placeholder="Employee Phone " name="phone">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Employee Email</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="emp_mail" placeholder="Employee Email" name="email">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Employee Address</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="emp_add" placeholder="Employee Code" name="address">
      </div>
    </div>
 -->
    
    <div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Slider Image</label>
      <div class="col-md-9">
      <input type="file" class="form-control" id="slideimg" placeholder="" name="slide_img">
      </div>
      <img src="<?php echo BASE_URL ;?>/banners/<?php echo $slide_img;?>" width="250px" height="250px">
    </div>
    <input type="hidden" value="2016-09-18 16:30" name="posttime">
 <!--<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Created Date</label>
      <div class="col-md-9">
  <input type="text" class="form-control" id="emp_created" placeholder="Employee Created Date" name="created_date">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Update Date</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="emp_update_date" placeholder="Employee Updated Date" name="update_date">
      </div>
    </div> -->

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default" onClick="location.href = 'index.php';">Back</button>
        <button type="submit" class="btn btn-primary" name="btnsave">Publish</button>
      </div>
    </div>
</form>

</div>
</div>
</div>
</div>




<?php   
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
?>