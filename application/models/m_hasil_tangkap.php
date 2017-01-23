<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_hasil_tangkap extends CI_Model{

        
        public function __construct(){
            parent::__construct();
            $this->table="hasil_tangkap";
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
            $query="SELECT hasil_tangkap.id_penangkapan,hasil_tangkap.id_hasil_tangkap,hasil_tangkap.tgl,hasil_tangkap.jenis_ikan,hasil_tangkap.berat_ikan, hasil_tangkap.pelabuhan, penangkapan.id_penangkapan, penangkapan.no_kapal, penangkapan.nama_kapal
                FROM hasil_tangkap
                JOIN penangkapan ON hasil_tangkap.id_penangkapan=penangkapan.id_penangkapan  WHERE hasil_tangkap.id_pengguna='".$this->session->userdata('id_pengguna')."' ORDER BY id_hasil_tangkap DESC
               ";
            return $this->db->query($query);
        }

        public function SelectAll($id){
            $query="SELECT hasil_tangkap.id_penangkapan,hasil_tangkap.id_hasil_tangkap,hasil_tangkap.tgl,hasil_tangkap.jenis_ikan,hasil_tangkap.berat_ikan, hasil_tangkap.pelabuhan, penangkapan.id_penangkapan
                FROM hasil_tangkap
                JOIN penangkapan ON hasil_tangkap.id_penangkapan=penangkapan.id_penangkapan  WHERE penangkapan.id_penangkapan='$id' AND hasil_tangkap.id_pengguna='".$this->session->userdata('id_pengguna')."'";

            return $this->db->query($query);
        }

        public function updateData($where, $data){
            $this->db->where('id_hasil_tangkap',$where);
            $this->db->update($this->table,$data);
        }

        public function getData(){
            $this->db->select('*');
            $this->db->from($this->table);
            return $query = $this->db->get();
        }

        function getOne($id){
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('id_hasil_tangkap',$id);
            $query = $this->db->get();
            return $query;
        }

        public function delete($id){
            $this->db->where('id_hasil_tangkap',$id);
            $this->db->delete($this->table);
        }

        public function Data($id){
            $this->db->select('*');
            $this->db->where('id_hasil_tangkap',$id);
            $this->db->from($this->table);
            return $query = $this->db->get();
        }
        
    }
?>