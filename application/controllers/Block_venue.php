<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Block_venue extends REST_Controller
{

    public function index_post()
    {


/// GET UID FROM FRONTEND FOR UPDATE BLOCK UNBLOCK FUNC

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


             //   $farray= array(
             //    "location"=>$venue,
             //    "added_from"=>$function_name,
             //    "createdon"=>date('y-m-d')
             //
             // );

               // var_dump($formarray);





                        $this->load->model('Pickupdrop_model');
                        if($this->Pickupdrop_model->block_venue($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "blocked successfully",
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




            // echo $_SESSION['auth_message'];
            // var_dump($this->input->post);
        }








    }
?>
