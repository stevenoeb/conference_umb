<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Participant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Participant';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('participant/index', $data);
        $this->load->view('templates/footer');
    }
    public function upload_payment()
    {
        $data['title'] = 'Upload Payment Proof';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['payment_proof']['name'])) {
            $config['upload_path'] = './assets/data/pembayaran_participant';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 3072;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('payment_proof')) {
                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];

                if ($file_data['file_size'] > $maxsize) {
                    $this->session->set_flashdata('payment_file', '<div class="alert alert-danger" role="alert">File too large! File must be less than 2 megabytes.</div>');
                } else {
                    $this->db->insert('payment_participant', [
                        'user_id' => $data['user']['id'],
                        'image' => $file_name,
                        'upload_date' => date('Y-m-d H:i:s')
                    ]);

                    $this->session->set_flashdata('message', 'Success');
                    $this->session->set_flashdata('text', 'Payment proof uploaded successfully!');
                    $this->session->set_flashdata('icon', 'success');
                }
            } else {
                $data['error'] = $this->upload->display_errors();
                if ($data['error'] == '<p>The file you are attempting to upload is larger than the permitted size.</p>') {
                    $data['error'] = 'File too large! File must be less than 2 megabytes.';
                };
                $this->session->set_flashdata('payment_file', '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>');
            }
            redirect('participant/upload_payment');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('participant/upload_payment', $data);
        $this->load->view('templates/footer');
    }
}
