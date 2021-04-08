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
   <h3> Add car</h3>
   <hr>
   <div class="row">
    <form  name="createCar" class="" action="<?php echo base_url(). 'index.php/car/create' ?>" method="post">


    <div class="col-md-12">
     <div class="form-group">
      <label>Car Name</label>
      <input type="text" name="car_name" value="<?php echo set_value('car_name') ?>" class="form-control">
      <?php echo form_error('car_name'); ?>
      </div>


       <div class="form-group">
        <label>Car no</label>
        <input type="text" name="car_no" value="<?php echo set_value('car_no') ?>" class="form-control">
        <?php echo form_error('car_no'); ?>
        </div>
        <div class="form-group">
         <label>Car Type</label>
         <select name="car_type" id="cars" class="form-control">
        <option value="sedan">4 seater Sedan</option>
        <option value="suv">6 seater Suv</option>
         <option value="small">4 seater Hatchback</option>

        </select>

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
