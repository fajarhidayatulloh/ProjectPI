<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_keberangkatan extends CI_Model{

        
        public function __construct(){
            parent::__construct();
            $this->table="keberangkatan";
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
            $query="SELECT pengguna.id_pengguna, pengguna.nama_pengguna,keberangkatan.id_keberangkatan, keberangkatan.id_pengguna, keberangkatan.bbm, keberangkatan.es,keberangkatan.tgl, keberangkatan.jam, penangkapan.id_penangkapan, penangkapan.no_kapal, penangkapan.nama_kapal
                FROM keberangkatan 
                JOIN pengguna ON keberangkatan.id_pengguna=pengguna.id_pengguna
                JOIN penangkapan ON keberangkatan.id_penangkapan=penangkapan.id_penangkapan WHERE keberangkatan.id_pengguna='".$this->session->userdata('id_pengguna')."' ORDER BY id_keberangkatan DESC
                ";
            return $this->db->query($query);
        }

        public function SelectAll($id){
            $query="SELECT pengguna.id_pengguna, pengguna.nama_pengguna,keberangkatan.id_keberangkatan, keberangkatan.id_pengguna, keberangkatan.bbm, keberangkatan.es,keberangkatan.tgl, keberangkatan.jam,keberangkatan.pelabuhan, penangkapan.id_penangkapan, penangkapan.no_kapal, penangkapan.nama_kapal,penangkapan.status_penangkapan
                FROM keberangkatan 
                JOIN pengguna ON keberangkatan.id_pengguna=pengguna.id_pengguna
                JOIN penangkapan ON keberangkatan.id_penangkapan=penangkapan.id_penangkapan WHERE penangkapan.id_penangkapan='$id' AND keberangkatan.id_pengguna='".$this->session->userdata('id_pengguna')."'";

            return $this->db->query($query);
        }

        public function updateData($where, $data){
            $this->db->where('id_keberangkatan',$where);
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
            $this->db->where('id_keberangkatan',$id);
            $query = $this->db->get();
            return $query;
        }

        public function delete($id){
            $this->db->where('id_keberangkatan',$id);
            $this->db->delete($this->table);
        }

        public function Data($id){
            $this->db->select('*');
            $this->db->where('id_keberangkatan',$id);
            $this->db->from($this->table);
            return $query = $this->db->get();
        }
        
    }