<?php 

    class userModel extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function users()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $query = $this->db
                            ->from('dokter')
                            ->where('dokter_username' , $username)
                            ->where('dokter_password' , $password)
                            ->get();
            return $query->row(); 
        }
    }
    

?>