
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Get_wedding extends REST_Controller
{
 public function index_get(){
  $email = $this->session->userdata('email');
  $this->load->model('Wedding_model');

  $wedding_data=($this->Wedding_model->wedding_data($email));
  // var_dump($wedding_data);




  if(count($wedding_data)> 0){
   $mainarray = array();
   $upcomingarray = array();
   $pastarray = array();
   foreach($wedding_data AS $key => $value){
     if(strtotime($value->guest_end) > time()){
      
      $upcomingarray[] = $value;
     }else{
      $pastarray[] = $value;
     }
   }
   $mainarray["upcoming"] = $upcomingarray;
   $mainarray["past"] = $pastarray;
   // var_dump($mainarray);

   $this->response(array(
    "status"  => "success",
    "message" => "wedding found",
     "data"   => $mainarray




   ),REST_Controller::HTTP_OK);
  }
  else{
   $this->response( array(
   "status"  => "success",
   "message" => " no wedding found",
  ),REST_Controller::HTTP_OK);



  }









 }









    }
?>
