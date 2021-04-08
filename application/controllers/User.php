<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';



class User extends REST_Controller{


 function index_post(){

 $data= json_decode(file_get_contents("php://input"));

 $slug = isset($data->slug) ? $data->slug :"";
 //
 // var_dump($slug);
 $this->load->model('Wedding_model');
 $wedding=($this->Wedding_model->get_wedding($slug));
 $wedding_id=$wedding["uid"]; /// getting wedding uid from db
 $owner_check=$wedding["created_by"]; /// from database
 $session_check = $this->session->userdata('email'); // from session

 // var_dump($this->Wedding_model->slugcheck($slug));

 if($this->Wedding_model->slugcheck($slug)===true)   // checking if wedding exist in db


 {
  if ($owner_check===$session_check)     // checking if logged in user is owner of wedding
  {

     $guest_name = isset($data->guest_name) ? $data->guest_name :"";
     //
     $email = isset($data->email) ? $data->email :"";
     $contact = isset($data->contact) ? $data->contact :"";

      $location = isset($data->location) ? $data->location :"";




      $formarray= array(
       "guest_name"=>$guest_name,
       "email"=>$email,
       "contact"=>$contact,
       "location"=>$location,
       "Wedding_id"=>$wedding_id,
       "createdon"=>date('y-m-d')

    );
    // var_dump($formarray);
    if ( !empty($guest_name) && !empty($email) &&   !empty($contact) &&   !empty($location)  )  // checking for empty values
    {
      $this->load->model('User_model');

     if($this->User_model->create($formarray))
     {

         $this->response( array(
          "status"  => "success",
          "message" => "guest created successfully",
         ),REST_Controller::HTTP_OK);
     }
     else
     {

         $this->response( array(
          "status"  => "failed",
          "message" => "failed to create try again",
         ),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
     }
    }
    else {
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
