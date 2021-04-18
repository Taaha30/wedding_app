<?php
class Hotel_model extends CI_Model{

function create_hotel($formarray){
 return $query=$this->db->insert('hotel',$formarray);

}

// function get_hotel($wedding_url){
//  $this->db->select('hotel.hotel_name,hotel.hotel_location,hotel.room_no,create_wedding.wedding_url');
//  $this->db->from('hotel');
//  $this->db->join('create_wedding', 'hotel.wedding_id=create_wedding.uid','inner');
//  $this->db->where('wedding_url', $wedding_url);
//
//   $query = $this->db->get();
//  return $query->result();
//
// }


function hotel_check($email){
 $this->db->select('created_by,uid');
 $this->db->where('created_by', $email);
  $query = $this->db->get('hotel');
 return $query->row_array();

}
function hotel_data($email){
 $this->db->select('hotel_name,hotel_location');
 $this->db->where('created_by', $email);
  $query = $this->db->get('hotel');
 return $query->result();

}

// update
function update_hotel($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('hotel', $formarray);


}
function block_hotel($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('hotel', $formarray);


}
function unblock_hotel($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('hotel', $formarray);


}


}
