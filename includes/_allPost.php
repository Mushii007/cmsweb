 <?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/config/db.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/header2.php"); 
?>

<div class="container">


  <table class='table table-bordered table-responsive'>
     <tr>
     <th>Serial #</th>
     <th>Post ID</th>
     <th>Post Tile</th>
     <th>Posted time</th>
     
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
  $query = "SELECT `id`,`title`,`post_time` FROM posttable";       
  // $records_per_page=3;
  // $newquery = $crud->paging($query,$records_per_page);
  $post->PostList($query);
  ?>
    <!-- <tr>
        <td colspan="7" align="center">
    <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
         </div>
        </td>
    </tr> -->
 
</table>

</div>

<?php //include_once './footer.php';

include_once($_SERVER['DOCUMENT_ROOT'] . "/cmsweb/footer.php");
 ?>