<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muser extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function get_id ($id){
        $sql= "select id from administrator where id = '".$id. "'";
        return $this->db->query($sql)->row();
    }
    public function getAdmin(){
        $sql = $this->db->query("SELECT id,namaLengkap,username,email,tlp,alamat FROM administrator WHERE id = 1");
        return $sql->row();
    }
    
    public function updateAdmin($id,$namaLengkap,$username,$email,$tlp,$alamat){
        $sql = "UPDATE administrator SET namaLengkap = '$namaLengkap',
                username = '$username',
                email = '$email',
                tlp = '$tlp',
                alamat = '$alamat'
                WHERE id ='$id'";
        return $this->db->query($sql);
    }
    public function update_password($id,$namaLengkap,$username,$email,$password,$tlp,$alamat){
        $pass = $this->_salt($password);
        $sql = "UPDATE administrator SET namaLengkap = '$namaLengkap',
                username = '$username',
                email = '$email',
                password = '$pass',
                tlp = '$tlp',
                alamat = '$alamat'
                WHERE id ='$id'";
        return $this->db->query($sql);
    }
    private function _salt($value){
        $salt =')!@%$AcaKKaduL+^%#';
        $encrypt = md5($salt . $value);
        return $encrypt;
    }
}
