<?php
class Driver_model extends CI_Model{

function create_driver($formarray){
return $query= $this->db->insert('driver',$formarray);

}

function all(){
 return $query= $this->db->get('driver')->result();
}

function driver_info($email){
 $this->db->select('uid');
 $this->db->where('created_by', $email);
  $query = $this->db->get('driver');

 return $query->row_array();

}
function update_driver($id,$formarray){
 $this->db->where('uid', $id);
  return $query=$this->db->update('driver', $formarray);


}



function get_driver($car){
$this->db->select('driver_name,contact');
$this->db->from('driver');
$this->db->join('car', 'car.driver_id=driver.uid','inner');
$this->db->where('car_name', $car);
$query = $this->db->get();
 return $query->result();

}
function block_driver($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('driver', $formarray);


}
function unblock_driver($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('driver', $formarray);


}



}








 ?>
