<?php
class Car extends CI_Controller{
 
 public function __construct() {

parent::__construct();
$this->load->library('ion_auth');
if (!$this->ion_auth->logged_in()){
 redirect('auth/login', 'refresh');
}
}

function index(){
 $this->load->model('Car_model');
 $car =$this->Car_model->carname();
 $data = array();
 $data['car']= $car;

 $this->load->view('car_list',$data);
// var_dump($data);

}








 function create(){
  $this->load->model('Car_model');
$this->form_validation->set_rules('car_name','Car name','required');
// $this->form_validation->set_rules('email','Email','required|valid_email');
$this->form_validation->set_rules('car_no','car no','required');
$this->form_validation->set_rules('car_type','Car Type','required');

if ($this->form_validation->run() == FALSE){

 $this->load->view('add_car');


}
else {
 $formarray=array();
 $formarray['car_name']=$this->input->post('car_name');
 $formarray['car_no']=$this->input->post('car_no');
 $formarray['car_type']=$this->input->post('car_type');
 $formarray['createdon']=date('y-m-d');
 $this->Car_model->create_car($formarray);
 $this->session->set_flashdata('success','Record added successfully');
 redirect(base_url().'index.php/user/index');


}











 }
}




 ?>
