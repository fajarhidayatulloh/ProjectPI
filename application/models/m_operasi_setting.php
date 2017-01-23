<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_operasi_setting extends CI_Model{

        
        public function __construct(){
            parent::__construct();
            $this->table="operasi_setting";
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
            $query="SELECT operasi_setting.id_operasi_setting,operasi_setting.id_penangkapan,operasi_setting.tgl,operasi_setting.jam, operasi_setting.lat, operasi_setting.lng, operasi_setting.jenis_alat,operasi_setting.status_operasi,penangkapan.no_kapal,penangkapan.nama_kapal,penangkapan.id_penangkapan
                FROM operasi_setting
                JOIN penangkapan ON operasi_setting.id_penangkapan=penangkapan.id_penangkapan WHERE operasi_setting.id_pengguna='".$this->session->userdata('id_pengguna')."' ORDER BY id_operasi_setting DESC
                ";
                return $this->db->query($query);
        }
        public function SelectAll($id){
            $query="SELECT operasi_setting.id_operasi_setting,operasi_setting.id_penangkapan,operasi_setting.tgl,operasi_setting.jam, operasi_setting.lat, operasi_setting.lng, operasi_setting.jenis_alat,penangkapan.id_penangkapan
                FROM operasi_setting
                JOIN penangkapan ON operasi_setting.id_penangkapan=penangkapan.id_penangkapan WHERE penangkapan.id_penangkapan='$id' AND operasi_setting.id_pengguna='".$this->session->userdata('id_pengguna')."'";
                return $this->db->query($query);
        }

        public function updateData($where,$data){

            $this->db->where('id_operasi_setting',$where);
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
            $this->db->where('id_operasi_setting',$id);
            $query = $this->db->get();
            return $query;
        }

        public function delete($id){
            $this->db->where('id_operasi_setting',$id);
            $this->db->delete($this->table);
        }

        public function Data($id){
            $this->db->select('*');
            $this->db->where('id_operasi_setting',$id);
            $this->db->from($this->table);
            return $query = $this->db->get();
        }
        
        function coba($id){
            return $this->db->get_where('operasi_setting', array('id_operasi_setting'=>$id))->row();
        }

        function status_operasi(){
            $query="SELECT id_operasi_setting, tgl, status_operasi, id_pengguna FROM operasi_setting 
                    WHERE id_operasi_setting IN( SELECT MAX(id_operasi_setting) FROM operasi_setting) AND operasi_setting.id_pengguna='".$this->session->userdata('id_pengguna')."'";
            return $this->db->query($query);
        }
    }
?>    