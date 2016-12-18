<?php
include_once 'header2.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");

?>

 <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <!-- <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <?php
            $query= "SELECT * FROM sliders ORDER BY id DESC LIMIT 3 ";

$post->getSlider($query);

        ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

<div class="row"></div>
<div class="col-xs-12 col-md-12">
	
<h1 class="text-center">
	Latest News...

</h1>

</div>

<?php
 $query = "SELECT * FROM posttable"; 
$post->viewPost($query);

?>
			<!--  <div class="jumbotron row">

			 <div class="col-xs-3">
		<img src="/cmsweb/upload/8C1BF38C1E9ADCD1.jpg" class="img-thumbnail img-responsive" alt="..."> 
		</div>
		<div class="col-md-8">
			 <h1>Jumbotron</h1>
				  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				  <p><a class="btn btn-primary btn-lg">Learn more</a></p>
			 </div></div><br/>



			<div class="jumbotron row">
			<div class="col-xs-3">
				<img src="/cmsweb/upload/8C1BF38C1E9ADCD1.jpg" class="img-thumbnail img-responsive" alt="..."> 
			</div>
			<div class="col-md-8">
				  <h1>Jumbotron</h1>
				  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				  <p><a class="btn btn-primary btn-lg">Learn more</a></p>
			 </div></div><br/>

<div class="jumbotron row">
			<div class="col-xs-3">
				<img src="/cmsweb/upload/8C1BF38C1E9ADCD1.jpg" class="img-thumbnail img-responsive" alt="..."> 
			</div>
			<div class="col-md-8">
				  <h1>Jumbotron</h1>
				  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				  <p><a class="btn btn-primary btn-lg">Learn more</a></p>
			 </div></div><br/>

             <div class="jumbotron row">
			<div class="col-xs-3">
				<img src="/cmsweb/upload/8C1BF38C1E9ADCD1.jpg" class="img-thumbnail img-responsive" alt="..."> 
			</div>
			<div class="col-md-8">
				  <h1>Jumbotron</h1>
				  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				  <p><a class="btn btn-primary btn-lg">Learn more</a></p>
			 </div></div><br/> -->




	
 
<?php
include_once 'footer.php';






?>