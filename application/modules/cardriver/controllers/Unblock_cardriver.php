<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Unblock_cardriver extends REST_Controller
{

    public function index_post()
    {


/// GET UID FROM FRONTEND FOR UPDATE BLOCK UNBLOCK FUNC
/// decarle a variable for it

                // var_dump($data->first_name);
                  $username = $this->session->userdata('email');
                 $this->load->model('Loggedin_model');
                 $user_info=$this->Loggedin_model->user_info($username);
                 $id=$user_info["id"];







                   // // var_dump($wedding_url);






                 $formarray= array(
                  "block"=>0


               );


             





                        $this->load->model('Cardriver_model');
                        if($this->Cardriver_model->unblock($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "unblocked successfully",
                            ),REST_Controller::HTTP_OK);
                        }
                        else
                        {
                            // $_SESSION['auth_message'] = $this->ion_auth->errors();
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
                            $this->response( array(
                             "status"  => "failed",
                             "message" => "failed to unblock try again",
                            ),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                        }




            //
        }








    }
?>
