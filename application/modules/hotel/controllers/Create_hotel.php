<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Create_hotel extends MY_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $hotel_name = isset($data->hotel_name) ? $data->hotel_name :"";
                  $hotel_location = isset($data->hotel_location) ? $data->hotel_location :"";
                   $created_by = $this->session->userdata('email');
                   $username = $this->session->userdata('email');
                  $this->load->model('Loggedin_model');
                  $user_info=$this->Loggedin_model->user_info($username);
                  $id=$user_info["id"];






                 $formarray= array(
                  "hotel_name"=>$hotel_name,
                  "hotel_location"=>$hotel_location,
                  "created_by"=>$id,
                  "createdon"=>date('y-m-d')

               );


               $farray= array(
                "location"=>$hotel_location,
                "added_from"=>$hotel_name,
                "created_by"=>$id,
                "createdon"=>date('y-m-d')

             );

               // var_dump($formarray);




                       if ( !empty($hotel_name) && !empty($hotel_location)  )
                       {
                        $this->load->model('Hotel_model');
                        if($this->Hotel_model->create_hotel($formarray))
                        {

                         $this->load->model('Pickupdrop_model');
                         $this->Pickupdrop_model->create($farray);


                            $this->response( array(
                             "status"  => "success",
                             "message" => "hotel created successfully",
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
