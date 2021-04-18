<?php
class Cardriver_model extends CI_Model{
//insert
function create($formarray){
 return $query=$this->db->insert('car_driver_map',$formarray);

}
// get
function all(){
 return $query= $this->db->get('car_driver_map')->result();
}


// update
function update($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('car_driver_map', $formarray);


}
//block
function block($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('car_driver_map', $formarray);


}
//unblock
function unblock($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('car_driver_map', $formarray);


}


}
