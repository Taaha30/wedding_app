<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Get_venue extends REST_Controller
{
 public function index_get(){
  $email = $this->session->userdata('email');
  // $this->load->model('Wedding_model');
  //
  // $wedding_data=($this->Wedding_model->wed_data($email));
  // $url=$wedding_data["wedding_url"];
  $data= json_decode(file_get_contents("php://input"));
  $hotel_var = isset($data->hotel_name) ? $data->hotel_name :""; // get hotel name from input



  $this->load->model('Room_model');
  $hotel=($this->Room_model->hotel_check($hotel_var)); // calling function in room model
  $hotel_check=$hotel["hotel_name"]; // get hotel name from table

  $this->load->model('Pickupdrop_model');
  $venue=($this->Pickupdrop_model->all()); // getting room no with associated hotel name

  // $guest_check=$hotel["created_by"]; /// from database getting created by which user
  // $session_check = $this->session->userdata('email'); //checking logged in user














  if(count($venue)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "venue found",
     "data"   => $venue




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
