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
        $data['title'] = 'Upload Video Link';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Olimpiade_model', 'olimpiade');

        $this->form_validation->set_rules('video_link', 'Video Link', 'required|valid_url');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('olimpiade/upload', $data);
            $this->load->view('templates/footer');
        } else {
            $video_link = $this->input->post('video_link');
            $this->olimpiade->insert_video_link($video_link);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Link video berhasil diupload!</div>');
            redirect('olimpiade');
        }
    }

    public function upload_payment()
    {
        $data['title'] = 'Upload Payment Proof';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $config['upload_path'] = './uploads/';
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

            $this->db->insert('payments', [
                'user_id' => $data['user']['id'],
                'file_name' => $file_name,
                'upload_date' => date('Y-m-d H:i:s')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment proof uploaded successfully!</div>');
            redirect('olimpiade/upload_payment');
        }
    }
}
