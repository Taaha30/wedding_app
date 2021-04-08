<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Create_car extends REST_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $car_name = isset($data->car_name) ? $data->car_name :"";
                  $car_no = isset($data->car_no) ? $data->car_no :"";
                  $car_type = isset($data->car_type) ? $data->car_type :"";

                   $created_by = $this->session->userdata('email');
                   // // var_dump($wedding_url);






                 $formarray= array(
                  "car_name"=>$car_name,
                  "car_no"=>$car_no,
                  "car_type"=>$car_type,
                  "created_by"=>$created_by,
                  "createdon"=>date('y-m-d')

               );


             //   $farray= array(
             //    "location"=>$venue,
             //    "added_from"=>$function_name,
             //    "createdon"=>date('y-m-d')
             //
             // );

               // var_dump($formarray);




                       if ( !empty($car_name) && !empty($car_no) && !empty($car_type)   )
                       {
                        $this->load->model('Car_model');
                        if($this->Car_model->create_car($formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "car created successfully",
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
