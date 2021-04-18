<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Update_cardriver extends REST_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);



                $car_no	 = isset($data->car_no	) ? $data->car_no	 :"";
                $driver_name = isset($data->driver_name) ? $data->driver_name :"";
                 $start_date = isset($data->start_date) ? $data->start_date :"";
                 $end_date = isset($data->end_date) ? $data->end_date :"";



                 $username = $this->session->userdata('email');
                 $this->load->model('Loggedin_model');
                 $user_info=$this->Loggedin_model->user_info($username);
                 $id=$user_info["id"];







                 $formarray= array(
                 "car_no"=>$car_no,
                 "driver_name"=>$driver_name,
                 "start_date"=>$start_date,
                 "end_date"=>$end_date,
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




                       if ( !empty($car_no) && !empty($driver_name) && !empty($start_date) && !empty($end_date)  )
                       {
                        $this->load->model('Cardriver_model');
                        if($this->Cardriver_model->update($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "driver updated successfully",
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
