<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Get_function extends MY_Controller
{
 public function index_get(){
  $email = $this->session->userdata('email');

  $data= json_decode(file_get_contents("php://input"));
  $slug = isset($data->slug) ? $data->slug :"";

  $this->load->model('Function_model');
  $fun_data=($this->Function_model->all());













  if(count($fun_data)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "functions found",
     "data"   => $fun_data




   ),REST_Controller::HTTP_OK);
  }
  else{
   $this->response( array(
   "status"  => "success",
   "message" => " no function found",
  ),REST_Controller::HTTP_OK);



  }










 }









    }
?>
