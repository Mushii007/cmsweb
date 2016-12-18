<?php

class Product{

private $db1;

function __construct($DB_con){

$this->db1= $DB_con;

 }

public function addProd($sku,$prod_title,$prod_desc,$brand,$category,$quantity,$price,$featured_image){
$stmt=$this->db1->prepare("INSERT INTO products
(sku_no,product_title,prod_desc,brand,category,quantity,price,featured_image,added_date) VALUES(:sku_no,:product_title,:prod_desc,:brand,:category,:quantity,:price,:featured_image,NOW())");
$stmt->bindparam(":sku_no",$sku);
$stmt->bindparam(":product_title",$prod_title);
$stmt->bindparam(":prod_desc",$prod_desc);
$stmt->bindparam(":brand",$brand);
$stmt->bindparam(":category",$category);
$stmt->bindparam(":quantity",$quantity);
$stmt->bindparam(":price",$price);
$stmt->bindparam(":featured_image",$featured_image);

$stmt->execute();
return true;

}
public function singleProd(){





}
public function viewProd($query){
$stmt=$this->db1->prepare($query);
$stmt->execute();
 if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
   	?>


 <div class="col-md-3 col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading product_heading">
<div class="row">
        <div class="col-md-8"><a href="<?php  echo BASE_URL;?>/post/viewProd.php?product_title=<?php echo $row['product_title']; ?>"><?php echo  $row['product_title']?></a></div>
        	        <div class="col-md-4"><b><?php echo  $row['price']." Rs.";?></b></div>
        	        </div>
        </div>
        <div class="panel-body product_img"><img src="<?php echo PRODUCT_IMG.$row['featured_image']; ?>" class="img-responsive"  alt="<?php echo $row['featured_image'];?>"></div>
        <div class="panel-footer">
        <div class="row">
        <div class="col-md-6"><?php echo $row['sku_no'];?><br>
<a href=""><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>

        </div>
        	        <div class="col-md-6"><a href="#" class="btn btn-primary">Add to Cart</a></div>

</div>
        </div>
      </div>
    </div>


 

   	<?php
   }
}
}
public function get_prod_ids($id){
$stmt= $this->db1->prepare("Select * from products WHERE id=:id");
$stmt->execute(array(":id"=>$id));
$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
}
public function updateProd($id,$sku_no,$product_title,$prod_desc,$brand,$category,$quantity,$price,$featured_image){

try{
$stmt= $this->db1->prepare("UPDATE products SET sku_no=:sku_no, product_title=:product_title, prod_desc=:prod_desc, brand=:brand, category=:category, quantity=:quantity, price=:price, featured_image=:featured_image WHERE id=:id");

 $stmt->bindparam(":id",$id); 
 $stmt->bindparam(":sku_no",$sku_no);
 $stmt->bindparam(":product_title",$product_title);
 $stmt->bindparam(":prod_desc",$prod_desc);
 $stmt->bindparam(":brand",$brand);
 $stmt->bindparam(":category",$category);
 $stmt->bindparam(":quantity",$quantity);
 $stmt->bindparam(":price",$price);
$stmt->bindparam(":featured_image",$featured_image);

$stmt->execute();
   return true;

	}

catch (PDOException $e){

echo $e->getMessage();
return false;

}




}

public function delProd($id){

$stmt=$this->db1->prepare("DELETE FROM products WHERE id=:id");
$stmt->bindparam(":id",$id);
$stmt->execute();
return true;


}

public function prodList($querynew){

$stmt = $this->db1->prepare($querynew);
  $stmt->execute();

  if($stmt->rowCount()>0)
  {
     $serialno=1;
    

   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
?>

 <tr>
                
                <td><?php echo $serialno++; ?></td>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['sku_no']); ?></td>
                <td><?php print($row['product_title']); ?></td>
               <td><?php print($row['prod_desc']); ?></td>
                <td><?php print($row['brand']); ?></td>
                <td><?php print($row['category']); ?></td>
                <td><?php print($row['quantity']); ?></td>
                <td><?php print($row['price']); ?></td>
                <td><img src="<?php echo PRODUCT_IMG.$row['featured_image']; ?>" width="50" height="50"/></td>
               
                <td align="center">
                <a href="editProduct.php?product_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delProd.php?product_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>





<?php


}

}

}
}

?>