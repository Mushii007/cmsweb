<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php");
$pagetitle ="Edit Post";

$time_date = date('Y-m-d');
//echo $time_date;
if(isset($_GET['edit_id']))
{
 $id = $_GET['edit_id'];
 extract($post->get_post_ids($id)); 
}

/*Get user name*/
 $user_id = $_SESSION['user_session'];
  $stmt = $DB_con->prepare("SELECT * FROM users WHERE id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $author= $userRow['username'];



if(isset($_POST['btnsave']))
{
 $id = $_GET['edit_id'];
 $title = $_POST['title'];
 $content = $_POST['content'];
 $excerpt = $_POST['excerpt'];
 $postimage = $_FILES['postimage']['name'];
 $temp_dir = $_FILES['postimage']['tmp_name'];
 $postimage_size = $_FILES['postimage']['size'];
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
if ($postimage){
      $upload_dir = "E:\\xampp\\htdocs\\cmsweb\\upload\\"; // upload directory
      $imgExt = strtolower(pathinfo($postimage,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$feature_image = $randstr."_".$time_date.".".$imgExt;
//$feature_image = rand(1000,1000000).".".$imgExt;

if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($postimage_size < 5000000)        {
          move_uploaded_file($temp_dir,$upload_dir.$feature_image);
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

	 $feature_image;
}



 
 if($post->editPost($id, $title, $content, $excerpt,$feature_image,$author))
 {
  echo $msg = '<div id="page-wrapper">
<div class="alert alert-success"> 
    <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!

 </div>
 </div>';
 }
 else
 {
  echo $msg = '<div id="page-wrapper">
<div class="alert alert-danger"> 
    <strong>SORRY!</strong> ERROR while updating record !
    </div>
 </div>';
 }
}


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
      <?php //echo $feature_image;?>
      <input type="text" class="form-control" id="post_title" placeholder="Enter title here" name="title" value="<?php echo $title; ?>">
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
      <label for="textArea" class="col-md-3 control-label">Content</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="6" id="post_content" name="content" value="" style="margin: 0px -0.84375px 0px 0px; width: 556px; height: 250px;"><?php echo 
        $content; ?></textarea>
        <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-md-3 control-label">Excerpt</label>
      <div class="col-md-9">

        <textarea class="form-control" rows="3" id="post_excerpt" name="excerpt" value="<?php echo 
        $excerpt; ?>" style="margin: 0px -0.84375px 0px 0px; width: 556px; height: 93px;"> <?php echo $excerpt;?></textarea>
       <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>-->
      </div>
    </div>
    <div class="form-group">

      <label for="Feature Image" class="col-md-3 control-label">Featured Image</label>
      <div class="col-md-9">
      <input type="file" class="form-control" id="image" placeholder="" name="postimage">
      <br/>
      <img src="<?php echo BASE_URL ;?>/upload/<?php echo $feature_image;?>" width="250px" height="250px">
      </div>
    </div>
    <input type="hidden" value="2016-09-18 16:30" name="posttime">
 

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default" onClick="location.href = '../admin/dashbord.php';">Back</button>
        <button type="submit" class="btn btn-primary" name="btnsave">Update</button>
      </div>
    </div>
 <!--    <table class='table table-bordered'>
 
        <tr>
            <td>Employee Code</td>
            <td><input type='text' name='empcode' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Employee Name</td>
            <td><input type='text' name='name' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Phone</td>
            <td><input type='text' name='phone' class='form-control' required></td>
        </tr>

         <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' required></td>
        </tr>

         <tr>
            <td>Address</td>
            <td><input type='text' name='address' class='form-control' required></td>
        </tr>
 
 
        <tr>
            <td>Created Date</td>
            <td><input type='text' name='created_date' class='form-control' required></td>
        </tr>
 
         <tr>
            <td>Updated Date</td>
            <td><input type='text' name='update_date' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btnsave" />
      <span class="glyphicon glyphicon-plus"></span> Create New Record</button>
   
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table> -->
</form>
     
     </div>
     </div>
</div>
</div>





<?php   
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/footer.php");
?>