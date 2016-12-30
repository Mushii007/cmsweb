<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--   <title>Bootstrap Example</title>
 --> 
       
<?php
$sitename = 'WEBBASE CMS';
$pagetitle;

if(isset($pagetitle)){
 echo "<title>".$pagetitle." | ". $sitename."</title>";
} 
  else {
echo "<title>".$sitename."</title>";
}
?>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link href="./css/stickey-footer.css" rel="stylesheet" media="screen">  -->
  <link rel="stylesheet" href="http://localhost/cmsweb/css/bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/cmsweb/css/style.css">
  <!--  <link href="./css/full-slider.css" rel="stylesheet"> -->
  
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      /*margin-bottom: 50px;*/
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      
    }
  </style>
</head>
<body>

<!-- <div class="jumbotron">
  <div class="container text-center">
    <h1>Online Store</h1>
    <p>Mission, Vission & Values</p>
  </div>
</div> -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header col-md-2">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/cmsweb/">Mobile CMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/cmsweb">Home</a></li>
        <li><a href="/cmsweb/">Posts</a></li>
         <li><a href="<?php echo BASE_URL;?>includes/products.php">Products</a></li>

        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
       <!-- <li><a href="#">Contact</a></li>-->
      <?php if($user->is_loggedin()){ ?>
        <li class="dropdown">
          <a href="admin/dashbord.php" class="" data-toggle=""  role="button" aria-expanded="false">&nbsp; Dashboard</a>
        <!-- <ul class="dropdown-menu" role="menu">
            <li><a href="/cmsweb/includes/allPost.php">All Posts</a></li>
            <li><a href="/cmsweb/includes/addPost.php">Add post</a></li>
            <li><a href="#">Category</a></li>
            <li class="divider"></li>
            <li><a href="#">Users</a></li>
             <li class="divider"></li>
            <li class="dropdown"><a href="/cmsweb/includes/Slides.php">Sliders</a></li>
            <li><a href="/cmsweb/includes/addSlide.php">Add Slides</a></li>
            <li class="divider"></li>
            <li class="dropdown"><a href="/cmsweb/includes/prodList.php">Products</a></li>
            <li><a href="/cmsweb/includes/addProduct.php">Add Products</a></li>
            <li class="divider"></li>
            <li><a href="#">Help?</a></li>
          </ul>-->
        </li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
              if($user->is_loggedin()){

$user_id = $_SESSION['user_session'];
  $stmt = $DB_con->prepare("SELECT * FROM users WHERE id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
                ?>
<li><a href="/cmsweb/user/dashboard.php">Welcome  &nbsp; <span class="glyphicon glyphicon-user"></span> &nbsp;  <?php echo $userRow['username'];?>
  </a></li>
       
                 <li> <a href="/cmsweb/admin/logout.php?signout=true"><i class="glyphicon glyphicon-log-out"></i> SignOut</a></li>

                <?php
              }

if (isset($accessToken)) {
 
  // redirect the user back to the same page if it has "code" GET variable
  //if (isset($_GET['code'])) {
  //  header('Location: ./');
  //}

  // getting basic info about user
  try {
    $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
    $userNode = $profile_request->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    // redirecting user back to app login page
    header("Location: ./");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=32';
  ?>
<!--<li><a href="admin/dashbord.php" class="" data-toggle=""  role="button" aria-expanded="false">&nbsp; Dashboard</a></li>-->
  <li><a href="/cmsweb/user/dashbord.php">Welcome  &nbsp;  <?php echo $userNode->getName();?>
  </a></li>
       
                 <li> <a href="/cmsweb/admin/slogout.php"><i class="glyphicon glyphicon-log-out"></i> SignOut</a></li>
                  <li>  &nbsp; <img src="<?php echo $image;?>" class="profileimg" width="" height=""></li>
  <?php

    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
}

              else{
if ($user->is_loggedin()){
   echo '<li style="display:none;"><a href="/cmsweb/user/register.php"><span class="glyphicon glyphicon-user"></span> &nbsp; Sign Up</a></li>';
       
     echo   '<li style="display:none;"><a href="/cmsweb/user/login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sign In</a></li>';
}else{
        ?>
         <li><a href="/cmsweb/user/register.php"><span class="glyphicon glyphicon-user"></span> &nbsp; Sign Up</a></li>
       
        <li><a href="/cmsweb/user/login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sign In</a></li>
        <?php
                      }
      }  
        
      ?>
      </ul>
    </div>
  </div>
</nav>

