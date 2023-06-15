<?php

$page_title='Google - Admin';
include('db/connection.php');
include('components/head.php');

include('components/nav.php');
$message= '';
$action = 'Create new Posts';
if(isset($_POST['newitem'])){
   $title = htmlspecialchars($_POST['title']);
   $desc = htmlspecialchars($_POST['description']);
   $datetime = htmlspecialchars($_POST['date']);
   $fileset =  htmlspecialchars($_FILES['file']);
  // $filename =
   $sql = "INSERT INTO `posts` (`title`,`description`,`datetime`) VALUES ('".$title."','".$desc."','".$datetime."')";
  $query = mysqli_query($db_connection, $sql);
  if(!$query){
       $message = mysqli_error($db_connection);
  }else{
       $message = 'successfully inserted post';
     }
}
if(isset($_GET['del'])){
       if($_GET['del'] === 'ok'){
              if(isset($_GET['id'])){
                     $sql='DELETE FROM posts WHERE id ='.$_GET['id'];
                   $res =  mysqli_query($db_connection, $sql);
                   if(!$res){
                     $message = mysqli_error($db_connection);
                   }else{
                     $message = 'successfully deleted post';
                   }
              }   
       }
}
$sql="SELECT *  FROM  posts ORDER BY `datetime` DESC";
$results=mysqli_query($db_connection, $sql);
?>
 <div class="container">
  
  <div class="row mt-5" >
   <div class="col-5">
   
    <form action="" method="POST" enctype="multipart/form-data" class="form form-horizontal">
     <div class="card">
      <div class="card-header bg-info">
       <h3><?=$action?> </h3>
       <strong><?=$message?></strong>
      </div>
      <div class="card-body">
     <div class="form-group">
      <label for="title">
             Title
      </label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
     </div>
     <div class="form-group">
      <label for="title">
             File
      </label>
      <input type="file" class="form-control" name="file" id="file" placeholder="Enter File">
     </div>
     <div class="form-group">
      <label for="title">
             Description
      </label>
      <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
     </div>
     <div class="form-group">
      <label for="title">
             Date
      </label>
      <input type="date" class="form-control" name="date" id="date" placeholder="Enter Date">
     </div>
     </div>
     <div class="card-footer">
      <input type="submit" name="newitem" value="save" class="btn btn-info btn-lg btn-block "> 
      <!-- <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
      <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button> -->
     </div>
     </div>
    </form>
   </div>
   <div class="col-md-7">
    <table class="table table-hovered table-stripped">
     <thead>
      <th>#</th>
      <th></th>
      <th>Title</th>
      <th>Description</th>
      <th>Date</th>
     </thead>
     <tbody>
     
    <?php $i=0; while($item =mysqli_fetch_row($results)) { $i++;  ?> 
     <tr>
      <td style="width: 10px;"><?= $i?></td>
      <td style="width: 60px;">
       <a href="?del=ok&id=<?= $item[0]?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
       <a href="?edit=ok&id=<?= $item[0]?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
      </td>
      <td><?= $item[1]?></td>
      <td><?= $item[2]?></td>
      <td><?= $item[4]?></td>
      </tr>
     <?php } ?>
     </tbody>
     <tfoot>
      <th>#</th>
      <th></th>
      <th>Title</th>
      <th>Description</th>
      <th>Date</th>
     </tfoot>
    </table>
   </div>
  </div>
 </div>
 
 <?php
include('components/footer.php');
?>