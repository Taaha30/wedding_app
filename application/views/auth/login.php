<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
 </head>
 <body>

  <div class="container">

  </div>




<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>


<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>


<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
<p> <a  href="<?php echo base_url().'index.php/register'; ?>"> Register </a></p>


</body>
</html> -->
number 1 - convert json to array .
2 . send  that array to controller
3. In controller validate the data
4 in controller send response as an array itself.
5. in login.php page / view convert array response into json and echo it.
