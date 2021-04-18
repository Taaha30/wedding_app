<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Update_guest extends MY_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);



                  $guest_name = isset($data->guest_name) ? $data->guest_name :"";
                  $email = isset($data->email) ? $data->email :"";
                  $contact = isset($data->contact) ? $data->contact :"";
                  $location = isset($data->location) ? $data->location :"";


                  $username = $this->session->userdata('email');
                 $this->load->model('Loggedin_model');
                 $user_info=$this->Loggedin_model->user_info($username);
                 $id=$user_info["id"];

                   // // var_dump($wedding_url);






                 $formarray= array(
                  "guest_name"=>$guest_name,
                  "email"=>$email,
                  "contact"=>$contact,
                  "location"=>$location,
                  "updated_by"=>$id,
                  "updated_on"=>date('y-m-d')

               );


             //   $farray= array(
             //    "location"=>$venue,
             //    "added_from"=>$function_name,
             //    "createdon"=>date('y-m-d')
             //
             // );

               // var_dump($formarray);




                       if ( !empty($guest_name) && !empty($email) && !empty($contact) && !empty($location) )
                       {
                        $this->load->model('Guest_model');
                        if($this->Guest_model->update_guest($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "guest updated successfully",
                            ),REST_Controller::HTTP_OK);
                        }
                        else
                        {
                            // $_SESSION['auth_message'] = $this->ion_auth->errors();
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
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



            // echo $_SESSION['auth_message'];
            // var_dump($this->input->post);
        }








    }
?>
