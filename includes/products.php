<?php 
$pagetitle = 'Products'; 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
?>

<div class="container">
<div class="row">
<div class="col-xs-12 col-md-12">
  
<h1 class=""> Our Products </h1>
</div>
</div>
</div><br/><br/>

<!-- <div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
     <div class="col-md-3 col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
<br>


    <div class="col-md-3 col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
     <div class="col-md-3 col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div> -->
<div class="container">
  <div class="row">
<?php
$productGrid="SELECT * FROM products";

$prod->viewProd($productGrid);


?>
</div></div>
<br><br>

<?php   
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
?>