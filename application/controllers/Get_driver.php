<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Get_driver extends REST_Controller
{
 public function index_get(){
  // $email = $this->session->userdata('email');
  // $this->load->model('Wedding_model');
  //
  // $wedding_data=($this->Wedding_model->wed_data($email));
  // $url=$wedding_data["wedding_url"];
  $data= json_decode(file_get_contents("php://input"));
  $car = isset($data->car_name) ? $data->car_name :"";

  $this->load->model('Driver_model');
  $driver_data=($this->Driver_model->all());















  if(count($driver_data)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "car found",
     "data"   => $driver_data




   ),REST_Controller::HTTP_OK);
  }
  else{
   $this->response( array(
   "status"  => "success",
   "message" => " no driver found",
  ),REST_Controller::HTTP_OK);



  }



}










 }










?>
