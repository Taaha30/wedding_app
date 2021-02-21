<?php
class User extends CI_Controller{




 

function index(){
 $this->load->model('User_model');
 $users =$this->User_model->all();
 $data = array();
 $data['users']= $users;

 $this->load->view('list',$data);

}








 function create(){
  $this->load->model('User_model');
$this->form_validation->set_rules('guest_name','Guest name','required');
$this->form_validation->set_rules('email','Email','required|valid_email');
$this->form_validation->set_rules('contact','Contact no','required');
$this->form_validation->set_rules('location','location','required');

if ($this->form_validation->run() == FALSE){

 $this->load->view('create');


}
else {
 $formarray=array();
 $formarray['guest_name']=$this->input->post('guest_name');
 $formarray['email']=$this->input->post('email');
 $formarray['contact']=$this->input->post('contact');
 $formarray['location']=$this->input->post('location');
 $formarray['createdon']=date('y-m-d');
 echo $formarray;
 $this->User_model->create($formarray);
 $this->session->set_flashdata('success','Record added successfully');
 redirect(base_url().'index.php/user/index');


}











 }
}




 ?>
