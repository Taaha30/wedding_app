<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8">
  <title> basic crud</title>
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
 </head>
 <body>
  <div class="navbar navbar-dark bg-dark">
   <div class="container">
    <a href="#" class="navbar-brand"> CRUD APP</a>

   </div>

  </div>
  <div class="container" style="padding-top:10px">
   <h3> Guest details</h3>
   <hr>
   <div class="row">
    <form  name="createUser" class="" action="<?php echo base_url(). 'index.php/user/create' ?>" method="post">


    <div class="col-md-12">
     <div class="form-group">
      <label>Guest Name</label>
      <input type="text" name="guest_name" value="<?php echo set_value('guest_name') ?>" class="form-control">
      <?php echo form_error('name'); ?>
      </div>

      <div class="form-group">
       <label>Email</label>
       <input type="text" name="email" value="<?php echo set_value('email') ?>" class="form-control">
       <?php echo form_error('email'); ?>
       </div>
       <div class="form-group">
        <label>Contact no</label>
        <input type="text" name="contact" value="<?php echo set_value('contact') ?>" class="form-control">
        <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
         <label>location</label>
         <input type="text" name="location" value="<?php echo set_value('location') ?>" class="form-control">
         <?php echo form_error('email'); ?>
         </div>

       <div class="form-group">
        <button class="btn btn-primary">Create </button>
        <a href="<?php echo base_url().'index.php/user/index'?>" class="btn btn-secondary"> Cancel </a>
        </div>




    </div>
</form>
   </div>


  </div>

 </body>
</html>
