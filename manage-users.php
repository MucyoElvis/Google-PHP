<?php

$page_title='USERS Admin';
include('db/connection.php');
include('components/head.php');

include('components/nav.php');

$sql="SELECT *  FROM  users ORDER BY `id` DESC";
$results=mysqli_query($db_connection, $sql);
?>
 <div class="container">
  
  <div class="row mt-5" >
   <div class="col-5">
   
    <form class="form form-horizontal ">
     <div class="card">
      <div class="card-header bg-info">
       <h1>Welcome </h1>
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
      <input type="submit" name="form" value="save" class="btn btn-info btn-lg btn-block "> 
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
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
     </thead>
     <tbody>
     
    <?php $i=0; while($item =mysqli_fetch_row($results)) { $i++;  ?> 
     <tr>
      <td style="width: 10px;"><?= $i?></td>
      <td style="width: 60px;">
       <a href="?del=ok&id=<?= $item[0]?>?" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
       <a href="?Edit=ok&id=<?= $item[0]?>?" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
      </td>
      <td><?= $item[1]?></td>
      <td><?= $item[2]?></td>
      <td><?= $item[3]?></td>
      </tr>
     <?php } ?>
     </tbody>
     <tfoot>
      <th></th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
     </tfoot>
    </table>
   </div>
  </div>
 </div>
 
 <?php
include('components/footer.php');
?>