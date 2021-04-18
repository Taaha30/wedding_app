<?php
class Room_model extends CI_Model{

function create_room($formarray){
 return $query=$this->db->insert('room',$formarray);

}


// get room no bby hotel name
//
function hotel_check($hotel_name){
 $this->db->select('hotel_name,room_no');
 $this->db->where('hotel_name', $hotel_name);
  $query = $this->db->get('room');

 return $query->row_array();

}
function room_info($email){
 $this->db->select('uid,hotel_name,room_no');
 $this->db->where('created_by', $email);
  $query = $this->db->get('room');

 return $query->row_array();

}

// get room no bby hotel name
function room_data($hotel_name){
 $this->db->select('room_no');
 $this->db->where('hotel_name', $hotel_name);
  $query = $this->db->get('room');
 return $query->result();

}
// update
function update_room($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('room', $formarray);


}
function block_room($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('room', $formarray);


}
function unblock_room($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('room', $formarray);


}




}
