<?php
include_once('db/connection.php');
$page_title='Google - Results';
$search_text='';

$results=null;//array();
$message='';
$type = 'posts';
if (isset($_POST['type'])) {
  $type= htmlspecialchars($_POST['type']);
} else {
  # code...
}
// SEARCH FROM  SEARCH  PAGE
if (isset($_POST['search_text'])) {
  $search_text=$_POST['search_text'];
  $sql="SELECT *  FROM  `".$type."` WHERE `name` LIKE '%".$search_text."%'  OR  `email` LIKE '%".$search_text."%' ORDER BY `id` DESC";
  $results=mysqli_query($db_connection, $sql);
 // $results =mysqli_fetch_assoc($query);
} else {
  $message='no  search  text';
  header('location:index.php');
}
include('components/head.php');

include('components/nav.php');
//var_dump(mysqli_fetch_row($results));
?>
 <div class="container">
  <div class="row">
   <div class="col-12">
    <h3><?= $type?> Results: </h3>
   </div>
   <div class="col-12">
    <?php while($item =mysqli_fetch_row($results)) {  ?>
    <div class="card">
     <div class="card-header">
      <h3><?= $item[1];?></h3>
     </div>
     <div class="card-body">
      <div class="row">
       <div class="col-md-4">
        <img src="./assets/images/posts/<?= $item[3];?>" alt="User profile" class="img img-responsive "style="max-height: 100px;">
       </div>
       <div class="col-md-6">
        <p>
        <?= $item[2];?>
        </p>
        <strong><?= $item[3];?></strong>
       </div>
      </div>
     </div>
    </div>
    <?php } ?>
   </div>
  </div>
 </div>
 <?php  include('components/footer.php')?>