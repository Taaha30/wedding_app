<?php
defined('BASEPATH') OR exit('No direct script access allowed');






class Create_guest extends MY_Controller{


 function index_post(){

 $data= json_decode(file_get_contents("php://input"));

 $slug = isset($data->slug) ? $data->slug :"";
 //
 // var_dump($slug);
 $username = $this->session->userdata('email');
$this->load->model('Loggedin_model');
$user_info=$this->Loggedin_model->user_info($username);
$id=$user_info["id"];
 $this->load->model('Wedding_model');
 $wedding=($this->Wedding_model->get_wedding($slug));
 $wedding_id=$wedding["uid"]; /// getting wedding uid from db
 $owner_check=$wedding["created_by"]; /// from database
 $session_check = $this->session->userdata('email');
  // from session

 // var_dump($this->Wedding_model->slugcheck($slug));



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
       "created_by"=>$id,
       "createdon"=>date('y-m-d')

    );
    // var_dump($formarray);
    if ( !empty($guest_name) && !empty($email) &&   !empty($contact) &&   !empty($location)  )  // checking for empty values
    {
      $this->load->model('Guest_model');

     if($this->Guest_model->create($formarray))
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
    ),REST_Controller::HTTP_BAD_REQUEST);


    }





}

}
 ?>
