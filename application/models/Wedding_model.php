<?php
class Wedding_model extends CI_Model{

function create($formarray){
 return $query=$this->db->insert('create_wedding',$formarray);

}




/// checking if wedding exist
function slugcheck($slug){
 $this->db->select('wedding_url');
 $this->db->where('wedding_url',$slug);
    $query=$this->db->get("create_wedding");
  if ($query->num_rows() > 0) {
      return true;
  } else {
      return false;
  }
}

/// get wedding by wedding_url
function get_wedding($slug){
 $this->db->select('wedding_url,uid,created_by');
 $this->db->where('wedding_url', $slug);
  $query = $this->db->get('create_wedding');
 return $query->row_array();

}
/// Get logged in user wedding list
function wedding_data($email){
 $this->db->select('wedding_url,uid,created_by,bride_name,groom_name,city,guest_start,guest_end');
 $this->db->where('created_by', $email);
  $query = $this->db->get('create_wedding');
 return $query->result();

}

function wed_data($email){
 $this->db->select('wedding_url,uid,created_by,bride_name,groom_name,city,guest_start,guest_end');
 $this->db->where('created_by', $email);
  $query = $this->db->get('create_wedding');
 return $query->row_array();

}





//SELECT guest.guest_name, guest.email, guest.location,guest.contact,
//SELECT create_wedding.uid,create_wedding.wedding_url
//SELECT FROM guest INNER JOIN create_wedding ON guest.wedding_id=create_wedding.uid





}

// function isEmailExist($email) {
//     $this->db->select('*');
//     $this->db->where('email', $email);
//     $query = $this->db->get('users');
//
//     if ($query->num_rows() > 0) {
//         return true;
//     } else {
//         return false;
//     }
// }








 ?>
