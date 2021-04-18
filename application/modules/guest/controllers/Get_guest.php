<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Get_guest extends MY_Controller
{
 public function index_get(){
  $email = $this->session->userdata('email');
  // $this->load->model('Wedding_model');
  //
  // $wedding_data=($this->Wedding_model->wed_data($email));
  // $url=$wedding_data["wedding_url"];
  $data= json_decode(file_get_contents("php://input"));
  $slug = isset($data->slug) ? $data->slug :"";

  $this->load->model('Guest_model');
  $guest_data=($this->Guest_model->all());











  if(count($guest_data)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "guest found",
     "data"   => $guest_data




   ),REST_Controller::HTTP_OK);
  }
  else{
   $this->response( array(
   "status"  => "success",
   "message" => " no guest found",
  ),REST_Controller::HTTP_OK);



  }
 }









 }









    
?>
