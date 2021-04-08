<?php


class Register_model extends CI_Model{


public function get_register(){
 $query= $this->db-> get('users');

 return $query-> result();







}









}









 ?>
