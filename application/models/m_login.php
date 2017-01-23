<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_login extends CI_Model{

        public $table = 'pengguna';
        public function __construct(){

        }

        public function input($data){
            $query = $this->db->insert($this->table, $data);
            if($query){
                return true;
            } else {
                return false;
            }
        }

        public function getPengguna($user_id, $password){
            $this->db->select('*');
            $this->db->from('pengguna');
            $this->db->where('user_id', $user_id);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query;
        }

        public function data($user_id){
            $this->db->select('*');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get('pengguna');
            return $query->row();
        }
        
        function updateData($data,$id){
            
            $this->db->where('id_pengguna',$id);
            $this->db->update('pengguna',$data);
        }

        function updateProfile($id){
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('id_pengguna',$id);
            $query = $this->db->get();
            return $query;
        }
    }
?>