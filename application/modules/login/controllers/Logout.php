<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Logout extends MY_Controller
{

    public function index_post()
    {



        //




                        // var_dump($additional_data);
                        // var_dump($username);
                        // var_dump($email);
                        // var_dump($password);


                        $this->load->library('ion_auth');
                        if($this->ion_auth->logout())
                        {
                            // $_SESSION['auth_message'] = 'The account has been created. You may now login.';
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
                            $this->response( array(
                             "status"  => "success",
                             "message" => "logged out successfully",
                            ),REST_Controller::HTTP_OK);
                        }
                        else
                        {
                            // $_SESSION['auth_message'] = $this->ion_auth->errors();
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
                            $this->response( array(
                             "status"  => "failed",
                             "message" => " Error",
                            ),REST_Controller::HTTP_OK);
                        }

                       }





            // echo $_SESSION['auth_message'];
            // var_dump($this->input->post);
        }
