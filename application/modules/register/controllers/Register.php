<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Register extends MY_Controller
{

    public function index_post()
    {
        

        // if($this->form_validation->run()===FALSE)
        // {
        //     $this->load->helper('form');
        //     $this->load->view('register_view');
        // }
        // else
        // // {
        //     $first_name = $this->input->post('first_name');
        //
        //     $last_name = $this->input->post('last_name');
        //     $username = $this->input->post('username');
        //     $email = $this->input->post('email');
        //     $password = $this->input->post('password');
        //
        //     $additional_data = array(
        //         'first_name' => $first_name,
        //         'last_name' => $last_name
        //     );
        //
                $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                $first_name = isset($data->first_name) ? $data->first_name :"";
                //
                $last_name = isset($data->last_name) ? $data->last_name :"";
                $username = isset($data->username) ? $data->username :"";
                 $email = isset($data->email) ? $data->email :"";
                 $password = isset($data->password) ? $data->password :"";

                    $additional_data = array(
                            'first_name' => $first_name,
                            'last_name' => $last_name
                        );

                        // var_dump($additional_data);
                        // var_dump($username);
                        // var_dump($email);
                        // var_dump($password);

                       if ( !empty($first_name) && !empty($last_name) &&   !empty($username) &&  !empty($email) &&   !empty($password)  )
                       {
                        $this->load->library('ion_auth');
                        if($this->ion_auth->register($username,$password,$email,$additional_data))
                        {
                            // $_SESSION['auth_message'] = 'The account has been created. You may now login.';
                            // $this->session->mark_as_flash('auth_message');
                            // redirect('register');
                            $this->response( array(
                             "status"  => "success",
                             "message" => "Registered Sucessfully, You may now Login",
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
// }
