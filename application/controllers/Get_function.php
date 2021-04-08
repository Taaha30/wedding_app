<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Get_function extends REST_Controller
{
 public function index_get(){
  $email = $this->session->userdata('email');
  // $this->load->model('Wedding_model');
  //
  // $wedding_data=($this->Wedding_model->wed_data($email));
  // $url=$wedding_data["wedding_url"];
  $data= json_decode(file_get_contents("php://input"));
  $slug = isset($data->slug) ? $data->slug :"";

  $this->load->model('Function_model');
  $fun_data=($this->Function_model->get_function($slug));

  $this->load->model('Wedding_model');
  $wedding=($this->Wedding_model->get_wedding($slug));
  // $wedding_id=$wedding["uid"]; /// getting wedding uid from db
  $owner_check=$wedding["created_by"]; /// from database getting created by which user
  $session_check = $this->session->userdata('email'); //checking logged in user


$this->load->model('Wedding_model');
  if($this->Wedding_model->slugcheck($slug)===true)   // checking if wedding exist in db
  //
  //
  {
   if ($owner_check===$session_check)     // checking if logged in user is owner of wedding
   {



if ( !empty($slug) ){






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
   "message" => " no guest found",
  ),REST_Controller::HTTP_OK);



  }
 }else {
  $this->response( array(
  "status"  => "failed",
  "message" => "All fields are needed",
 ),REST_Controller::HTTP_OK);


 }
}
 else {
  $this->response( array(
 "status"  => "failed",
 "message" => "you Should be the Owner of the wedding to create guest",
),REST_Controller::HTTP_OK);

 }

}
else
{
 $this->response( array(
 "status"  => "failed",
 "message" => "wedding does not exist",
),REST_Controller::HTTP_NOT_FOUND);

}









 }









    }
?>
