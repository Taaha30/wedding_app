<?php
class Pickupdrop_model extends CI_Model{

function create($farray){
 return $query=$this->db->insert('pickupdrop_location',$farray);

}
function all(){
 return $query= $this->db->get('pickupdrop_location')->result();
}


function venue_info($email){
 $this->db->select('uid');
 $this->db->where('created_by', $email);
  $query = $this->db->get('pickupdrop_location');

 return $query->row_array();

}
function update_venue($id,$formarray){
 $this->db->where('uid', $id);
  return $query=$this->db->update('pickupdrop_location', $formarray);


}

function block_venue($id,$formarray){
 $this->db->where('created_by', $id); /// change to uid because it will come from frontend
  return $query=$this->db->update('pickupdrop_location', $formarray);


}
function unblock_venue($id,$formarray){
 $this->db->where('created_by', $id); /// change to uid because it will come from frontend
  return $query=$this->db->update('pickupdrop_location', $formarray);


}


}
