<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Olimpiade extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Olimpiade';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('olimpiade/index', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $data['title'] = 'Upload Link Video';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Olimpiade_model', 'olimpiade');

        $data['olimpiade'] = $this->olimpiade->getOlimpiadeVerify();
        if (!$data['olimpiade']) {
        } else {
            $this->session->set_flashdata('olimpiade_message', '<div class="alert alert-info" role="alert">Anda hanya boleh upload olimpiade <b>1x</b>!</div>');
        }

        $this->form_validation->set_rules('video_link', 'Video Link', 'required|valid_url');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('olimpiade/upload', $data);
            $this->load->view('templates/footer');
        } else {
            if ($data['olimpiade']) {
                $this->session->set_flashdata('olimpiade_message', '<div class="alert alert-info" role="alert">Anda hanya boleh upload olimpiade <b>1x</b>!</div>');
                redirect('olimpiade/upload');
            } else {
                $video_link = $this->input->post('video_link');
                $this->olimpiade->insert_video_link($video_link);

                $this->session->set_flashdata('message', 'Success');
                $this->session->set_flashdata('text', 'Link video berhasil diupload!');
                $this->session->set_flashdata('icon', 'success');
                redirect('olimpiade');
            }
        }
    }

    public function upload_payment()
    {
        $data['title'] = 'Payment Conference';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Olimpiade_model', 'olimpiade');

        $data['olimpiade_id'] = $this->olimpiade->getOlimpiadeVerify();
        $data['olimpiade_unpaid'] = $this->olimpiade->getOlimpiadeUnpaid();

        $config['upload_path'] = './assets/data/pembayaran_olimpiade';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // 2 MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('payment_proof')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('olimpiade/upload_payment', $error);
            $this->load->view('templates/footer');
        } else {
            $file_data = $this->upload->data();
            $file_name = $file_data['file_name'];

            $this->db->insert('payment_olimpiade', [
                'image' => $file_name,
                'olimpiade_id' => $data['olimpiade_id']['olimpiadeID'],
                'user_id' => $data['user']['id'],
                'upload_date' => date('Y-m-d H:i:s')
            ]);

            $this->db->where('id', $data['olimpiade_id']['olimpiadeID']);
            $this->db->update('olimpiade_submissions', ['is_paid' => 'pending']);

            $this->session->set_flashdata('message', 'Success');
            $this->session->set_flashdata('text', 'Payment proof uploaded successfully!');
            $this->session->set_flashdata('icon', 'success');
            redirect('olimpiade/upload_payment');
        }
    }
}
