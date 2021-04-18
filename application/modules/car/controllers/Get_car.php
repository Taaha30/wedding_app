<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// require APPPATH .'libraries/REST_Controller.php';

class Get_car extends MY_Controller
{
 public function index_get(){
  // $email = $this->session->userdata('email');
  // $this->load->model('Wedding_model');
  //
  // $wedding_data=($this->Wedding_model->wed_data($email));
  // $url=$wedding_data["wedding_url"];
  $data= json_decode(file_get_contents("php://input"));
  $driver_name = isset($data->driver_name) ? $data->driver_name :"";

  $this->load->model('Car_model');
  $car_data=($this->Car_model->all());















  if(count($car_data)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "car found",
     "data"   => $car_data




   ),REST_Controller::HTTP_OK);
  }
  else{
   $this->response( array(
   "status"  => "success",
   "message" => " no hotel found",
  ),REST_Controller::HTTP_OK);



  }



}










 }










?>
