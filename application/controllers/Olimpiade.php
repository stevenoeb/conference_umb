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

        $data['olimpiade'] = $this->olimpiade->getOlimpiadeVerify($data['user']['id']);
        if (!$data['olimpiade']) {
        } else {
            $this->session->set_flashdata('olimpiade_message', '<div class="alert alert-info" role="alert">You can only upload one Olympiad!</div>');
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
                $this->session->set_flashdata('olimpiade_message', '<div class="alert alert-info" role="alert">You can only upload one Olympiad!</div>');
                redirect('olimpiade/upload');
            } else {
                $video_link = $this->input->post('video_link');
                $this->olimpiade->insert_video_link($video_link);

                $this->session->set_flashdata('message', 'Success');
                $this->session->set_flashdata('text', 'Video link uploaded successfully!');
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

        $data['olimpiade_id'] = $this->olimpiade->getOlimpiadeVerify($data['user']['id']);
        $data['olimpiade_unpaid'] = $this->olimpiade->getOlimpiadeUnpaid($data['user']['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['payment_proof']['name'])) {
            $config['upload_path'] = './assets/data/pembayaran_olimpiade';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 3072;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('payment_proof')) {
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
            } else {
                $data['error'] = $this->upload->display_errors();
                if ($data['error'] == '<p>The file you are attempting to upload is larger than the permitted size.</p>') {
                    $data['error'] = 'File too large! File must be less than 2 megabytes.';
                };
                $this->session->set_flashdata('payment_file', '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>');
            }
            redirect('olimpiade/upload_payment');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('olimpiade/upload_payment', $data);
        $this->load->view('templates/footer');
    }
}
