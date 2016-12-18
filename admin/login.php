<?php
$pagetitle="Login";

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");

$show_error_username=false;
 if($user->is_loggedin())
 {
  $user->redirect('/cmsweb/admin/dashbord.php');
 }
if(isset($_POST['login']))
{
 $uname = $_POST['username'];
 $uemail = $_POST['username'];
 $pass = md5($_POST['password']);
$userrole=$_POST['userrole'];



 if($user->signin($uname,$uemail,$pass,$userrole))
 {
$user->redirect('/cmsweb/admin/dashbord.php');


  }
 else
 {
  $error = "Wrong Details !";
 } 

 }

// facebook login



?>

<br>
<br>
<br>
<br>
<br>

			<div class="container">

					<div class="row">

								<div class="col-md-6 col-md-offset-3">
								<div class="well bs-component">
<?php

								if(isset($_GET['err'])){

									echo '<div class="alert alert-warning"><strong>SORRY!</strong> Invalid username and password !</div>';
									// echo '<div class="alert alert-warning profile" style="display:none;"><strong>SORRY!</strong> ERROR while p !</div>';
								
								}
 							if(isset($_GET['failure'])){

									echo '<div class="alert alert-warning profile"><strong>SORRY!</strong> Your profile is in approval!</div>';
								
								}
// 								$id = "Pending";
// 								extract($user->get_user_role($id));
															

// if($user_role){

// 									echo '<div class="alert alert-warning"><strong>SORRY!</strong>Your profile is in approval.</div>';

// }


								?>
									<form class="form-horizontal" method="post">
									<fieldset>
    											<legend>Login</legend>

									<div class="form-group">
      										<label for="inputEmail" class="col-lg-2 control-label">Username</label>
      										<div class="col-lg-10">
        											<input type="text" class="form-control" id="username" placeholder="Username" name="username">
     										 </div>
   									 </div>
   									 <div class="form-group">
      										<label for="inputEmail" class="col-lg-2 control-label">Password</label>
      										<div class="col-lg-10">
        											<input type="password" class="form-control" id="password" placeholder="Password" name="password">
        										<input type="hidden" name="userrole" value="Pending"/>	
     										 </div>
   									 </div>

										 <div class="form-group">
							      <div class="col-md-6 col-md-offset-2">
							        <!-- <button type="reset" class="btn btn-default" name="btncancel">Cancel</button> -->
							        <button type="submit" class="btn btn-primary" name="login" value=""><i class="glyphicon glyphicon-log-in"></i>&nbsp;Login</button>
									


							      </div>
							      <br>
							      <div class="col-md-8 col-md-offset-2 ">
							      	Need account ?<a href="#"> Register</a> | <a href="#">Lost your password?</a>
							      </div>

							    </div>
							    <div class="col-md-10 col-md-offset-2 ">
							      <a href="<?php echo $loginUrl; ?>" class="fblogin"></a>

							      </div>
									</fieldset>
									</form>
								</div>
								</div>


					</div>


			</div>

<?php

			include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");

?>