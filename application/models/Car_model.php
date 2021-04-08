<?php
class Car_model extends CI_Model{

function create_car($formarray){
return $query= $this->db->insert('car',$formarray);

}




// function get_car($driver_name){
// $this->db->select('car.car_name,car.car_no,car.car_type,driver.driver_name,driver.contact');
// $this->db->from('car');
// $this->db->join('driver', 'car.driver_id=driver.uid','inner');
// $this->db->where('driver_name', $driver_name);
// $query = $this->db->get();
//  return $query->result();
//
// }
function car_info($email){
 $this->db->select('uid,car_name,car_type,created_by');
 $this->db->from('car');
 $this->db->where('created_by', $email);
 $query = $this->db->get();
 return $query->row_array();


}


function all(){
 return $query= $this->db->get('car')->result();
}


function update_car($id,$formarray){
 $this->db->where('uid', $id);
  return $query=$this->db->update('car', $formarray);


}


function block_car($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('car', $formarray);


}
function unblock_car($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('car', $formarray);


}


}









 ?>
