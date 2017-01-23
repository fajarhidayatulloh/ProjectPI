<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_lokasi extends CI_Model{

        public function __construct(){
            parent::__construct();
            $this->table = 'lokasi';
        }

        public function input($data){
            $query = $this->db->insert($this->table, $data);
            if($query){
                return true;
            } else {
                return false;
            }
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

        function selectAll(){
            $query="SELECT id_lokasi,lat, lng,status FROM lokasi 
                    WHERE id_lokasi IN( SELECT MAX(id_lokasi) FROM lokasi) ";
            return $this->db->query($query);
        }
    }