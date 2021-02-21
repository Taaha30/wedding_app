<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8">
  <title> wedding crud</title>
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
 </head>
 <body>
  <div class="navbar navbar-dark bg-dark">
   <div class="container">
    <a href="#" class="navbar-brand"> Wedding APP</a>

   </div>

  </div>
  <div class="container" style="padding-top:10px">
   <div class="row">
    <div class="col-md-6">
     <h3> guest list</h3>

    </div>
    <div class="col-md-6">
     <a href="<?php echo base_url().'index.php/user/create'?>" class="btn btn-primary">Create Guest</a>
     <a href="<?php echo base_url().'index.php/auth/logout'?>" class="btn btn-primary">logout</a>



    </div>


   </div>
   <hr>
   <div class="row">
    <div class="col-md-12">
     <table class="table table-striped">
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Email</th>
       <th>Contact</th>
       <th>Location</th>

       <th>Allot</th>
       <th>Delete</th>
      </tr>

      <?php  if (!empty($users)) {foreach ($users as $user) {
       // code...
       ?>
      <tr>
       <td><?php echo $user['uid'] ?></td>
       <td><?php echo $user['guest_name'] ?></td>
       <td><?php echo $user['email'] ?></td>
       <td><?php echo $user['contact'] ?></td>
       <td><?php echo $user['location'] ?></td>
       <td>
        <a href="<?php echo base_url().'index.php/allot/allot_guest/'.$user['uid']; ?>" class="btn btn-primary">Allot</a>
       </td>
       <td>
        <a href="<?php echo base_url().'index.php/user/delete/'.$user['uid']; ?>" class="btn btn-danger">Delete</a>
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
