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
    <a href="#" class="navbar-brand"> WEDDING APP</a>

   </div>

  </div>
  <div class="container" style="padding-top:10px">
   <h3> Driver details</h3>
   <hr>
   <div class="row">
    <form  name="createDriver" class="" action="<?php echo base_url(). 'index.php/allot/create' ?>" method="post">


     <div class="col-md-12">
      <div class="form-group">
       <label> Guest Name</label>
       <input type="text" name="guest_name" value="<?php echo set_value('name',$guest['guest_name']) ?>" class="form-control">
       <?php //echo form_error('driver_name'); ?>
       </div>


    <div class="col-md-12">
     <div class="form-group">
      <label>Driver Name</label>
      <select class="form-control" name="driver">
       <?php
       foreach ($driver as $key => $value) {
        echo '<option value="'.$value['driver_name'].'"  <option>';


        // code...
       } ?>

      </select>
      </div>



        <div class="form-group">
         <label>Car</label>
         <input type="text" name="car" value="<?php //echo set_value('car') ?>" class="form-control">
         <?php //echo form_error('car'); ?>
         </div>

         <div class="form-group">
          <!-- <label>guest</label> -->


          <!-- <select name="guest_name" id="productselect"    class="form-control">
          <?php
              //foreach ($users as $value) {
               	//if ($value["block"] == 0) {
                   //echo "<option value='". $value['uid'] ."'>" .$value['name'] ."</option>";
               //}
              //}
              ?>

          </select> -->



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


<!-- <label class="inline-form">
				Product Category<br>
             	<select name="productcat" id="productselect" multiple="multiple" required>
             		//php
		                // foreach ($cat as $key => $value) {
		                // 	if ($value["block"] == 0) {
		                    	//echo "<option value='". $value['uid'] ."'>" .$value['categoryname'] ."</option>";
		                	}
		                }
	                php
             	</select>
           		<span class="validate"></span>
			</label> -->
