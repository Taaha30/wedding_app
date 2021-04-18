<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Create_driver extends MY_Controller
{
 

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $driver_name = isset($data->driver_name) ? $data->driver_name :"";
                  $contact = isset($data->contact) ? $data->contact :"";


                  $username = $this->session->userdata('email');
                 $this->load->model('Loggedin_model');
                 $user_info=$this->Loggedin_model->user_info($username);
                 $id=$user_info["id"];






                 $formarray= array(
                  "driver_name"=>$driver_name,
                  "contact"=>$contact,
                  "created_by"=>$id,
                  "createdon"=>date('y-m-d')

               );


             //   $farray= array(
             //    "location"=>$venue,
             //    "added_from"=>$function_name,
             //    "createdon"=>date('y-m-d')
             //
             // );

               // var_dump($formarray);




                       if ( !empty($driver_name) && !empty($contact) )
                       {
                        $this->load->model('Driver_model');
                        if($this->Driver_model->create_driver($formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "driver created successfully",
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
