<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Create_venue extends REST_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $location = isset($data->location) ? $data->location :"";
                  $added_from = isset($data->added_from) ? $data->added_from :"";
                   $type = isset($data->type) ? $data->type :"";
                   $created_by = $this->session->userdata('email');
                   // // var_dump($wedding_url);






                 $formarray= array(
                  "location"=>$location,
                  "added_from"=>$added_from,
                  "type"=>$type,
                  "created_by"=>$created_by,
                  "createdon"=>date('y-m-d')

               );




               // var_dump($formarray);




                       if ( !empty($location) && !empty($added_from) && !empty($type) )
                       {
                        $this->load->model('Pickupdrop_model');
                        if($this->Pickupdrop_model->create($formarray))
                        {




                            $this->response( array(
                             "status"  => "success",
                             "message" => "venue created successfully",
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
                       ),REST_Controller::HTTP_OK);


                       }



            // echo $_SESSION['auth_message'];
            // var_dump($this->input->post);
        }








    }
?>
