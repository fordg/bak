<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Mloginmember extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username_member'));
        $password = $this->security->xss_clean($this->_salt($this->input->post('password')));
        
        // Prep the query
        $this->db->where('username_member', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('member');
        // Let's check if there are any results
        if($query->num_rows == 1){
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(  'memberid' => $row->id_member,
                            'username_member' => $row->username_member,
							'pass' => $row->password,
                            'tervalidasi' => true);
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    private function _salt($value){
        $salt =')!@%$AcaKKaduL+^%#';
        $encrypt = md5($salt . $value);
        return $encrypt;
    }
}