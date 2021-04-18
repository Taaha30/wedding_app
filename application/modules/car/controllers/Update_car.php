<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Update_car extends MY_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $car_name = isset($data->car_name) ? $data->car_name :"";
                  $car_no = isset($data->car_no) ? $data->car_no :"";
                  $car_type = isset($data->car_type) ? $data->car_type :"";


                    $username = $this->session->userdata('email');
                   $this->load->model('Loggedin_model');
                   $user_info=$this->Loggedin_model->user_info($username);
                   $id=$user_info["id"];

                   // // var_dump($wedding_url);






                 $formarray= array(
                  "car_name"=>$car_name,
                  "car_no"=>$car_no,
                  "car_type"=>$car_type,
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




                       if ( !empty($car_name) && !empty($car_no) && !empty($car_type)   )
                       {
                        $this->load->model('Car_model');
                        if($this->Car_model->update_car($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "car updated successfully",
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
