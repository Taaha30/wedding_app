<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Get_hotels extends REST_Controller
{
 public function index_get(){
  $email = $this->session->userdata('email');
  // $this->load->model('Wedding_model');
  //
  // $wedding_data=($this->Wedding_model->wed_data($email));
  // $url=$wedding_data["wedding_url"];
  // $data= json_decode(file_get_contents("php://input"));
  // $slug = isset($data->slug) ? $data->slug :"";

  $this->load->model('Hotel_model');
  $hotel_data=($this->Hotel_model->hotel_data($email));

  $this->load->model('Hotel_model');
  $hotel=($this->Hotel_model->hotel_check($email));
  // $wedding_id=$wedding["uid"]; /// getting wedding uid from db
  $guest_check=$hotel["created_by"]; /// from database getting created by which user
  $session_check = $this->session->userdata('email'); //checking logged in user



   if ($guest_check===$session_check)     // checking if logged in user is has requested the hotel
   {










  if(count($hotel_data)> 0){





   $this->response(array(
    "status"  => "success",
    "message" => "hotel associated with you found",
     "data"   => $hotel_data




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
 "message" => "you have not requested this hotel",
),REST_Controller::HTTP_OK);

 }

}










 }










?>
