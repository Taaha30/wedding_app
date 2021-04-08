<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Create_room extends REST_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $hotel_name = isset($data->hotel_name) ? $data->hotel_name :"";
                  $room_no = isset($data->room_no) ? $data->room_no :"";
                   $created_by = $this->session->userdata('email');
                   // // var_dump($wedding_url);






                 $formarray= array(
                  "hotel_name"=>$hotel_name,
                  "room_no"=>$room_no,
                  "created_by"=>$created_by,
                  "createdon"=>date('y-m-d')

               );




               // var_dump($formarray);




                       if ( !empty($hotel_name) && !empty($room_no)  )
                       {
                        $this->load->model('Room_model');
                        if($this->Room_model->create_room($formarray))
                        {




                            $this->response( array(
                             "status"  => "success",
                             "message" => "room created successfully",
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
