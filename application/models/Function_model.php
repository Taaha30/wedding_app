<?php
class Function_model extends CI_Model{

function create($formarray){
 return $query=$this->db->insert('wedding_function',$formarray);

}
function get_function($wedding_url){
 $this->db->select('wedding_function.function_name,wedding_function.date,wedding_function.venue,create_wedding.wedding_url');
 $this->db->from('wedding_function');
 $this->db->join('create_wedding', 'wedding_function.wedding_id=create_wedding.uid','inner');
 $this->db->where('wedding_url', $wedding_url);

  $query = $this->db->get();
 return $query->result();

}
function all(){
 return $users= $this->db->get('wedding_function')->result_array();

}


function function_info($email){
 $this->db->select('uid');
 $this->db->where('created_by', $email);
  $query = $this->db->get('wedding_function');

 return $query->row_array();

}
function update_function($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('wedding_function', $formarray);


}
function block_function($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('wedding_function', $formarray);


}
function unblock_function($id,$formarray){
 $this->db->where('created_by', $id);
  return $query=$this->db->update('wedding_function', $formarray);


}


}
