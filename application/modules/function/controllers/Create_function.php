<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Create_function extends MY_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $function_name = isset($data->function_name) ? $data->function_name :"";
                  $date = isset($data->date) ? $data->date :"";
                  $venue = isset($data->venue) ? $data->venue :"";
                  $post_feed = isset($data->post_feed) ? $data->post_feed :"";
                  $send_notif = isset($data->send_notif) ? $data->send_notif :"";
                   $email = $this->session->userdata('email');
                   $this->load->model('Wedding_model');
                   $wedding=($this->Wedding_model->wed_data($email));
                   $wedding_id=$wedding["uid"];
                   $username = $this->session->userdata('email');
                  $this->load->model('Loggedin_model');
                  $user_info=$this->Loggedin_model->user_info($username);
                  $id=$user_info["id"];
                   // // var_dump($wedding_url);






                 $formarray= array(
                  "function_name"=>$function_name,
                  "date"=>$date,
                  "venue"=>$venue,
                  "post_feed"=>$post_feed,
                  "send_notif"=>$send_notif,
                  "wedding_id"=>$wedding_id,
                  "created_by"=>$id,
                  "createdon"=>date('y-m-d')

               );


               $farray= array(
                "location"=>$venue,
                "added_from"=>$function_name,
                "createdon"=>date('y-m-d')

             );

               // var_dump($formarray);




                       if ( !empty($function_name) && !empty($date) && !empty($venue) &&!empty($post_feed) &&  !empty($send_notif)   )
                       {
                        $this->load->model('Function_model');
                        if($this->Function_model->create($formarray))
                        {

                         $this->load->model('Pickupdrop_model');
                         $this->Pickupdrop_model->create($farray);


                            $this->response( array(
                             "status"  => "success",
                             "message" => "function created successfully",
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
