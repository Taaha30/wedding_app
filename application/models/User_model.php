<?php
class User_model extends CI_Model{

function create($formarray){
 $this->db->insert('guest',$formarray);

}

function all(){
 return $users= $this->db->get('guest')->result_array();
}





function get_allot($userId){
 $this->db->where('uid', $userId);
 return $user = $this->db->get('guest')->row_array();





}

}






 ?>
