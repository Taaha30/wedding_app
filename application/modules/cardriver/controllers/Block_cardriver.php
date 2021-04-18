<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Block_cardriver extends REST_Controller
{

    public function index_post()
    {




                // var_dump($data->first_name);
                  $username = $this->session->userdata('email');
                 $this->load->model('Loggedin_model');
                 $user_info=$this->Loggedin_model->user_info($username);
                 $id=$user_info["id"];





                   // // var_dump($wedding_url);






                 $formarray= array(
                  "block"=>1,
                  "blocked_by"=>$id,
                  "blocked_on"=>date('y-m-d')

               );








                        $this->load->model('Cardriver_model');
                        if($this->Cardriver_model->block($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "blocked successfully",
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








    }
?>
