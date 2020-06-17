<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function master()
    {
        $this->load->model('dokterModel');
        $yanglogin = $this->session->userdata('yanglogin');
        if (null == $yanglogin || $yanglogin->dokter_role == 1) {
            $this->session->set_flashdata('pesanLogin', "SILAHKAN LOGIN TERLEBIH DAHULU");
            return redirect('landing/login');
        }
        else {

            $param = [];
            $param['daftarDok'] = $this->dokterModel->daftarDokter();

            $this->load->view('layout/header');
            $this->load->view('admin/master',$param);
            $this->load->view('layout/footer');
        }
    }
    public function olah()
    {
        $this->load->model('dokterModel');
        $pesan = "";
        if ($this->input->post('btninsert')) {
            $data = $this->input->post();
            $id = $this->dokterModel->insert($data);
            if ($id > 0) {
                $pesan .= "Sukses Insert Data";
                $config["upload_path"] = "foto";
				$config["allowed_types"] = "jpg|png|gif";
                $config["file_name"] = $id.".jpg";
                
                $this->upload->initialize($config);
                if (! $this->upload->do_upload('fotodokter')) {
                    $pesan .= "Gagal Upload : ".$this->upload->display_errors();
                }
                else {
                    $pesan .= " & Sukses Upload Gambar";
                }
            }
            else {
                echo "gagal Insert";
            }
        }
        if ($this->input->post('btnupdate')) {
            $data = $this->input->post();

            if ($this->dokterModel->update($data) > 0) {
                $pesan .= "Berhasil Update Data";

                $config["upload_path"] = "foto";
                $config["allowed_types"] = "jpg|png|gif";
                $config["file_name"] = $data['dokter_id'].".jpg";
                $config["overwrite"] = true;

                

                $this->upload->initialize($config);
                if (! $this->upload->do_upload('fotodokter')) {
                    $pesan .= "Gagal Upload : ".$this->upload->display_errors();
                }
                else {
                    $pesan .= " & Sukses Update Gambar";
                }
            }
        }
        $this->session->set_flashdata('pesan' , $pesan);
        return redirect('admin/master');
    }
    public function delete($id)
    {
        $this->load->model('dokterModel');
        if ($this->dokterModel->delete($id) > 0) {
            return redirect('admin/master');
        }
    }
    public function deleteAjax()
    {
        $this->load->model('dokterModel');
        $data = $this->input->post();
        echo $this->dokterModel->delete($data);
    }
}
