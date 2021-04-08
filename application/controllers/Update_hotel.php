<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Update_hotel extends REST_Controller
{

    public function index_post()
    {


                 $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);



                  $hotel_name = isset($data->hotel_name) ? $data->hotel_name :"";
                  $hotel_location = isset($data->hotel_location) ? $data->hotel_location :"";


                    $username = $this->session->userdata('email');
                    $this->load->model('Hotel_model');
                    $hotel_info=$this->Hotel_model->hotel_check($username);
                    $id=$hotel_info["uid"];

                   // // var_dump($wedding_url);






                 $formarray= array(
                  "hotel_name"=>$hotel_name,
                  "hotel_location"=>$hotel_location,
                  "updated_by"=>$username,
                  "updated_on"=>date('y-m-d')

               );


             //   $farray= array(
             //    "location"=>$venue,
             //    "added_from"=>$function_name,
             //    "createdon"=>date('y-m-d')
             //
             // );

               // var_dump($formarray);




                       if ( !empty($hotel_name) && !empty($hotel_location)   )
                       {
                        $this->load->model('Hotel_model');
                        if($this->Hotel_model->update_hotel($id,$formarray))
                        {
                            $this->response( array(
                             "status"  => "success",
                             "message" => "hotel updated successfully",
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
