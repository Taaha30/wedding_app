<?php
class Guest_model extends CI_Model{

function create($formarray){
 // $this->db->where('wedding_id',$formarray['wedding_id']);
 return $query=$this->db->insert('guest',$formarray);

}

function all(){
 return $users= $this->db->get('guest')->result_array();

}





//
// function get_allot($userId){
//  $this->db->where('uid', $userId);
//  return $user = $this->db->get('guest')->row_array();
//
//
//
//
//
// }


function guest_info($email){
 $this->db->select('uid');
 $this->db->where('created_by', $email);
  $query = $this->db->get('guest');

 return $query->row_array();

}
function update_guest($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('guest', $formarray);


}
// function get_guest($wedding_url){
//  $query = $this->db->query("SELECT guest.guest_name, guest.email, guest.location,guest.contact,create_wedding.uid,create_wedding.wedding_url FROM guest INNER JOIN create_wedding ON guest.wedding_id=create_wedding.uid where wedding_url='taha-khan' ;");
//  return $query;
//
//
// }


function get_guest($wedding_url){
 $this->db->select('guest.guest_name,guest.email,guest.location,guest.contact,create_wedding.wedding_url');
 $this->db->from('guest');
 $this->db->join('create_wedding', 'guest.wedding_id=create_wedding.uid','inner');
 $this->db->where('wedding_url', $wedding_url);

  $query = $this->db->get();
 return $query->result();

}
function block_guest($id,$formarray){
 $this->db->where('created_by', $id); /// change to uid because it will come from frontend
  return $query=$this->db->update('guest', $formarray);


}
function unblock_guest($id,$formarray){
 $this->db->where('created_by', $id); /// change to uid because it will come from frontend
  return $query=$this->db->update('guest', $formarray);


}


}






 ?>
