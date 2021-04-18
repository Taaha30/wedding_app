<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Create_wedding extends MY_Controller
{

    public function index_post()
    {



               function urlfix($string){
               $slug = trim($string); // trim the string
               $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
               $slug= str_replace(' ','-', $slug); // replace spaces by dashes
               $slug= strtolower($slug);  // make it lowercase
               return $slug;
               }
        //
                $data= json_decode(file_get_contents("php://input"));

                // var_dump($data->first_name);


                  $bride_name = isset($data->bride_name) ? $data->bride_name :"";
                  $groom_name = isset($data->groom_name) ? $data->groom_name :"";
                  $guest_start = isset($data->guest_end) ? $data->guest_end :"";
                  $guest_end = isset($data->guest_end) ? $data->guest_end :"";
                  $wedding_url = isset($data->wedding_url) ? $data->wedding_url :"";
                  $city = isset($data->city) ? $data->city :"";
                   $wedding_url=urlfix($wedding_url);
                   $created_by = $this->session->userdata('email');
                   // var_dump($wedding_url);






                 $formarray= array(
                  "bride_name"=>$bride_name,
                  "groom_name"=>$groom_name,
                  "guest_start"=>$guest_start,
                  "guest_end"=>$guest_end,
                  "wedding_url"=>$wedding_url,
                  "city"=>$city,
                  "created_by"=>$created_by,
                  "createdon"=>date('y-m-d')

               );
               // var_dump($formarray);




                       if ( !empty($bride_name) && !empty($groom_name) && !empty($guest_start) &&!empty($guest_end) &&  !empty($wedding_url) &&  !empty($city)  )
                       {
                        $this->load->model('Wedding_model');
                        if($this->Wedding_model->create($formarray))
                        {

                            $this->response( array(
                             "status"  => "success",
                             "message" => "Wedding created successfully",
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
