<?php 

    class dokterModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function daftarDokter()
        {
            $query = $this->db
                            ->from('dokter')
                            ->order_by('dokter_id   ','desc')
                            ->get();
            return $query->result();
        }
        public function jumlah()
        {
            return count($this->daftarDokter());
        }
        public function insert($data = [])
        {
            unset($data['btninsert']);
            unset($data['dokter_id']);
            unset($data['fotodokter']);
            $this->db->insert('dokter' , $data);
            return $this->db->insert_id();
        }
        public function delete($id)
        {
            $this->db->delete('dokter', ['dokter_id' => $id['dokter_id']]);
            return $this->db->affected_rows();
        }
        public function update($data = [])
        {
            // unset($data['dokter_id']);
            unset($data['btnupdate']);
            return $this->db->update('dokter' , $data , ['dokter_id' => $data['dokter_id']]);
             
        }
    }
    

?>