<?php 
    class pantauanModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function daftarPantauan($data = [])
        {
            $query = $this->db
                            ->from('pantauan p')
                            ->order_by('p.pantauan_id','desc')
                            ->join('kota k','p.kota_id=k.kota_id');
                            // ->limit(10)
            if (isset($data['limit'])) {
                $query->limit($data['limit'] , $data['offset']);
            }
            $query = $this->db->get();
            return $query->result();
        }
        public function jumlah()
        {
            return count($this->daftarPantauan());
        }
    }
    
?>