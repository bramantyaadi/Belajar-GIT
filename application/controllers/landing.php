<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class landing extends CI_Controller {

    public function login()
    {
        $this->load->view('layout/header');
        $this->load->view('site/login');
        $this->load->view('layout/footer');
    }
    public function ceklogin()
    {
        $this->load->model('userModel');
        $yanglogin = $this->userModel->users();

        if ($this->input->post('btnlogin')) {
            if ($yanglogin > 0) {
                if ($yanglogin->dokter_role == 0) {
                    $this->session->set_userdata('yanglogin' , $yanglogin);
                    return redirect('admin/master');
                }
                else {
                    $this->session->set_userdata('yanglogin',$yanglogin);
                    return redirect('dokter/daftarPantauan');
                }
            }
            else {
                $this->session->set_flashdata('pesanLogin' , "Username / Password Salah");
                return redirect('landing/login');
            }
            
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('landing/login');
    }
    public function error404()
    {
        $this->load->view('site/error404');
    }

}
