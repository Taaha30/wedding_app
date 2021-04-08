<?php
class Loggedin_model extends CI_Model{


function user_info($email){
 $this->db->select('id,email');
 $this->db->from('users');
 $this->db->where('email', $email);
 $query = $this->db->get();
 return $query->row_array();


}



}









 ?>
