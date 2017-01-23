<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_operasi_hauling extends CI_Model{

        
        public function __construct(){
            parent::__construct();
            $this->table="operasi_hauling";
        }

        public function input($data){
            $query = $this->db->insert($this->table, $data);
            if($query){
                return true;
            } else {
                return false;
            }
        }

        function ambilData(){
            $query="SELECT operasi_hauling.id_operasi_hauling,operasi_hauling.id_penangkapan,operasi_hauling.tgl,operasi_hauling.jam, operasi_hauling.lat, operasi_hauling.lng, operasi_hauling.jenis_alat,penangkapan.no_kapal,penangkapan.nama_kapal,penangkapan.id_penangkapan
                FROM operasi_hauling
                JOIN penangkapan ON operasi_hauling.id_penangkapan=penangkapan.id_penangkapan  WHERE operasi_hauling.id_pengguna='".$this->session->userdata('id_pengguna')."' ORDER BY id_operasi_hauling DESC
               ";
                return $this->db->query($query);
        }

        public function SelectAll($id){
            $query="SELECT operasi_hauling.id_operasi_hauling,operasi_hauling.id_penangkapan,operasi_hauling.tgl,operasi_hauling.jam, operasi_hauling.lat, operasi_hauling.lng,penangkapan.id_penangkapan
                FROM operasi_hauling
                JOIN penangkapan ON operasi_hauling.id_penangkapan=penangkapan.id_penangkapan  WHERE penangkapan.id_penangkapan='$id' AND operasi_hauling.id_pengguna='".$this->session->userdata('id_pengguna')."'";
            return $this->db->query($query);
        }

        public function updateData($where,$data){

            $this->db->where('id_operasi_hauling',$where);
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
            $this->db->where('id_operasi_hauling',$id);
            $query = $this->db->get();
            return $query;
        }

        public function delete($id){
            $this->db->where('id_operasi_hauling',$id);
            $this->db->delete($this->table);
        }

        public function Data($id){
            $this->db->select('*');
            $this->db->where('id_operasi_hauling',$id);
            $this->db->from($this->table);
            return $query = $this->db->get();
        }
        
        function coba($id){
            return $this->db->get_where('operasi_hauling', array('id_operasi_hauling'=>$id))->row();
        }
    }
?>    