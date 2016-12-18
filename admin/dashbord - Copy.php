<?php  
$pagetitle="Dashboard";

include_once("header.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
 include_once("sidebar.php"); 
  if(!$user->is_loggedin())
  {
   $user->redirect('/cmsweb/admin/login.php');
  }
 $user_id = $_SESSION['user_session'];
  $stmt = $DB_con->prepare("SELECT * FROM users WHERE id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  /*echo $userRow['username'];*/
 
?>


<div class="container">
<div class="row">
<div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Dashboard</h1>
            <p class="lead">The brave and the blue</p>
          </div>

</div></div>
<div class="container">
<div class="row">
</div></div><br><br>

<div class="container">
<div class="row">

<!-- <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="list-group table-of-contents">
              <a class="list-group-item" href="#navbar">Navbar</a>
              <a class="list-group-item" href="#buttons">Buttons</a>
              <a class="list-group-item" href="#typography">Typography</a>
              <a class="list-group-item" href="#tables">Tables</a>
              <a class="list-group-item" href="#forms">Forms</a>
              <a class="list-group-item" href="#navs">Navs</a>
              <a class="list-group-item" href="#indicators">Indicators</a>
              <a class="list-group-item" href="#progress-bars">Progress bars</a>
              <a class="list-group-item" href="#containers">Containers</a>
              <a class="list-group-item" href="#dialogs">Dialogs</a>
            </div>
          </div>

 -->          
<div class="col-md-3">
<ul class="nav nav-pills nav-stacked">
    <li class=""><a href="#">Home</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Posts <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">All Post</a></li>
        <li><a href="#">Add new post</a></li>
        <li><a href="#">Categories</a></li>
      </ul>
    </li>
     <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">All Products</a></li>
        <li><a href="#">Add new product</a></li>
        <li><a href="#"></a></li>
      </ul>
    </li>
     <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sliders <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">All Sliders</a></li>
        <li><a href="#">Add new slider</a></li>
        
      </ul>
    </li>
     <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">All Users</a></li>
        <li><a href="#">Add new user</a></li>
        
      </ul>
    </li>
    
    <li><a href="#">Menu 2</a></li>
    <li><a href="#">Menu 3</a></li>
  </ul>
</div>


 </div>
          </div>
<!--<a href="/cmsweb/admin/logout.php?signout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>-->

<?PHP include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php"); ?>
