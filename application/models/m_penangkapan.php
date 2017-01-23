<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_penangkapan extends CI_Model{

        public function __construct(){
            parent::__construct();
            $this->table = 'penangkapan';
        }

        public function input($data){
            $query = $this->db->insert($this->table, $data);
            if($query){
                return true;
            } else {
                return false;
            }
        }

        public function ambilData(){
            $query="SELECT pengguna.id_pengguna, pengguna.nama_pengguna,penangkapan.id_penangkapan, penangkapan.id_pengguna, penangkapan.no_kapal, penangkapan.nama_kapal,penangkapan.created_at, penangkapan.status_penangkapan
                FROM penangkapan 
                JOIN pengguna ON penangkapan.id_pengguna=pengguna.id_pengguna 
                WHERE penangkapan.id_pengguna='".$this->session->userdata('id_pengguna')."'
                ORDER BY id_penangkapan DESC";
            return $this->db->query($query);
        }

        

        public function updateData($where,$data){

            $this->db->where('id_penangkapan',$where);
            $this->db->update($this->table,$data);
        }

        public function getData(){
            $this->db->select('*');
            $this->db->from($this->table);
            return $query = $this->db->get()->result_array();
        }

        function getOne($id){

            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('id_penangkapan',$id);
            $query = $this->db->get();
            return $query;
        }

        public function delete($id){
            $this->db->where('id_penangkapan',$id);
            $this->db->delete($this->table);
        }

        public function Data($id){
            $this->db->select('*');
            $this->db->where('id_penangkapan',$id);
            $this->db->from($this->table);
            return $query = $this->db->get();
        }
        
        function coba($id){
            return $this->db->get_where('penangkapan', array('id_penangkapan'=>$id))->row();
        }

        function status(){
            $query="SELECT id_penangkapan,status_penangkapan, created_at FROM penangkapan 
                    WHERE id_penangkapan IN( SELECT MAX(id_penangkapan) FROM penangkapan) AND penangkapan.id_pengguna='".$this->session->userdata('id_pengguna')."' ";
            return $this->db->query($query);
        }

        function Select(){
            $query="SELECT id_penangkapan,no_kapal,nama_kapal,status_penangkapan FROM penangkapan 
                    WHERE id_penangkapan IN( SELECT MAX(id_penangkapan) FROM penangkapan) AND penangkapan.id_pengguna='".$this->session->userdata('id_pengguna')."' ";
            return $this->db->query($query);
        }
    }