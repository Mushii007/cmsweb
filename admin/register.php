<?php 

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
if($user->is_loggedin())
  {
   $user->redirect('/cmsweb/admin/dashbord.php');
  }
 $user_id = isset($_SESSION['user_session']);
  $stmt = $DB_con->prepare("SELECT * FROM users WHERE id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  //echo $userRow['username'];


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
$show_error_email = false;
$show_error_username = false;

if(isset($_POST['btnsave']))
{
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $username = $_POST['username'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $password = md5($_POST['password']);
 

 // $postimage = $_FILES['postimage']['name'];
 // $temp_dir = $_FILES['postimage']['tmp_name'];
 // $postimage_size = $_FILES['postimage']['size'];
//$post_time= $_POST['posttime'];
 //$contact = $_POST['contact_no'];



//       $upload_dir = 'C:\\xampp\\htdocs\\cmsweb\\upload\\'; // upload directory
//       $imgExt = strtolower(pathinfo($postimage,PATHINFO_EXTENSION)); // get image extension
//       $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
// $feature_image = $randstr."_".$time_date.".".$imgExt;
// //$feature_image = rand(1000,1000000).".".$imgExt;
// if(in_array($imgExt, $valid_extensions)){     
//         // Check file size '5MB'
//         if($postimage_size < 5000000)        {
//           move_uploaded_file($temp_dir,$upload_dir.$feature_image);
//       //print_r($_FILES);
//         }
//         else{
//           echo  "Sorry, your file is too large.";
//         }
//       }else{
//         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
//       }
try
      {
         $stmt = $DB_con->prepare("SELECT username,email FROM users WHERE username=:username OR email=:email");
         $stmt->execute(array(':username'=>$username, ':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
          if($row['username']==$username) {
                 $show_error_username = true;
               }
               else if($row['email']==$email) {
                  $show_error_email = true;
               } else {

                 if($user->signup($firstname,$lastname,$username,$email,$phone,$address,$password))
                   {
                  header("Location: register.php?signedup");
                 // echo "Posted!";

                   }
                 else
                   {
                  header("Location: register.php?failure");
                   }
                 }
         
       }
       catch(PDOException $e){
            echo $e->getMessage();

       }

}


 
?>
<br>
<br>
<div class="container">
							
	<div class="row">

	</div>

</div>


<div class="container">
							
	<div class="row">

         <div class="col-md-6 col-md-offset-3">
<!-- Form Starts-->
			<div class="row">

               <div class="well bs-component">
<?php


if($show_error_username) {
           echo "<div class='alert alert-warning'>
    <strong>SORRY!</strong> Username already exist !
 </div>";
         }
 if($show_error_email) {
            echo "<div class='alert alert-warning'>
    <strong>SORRY!</strong> Email address already exist !
 </div>";

         } 

if(isset($_GET['signedup']))
{

 ?>
   
 <div class="alert alert-info">
    <strong>WOW!</strong> Register successfully <a href="index.php">HOME</a>!

 </div>

    <?php
}
else if(isset($_GET['failure']))
{
 ?>


 <div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while signing up !
 </div>

    <?php
}
?>



<form class="form-horizontal" method="post">
  <fieldset>
    <legend>Register For This Site!</legend>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="fname" placeholder="First Name" name="firstname">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Last name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="lname" placeholder="Last name" name='lastname'>
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="uname" placeholder="Username" name="username">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="email_add" placeholder="Email" name="email">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Phone #</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="uphone" placeholder="Phone #" name="phone">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="Address" placeholder="Address" name="address">
      </div>
    </div>


    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox"> Checkbox
          </label>
        </div> -->
      </div>
    </div>
    <!-- <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Radios</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>
        <select multiple="" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div> -->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default" name="btncancel">Cancel</button>
        <button type="submit" class="btn btn-primary" name="btnsave"/ value=""><i class="glyphicon glyphicon-open-file"></i>&nbsp; Register</button>
      </div>
      <br>
      <div class="col-md-8 col-md-offset-2 ">
      	Have already account ?<a href="#"> Login</a> | <a href="#">Lost your password?</a>
      </div>
    </div>
  </fieldset>
</form>






<!--Form Ends-->
				</div>

			</div>

	    </div>
			
	</div>

</div>



<?php   

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");


?>