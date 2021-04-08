<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8">
  <title> Wedding Backend</title>
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
 </head>
 <body>
  <div class="navbar navbar-dark bg-dark">
   <div class="container">
    <a href="#" class="navbar-brand"> Wedding APP</a>
  <!-- <?php// echo json_encode($driver);  ?> -->
   </div>

  </div>
  <div class="container" style="padding-top:10px">
   <div class="row">
    <div class="col-md-6">
     <h3> Driver list</h3>

    </div>
    <div class="col-md-6">
     <a href="<?php echo base_url().'index.php/driver/create'?>" class="btn btn-primary">Create Driver</a>


    </div>


   </div>
   <hr>
   <div class="row">
    <div class="col-md-12">
     <table class="table table-striped">
      <tr>
       <th>ID</th>
       <th>Car Name</th>
       <th>Car no</th>
       <th>Car type</th>

       <th>Edit</th>
       <th>Delete</th>
      </tr>

      <?php  if (!empty($car)) {foreach ($car as $user) {
       // code...
       ?>
      <tr>
       <td><?php echo $user->uid ?></td>
       <td><?php echo $user->car_name ?></td>
       <td><?php echo $user->car_no ?></td>
       <td><?php echo $user->car_type ?></td>
       <td>
        <a href="<?php //echo base_url().'index.php/user/edit/'.$user['uid']; ?>" class="btn btn-primary">Allot</a>
       </td>
       <td>
        <a href="<?php //echo base_url().'index.php/user/delete/'.$user['uid']; ?>" class="btn btn-danger">Delete</a>
       </td>
      </tr>

     <?php } } else { ?>
      <tr>
       <td colspan="5"> Records not found</td>
      </tr>
     <?php } ?>

     </table>

    </div>

        </div>




    </div>
</form>
   </div>


  </div>

 </body>
</html>
