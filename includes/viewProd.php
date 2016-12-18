<?php 

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");

?>


      <div class="container">
       <?php
  if( isset($_GET['product_title']))
  {
   ?>

   <?php
         $stmt = $DB_con->prepare("SELECT * FROM products WHERE product_title=:product_title");
         $stmt->execute(array(":product_title"=>$_GET['product_title']));
   
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
           // $pagetitle =$row['title'];
             ?>
      
         
            <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"><?php //echo $row['product_title']; ?></h1>

        <?php  // echo "<li><a href='".BASE_URL."/includes/readPost.php?post_title=$pageTitle'>$pageTitle</a></li>"; ?>
        <?php  // $a=str_replace('/includes/readPost.php?post_title=',$pageTitle,'/cmsweb/'.$pageTitle);

       // ?>
        
        
             </div>
             <div class="col-md-3">
<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date('Y-m-d', strtotime($row['added_date'])); ?>  at <?php echo date('H:i A', strtotime($row['added_date']));?></p>

</div>
           <div class="col-md-3">
<p><span class="glyphicon glyphicon-user"></span> by <a href="#">Start Bootstrap</a></p>

</div>
</div>
 <hr>

                <!-- Preview Image -->
<div class="row">
<div class="col-md-4 col-sm-6 ">
                <img class="img-responsive featured-image" src="<?php echo PRODUCT_IMG.$row['featured_image'];?>" alt="" >
                </div>

                

<div class="col-md-6">
<p class="lead"><h2><?php echo $row['product_title'];?></h2></p>

  <div class="row shortlinks">
          
          <div class="col-md-3">
          <p><span class=""></span> Brand: <a href="#"><?php echo $row['brand'];?></a></p>

          </div>

            <div class="col-md-3">
          <p><span class=""></span> Category: <a href="#"><?php echo $row['category'];?></a></p>

          </div>
            <div class="col-md-3">
          <p><span class=""></span> Quantity: <a href="#"><?php echo $row['quantity'];?></a></p>

          </div>
            <div class="col-md-3">
          <p><span class=""></span> Availablity: <a href="#"><?php
if ($row['quantity'] == 0){
echo "Out of Stock";
}else{
           echo "In Stock";
}
        ?> </a></p> </div>

  </div>

  <div class="row ">
<div class="col-md-8">
<p><?php echo $row['prod_desc'];?></p>

</div>
<div class="col-md-8">
<p><?php echo $row['prod_desc'];?></p>
<a href="#" class="btn btn-primary">Add to Cart</a>
<a href="#" class="btn btn-primary">Add to Wishlist</a>
</div>

  </div>
</div>

</div>

                <hr>


<ul class="nav nav-tabs">
  <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Description</a></li>
  <li class=""><a href="#rating" data-toggle="tab" aria-expanded="true">Rating</a></li>
  <li class=""><a href="#review" data-toggle="tab" aria-expanded="true">Disabled</a></li>
  <!--<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
      <li class="divider"></li>
      <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
    </ul>
  </li>-->
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="description">
    <p><?php echo $row['prod_desc'];?></p>
  </div>
  <div class="tab-pane fade active in" id="rating">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <div class="tab-pane fade active in" id="review">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <!--<div class="tab-pane fade" id="dropdown1">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
  <div class="tab-pane fade" id="dropdown2">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>-->
</div>
         



      <?php
       }
   }
   ?>
      </div>
<?php   

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");


?>