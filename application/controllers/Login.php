<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH .'libraries/REST_Controller.php';

class Login extends REST_Controller
{

    public function index_post()
    {



        //
                $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                 $email = isset($data->email) ? $data->email :"";
                 $password = isset($data->password) ? $data->password :"";



                        // var_dump($additional_data);
                        // var_dump($username);
                        // var_dump($email);
                        // var_dump($password);

                       if ( !empty($email) &&   !empty($password)  )
                       {
                        $this->load->library('ion_auth');
                        if($this->ion_auth->login($email,$password))
                        {
                            // $_SESSION['auth_message'] = 'The account has been created. You may now login.';
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
                            $this->response( array(
                             "status"  => "success",
                             "message" => "logged in successfully",
                            ),REST_Controller::HTTP_OK);
                        }
                        else
                        {
                            // $_SESSION['auth_message'] = $this->ion_auth->errors();
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
                            $this->response( array(
                             "status"  => "failed",
                             "message" => " Incorrect email or password",
                            ),REST_Controller::HTTP_NOT_FOUND);
                        }
                       }
                       else {
                        $this->response( array(
                        "status"  => "failed",
                        "message" => "All fields are needed",
                       ),REST_Controller::HTTP_NOT_FOUND);


                       }



            // echo $_SESSION['auth_message'];
            // var_dump($this->input->post);
        }




    }
// }
