<?php
class Driver_model extends CI_Model{

function create_driver($formarray){
 $this->db->insert('driver',$formarray);

}

function all(){
 return $users= $this->db->get('driver')->result_array();
}



function drivername(){
 // $this->db->select('driver_name');
  return $query = $this->db->get('driver');
}



}








 ?>
