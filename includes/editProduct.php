<?php 
$pagetitle= "Edit Product";
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php");
$time_date = date('Y-m-d');
//echo $time_date;
if(isset($_GET['product_id']))
{
 $id = $_GET['product_id'];
 extract($prod->get_prod_ids($id)); 
}

if(isset($_POST['btnsave']))
{
 $id = $_GET['product_id'];
 $sku_no = $_POST['sku_no'];
 $product_title = $_POST['product_title'];
 $prod_desc = $_POST['prod_desc'];
 $brand = $_POST['brand'];
 $category = $_POST['category'];
 $quantity = $_POST['quantity'];
 $price = $_POST['price'];
 // $content = $_POST['content'];
 // $excerpt = $_POST['excerpt'];
 $productimg = $_FILES['featured_image']['name'];
 $temp_dir = $_FILES['featured_image']['tmp_name'];
 $productimg_size = $_FILES['featured_image']['size'];
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
if ($productimg){
      $upload_dir = 'E:\\xampp\\htdocs\\cmsweb\\upload\\'; // upload directory
      $imgExt = strtolower(pathinfo($productimg,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
 $featured_image = $randstr."_".$time_date.".".$imgExt;
//$feature_image = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($productimg_size < 5000000)        {
          move_uploaded_file($temp_dir,$upload_dir.$featured_image);
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

	 $featured_image;
}


?>
<div id="page-wrapper">
<?php
 
 if($prod->updateProd($id,$sku_no,$product_title,$prod_desc,$brand,$category, $quantity, $price,$featured_image))
 {
  echo $msg = "<div class='alert alert-info'>
    <strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
    </div>";
 }
 else
 {
  echo $msg = "<div class='alert alert-warning'>
    <strong>SORRY!</strong> ERROR while updating record !
    </div>";
 }
}


?>


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
      <label for="empcode" class="col-md-3 control-label">SKU # </label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="sku" placeholder="0000" name="sku_no" value="<?php echo $sku_no; ?>">
      </div>
    </div>
 <div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Product Title</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="prodtitle" placeholder="Title" name="product_title" value="<?php echo $product_title;?>">
      </div>
    </div>

<div class="form-group">
      <label for="textArea" class="col-md-3 control-label">Product Description</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="6" id="prodDesc" name="prod_desc" value="" style="margin: 0px -0.84375px 0px 0px; width: 556px; height: 250px;"><?php echo 
        $prod_desc; ?></textarea>
        <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
      </div>
    </div>


<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Brand</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="prod_brand" placeholder="Brand " name="brand" value="<?php echo $brand;?>">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Category</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="prod_category" placeholder="Category" name="category" value="<?php echo $category;?>">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Quantity</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="prodquantity" placeholder="Quantity" name="quantity" value="<?php echo $quantity;?>">
      </div>
    </div>
 
    <div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Price</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="prodprice" placeholder="Price" name="price" value="<?php echo $price;?>">
      </div>
    </div>
    <!-- <div class="form-group">
      <label for="textArea" class="col-md-3 control-label">Excerpt</label>
      <div class="col-md-9">

        <textarea class="form-control" rows="3" id="post_excerpt" name="excerpt" value="<?php echo 
        $excerpt; ?>" style="margin: 0px -0.84375px 0px 0px; width: 556px; height: 93px;"> <?php echo $excerpt;?></textarea>
       <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div> -->
    <div class="form-group">

      <label for="Feature Image" class="col-md-3 control-label">Featured Image</label>
      <div class="col-md-9">
      <input type="file" class="form-control" id="image" placeholder="" name="featured_image" value="<?php //echo $postimage;?>">
      <br/>
      <img src="<?php  echo PRODUCT_IMG.$featured_image; ?>" width="250px" height="250px">
      </div>
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
        <button type="reset" class="btn btn-default" onClick="location.href = '/cmsweb';">Back</button>
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
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
?>