<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Get_driver extends MY_Controller
{
 public function __construct() {

 parent::__construct();
  $this->load->model('Driver_model');

 }
 public function index_get(){
  
  $data= json_decode(file_get_contents("php://input"));
  $car = isset($data->car_name) ? $data->car_name :"";


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
