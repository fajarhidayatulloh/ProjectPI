<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_pendaratan extends CI_Model{

        
        public function __construct(){
            parent::__construct();
            $this->table="pendaratan";
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
            $query="SELECT pendaratan.id_penangkapan,pendaratan.id_pendaratan,pendaratan.tgl, pendaratan.jam,pendaratan.pelabuhan, penangkapan.id_penangkapan, penangkapan.no_kapal, penangkapan.nama_kapal,pengguna.id_pengguna,pengguna.nama_pengguna
                FROM pendaratan
                JOIN penangkapan ON pendaratan.id_penangkapan=penangkapan.id_penangkapan 
                JOIN pengguna ON pendaratan.id_pengguna=pengguna.id_pengguna WHERE pendaratan.id_pengguna='".$this->session->userdata('id_pengguna')."' ORDER BY id_pendaratan DESC
                ";
            return $this->db->query($query);
        }

        public function SelectAll($id){
            $query="SELECT pendaratan.id_penangkapan,pendaratan.id_pendaratan,pendaratan.tgl, pendaratan.jam,pendaratan.pelabuhan, penangkapan.id_penangkapan
                FROM pendaratan
                JOIN penangkapan ON pendaratan.id_penangkapan=penangkapan.id_penangkapan WHERE penangkapan.id_penangkapan='$id' AND pendaratan.id_pengguna='".$this->session->userdata('id_pengguna')."'";
            return $this->db->query($query);
        }

        public function updateData($where, $data){
            $this->db->where('id_pendaratan',$where);
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
            $this->db->where('id_pendaratan',$id);
            $query = $this->db->get();
            return $query;
        }

        public function delete($id){
            $this->db->where('id_pendaratan',$id);
            $this->db->delete($this->table);
        }

        public function Data($id){
            $this->db->select('*');
            $this->db->where('id_pendaratan',$id);
            $this->db->from($this->table);
            return $query = $this->db->get();
        }
        
    }
?>