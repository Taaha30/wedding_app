<?php
class Allot extends CI_Controller{

function index(){
 // $this->load->model('User_model');
 // $users =$this->User_model->all();
 // $data = array();
 // $data['users']= $users;
 //
 // //
 // // $this->load->model('Driver_model');
 // // $driver =$this->Driver_model->all();
 // // $data = array();
 // // $data['driver']= $driver;
 // // $this->load->model('Allot_model');
 //
 //
 // // $this->load->view('allot_guest',$data);
 //  $this->load->view('allot_guest');

}

function allot_guest($userId){

 $this->load->model('User_model');
 $this->load->model('Driver_model');
 $user = $this->User_model->get_allot($userId);
 $drivers= $this->Driver_model->drivername();

 $data1 = array();
 $data1['driver']= $drivers;


 // $data=array();
 // $data['guest']= $user;
 $this->load->view('allot_guest',$data1);





}


function create(){
 $this->load->model('User_model');
$this->form_validation->set_rules('guest_name','Guest name','required');
$this->form_validation->set_rules('driver','Driver','required|valid_email');
$this->form_validation->set_rules('car','Car','required');


if ($this->form_validation->run() == FALSE){

$this->load->view('allot_guest');


}
else {
$formarray=array();
$formarray['guest_name']=$this->input->post('guest_name');
$formarray['driver']=$this->input->post('driver');
$formarray['car']=$this->input->post('car');
$formarray['createdon']=date('y-m-d');
echo $formarray;
$this->Allot_model->create($formarray);
$this->session->set_flashdata('success','Record added successfully');
redirect(base_url().'index.php/user/index');


}






















}
}
























 ?>
