<?php
$pagetitle= "Add Products";
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");

$time_date = date('Y-m-d');
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



if(isset($_POST['btnsave']))
{
 $sku_no = $_POST['sku_no'];
 $prod_title = $_POST['product_title'];
 $product_desc = $_POST['product_desc'];
 $brand = $_POST['brand'];
 $category = $_POST['category'];
 $quantity = $_POST['quantity'];
 $price = $_POST['price'];
 $product_image = $_FILES['product_image']['name'];
 $temp_dir = $_FILES['product_image']['tmp_name'];
 $product_image_size = $_FILES['product_image']['size'];
//$post_time= $_POST['posttime'];
 //$contact = $_POST['contact_no'];



      $upload_dir = 'E:\\xampp\\htdocs\\cmsweb\\upload\\'; // upload directory
      $imgExt = strtolower(pathinfo($product_image,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$feature_image = $randstr."_".$time_date.".".$imgExt;
//$feature_image = rand(1000,1000000).".".$imgExt;
if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($product_image_size < 5000000)        {
          move_uploaded_file($temp_dir,$upload_dir.$feature_image);
		  //print_r($_FILES);
        }
        else{
          echo  "Sorry, your file is too large.";
        }
      }else{
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }

 
 
 if($prod->addProd($sku_no,$prod_title,$product_desc,$brand,$category,$quantity,$price,$feature_image))
 {
  header("Location: addProduct.php?inserted");
 // echo "Posted!";

 }
 else
 {
  header("Location: addProduct.php?failure");
 }
}
?>


<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/header.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/admin/sidebar.php"); 
?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{

 ?>
   <div id="page-wrapper">
<div class="alert alert-success"> 
    <strong>WOW!</strong> Product was inserted successfully <a href="index.php">HOME</a>!

 </div>
 </div>
    <?php
}
else if(isset($_GET['failure']))
{
 ?>
   <div class="page-wrapper">
 <div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting Product !
 </div>
 </div>
    <?php
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
  <form method='post' action="" name="addForm" class="form-horizontal" enctype="multipart/form-data">
 	<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">SKU #</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="sku_no" placeholder="0000" name="sku_no">
      </div>
    </div>

<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Title</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="producttitle" placeholder="Title" name="product_title">
      </div>
    </div>

<div class="form-group">
      <label for="textArea" class="col-md-3 control-label">Product Description</label>
      <div class="col-md-9">
        <textarea class="form-control" rows="6" id="proddesc" name="product_desc" style="margin: 0px -0.84375px 0px 0px; width: 556px; height: 250px;"></textarea>
        <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
      </div>
    </div>

<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Brand</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="productbrand" placeholder="Brand" name="brand">
      </div>
    </div>

<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Category</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="pro_category" placeholder="Category" name="category">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Quantity</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="pro_quantity" placeholder="Quantity" name="quantity">
      </div>
    </div>
<div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Price</label>
      <div class="col-md-9">
      <input type="text" class="form-control" id="prod_price" placeholder="Price" name="price">
      </div>
    </div>

 
    
    <div class="form-group">
      <label for="empcode" class="col-md-3 control-label">Featured Image</label>
      <div class="col-md-9">
      <input type="file" class="form-control" id="productimage"  name="product_image">
      </div>
    </div>
<!--     <input type="hidden" value="2016-09-18 16:30" name="posttime">
 -->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default" onClick="location.href = 'index.php';">Back</button>
        <button type="submit" class="btn btn-primary" name="btnsave">Publish</button>
      </div>
    </div>

</form>
     <!-- <Form ends> -->
     </div>
     <!-- Col-md-12 ends -->
     </div>
     <!--row ends-->
















<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php"); 
?>
