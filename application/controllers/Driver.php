<?php
class Driver extends MY_Controller{


function index(){
 $this->load->model('Driver_model');
 $driver =$this->Driver_model->all();
 $data = array();
 $data['driver']= $driver;

 $this->render('driver_list',$data);

}








 function create(){
  $this->load->model('Driver_model');
$this->form_validation->set_rules('driver_name','Driver name','required');
// $this->form_validation->set_rules('email','Email','required|valid_email');
$this->form_validation->set_rules('contact','Contact no','required');
$this->form_validation->set_rules('car','Car','required');

if ($this->form_validation->run() == FALSE){

 $this->render('add_driver');


}
else {
 $formarray=array();
 $formarray['driver_name']=$this->input->post('driver_name');
 $formarray['contact']=$this->input->post('contact');
 $formarray['car']=$this->input->post('car');
 $formarray['createdon']=date('y-m-d');
 $this->Driver_model->create_driver($formarray);
 $this->session->set_flashdata('success','Record added successfully');
 redirect(base_url().'index.php/user/index');


}











 }
}




 ?>
