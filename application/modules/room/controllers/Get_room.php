<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Get_room extends MY_Controller
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

  $this->load->model('Room_model');
  $room_data=($this->Room_model->room_data($hotel_var)); // getting room no with associated hotel name

  // $guest_check=$hotel["created_by"]; /// from database getting created by which user
  // $session_check = $this->session->userdata('email'); //checking logged in user



   if ($hotel_var===$hotel_check)     // checking if the requested hotel exist in table db
   {










  if(count($room_data)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "room associated with hotel found",
     "data"   => $room_data




   ),REST_Controller::HTTP_OK);
  }
  else{
   $this->response( array(
   "status"  => "success",
   "message" => " no hotel found",
  ),REST_Controller::HTTP_OK);



  }

}
 else {
  $this->response( array(
 "status"  => "failed",
 "message" => "hotel doesnt exist",
),REST_Controller::HTTP_OK);

 }

}










 }










?>
