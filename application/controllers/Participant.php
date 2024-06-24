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

        $config['upload_path'] = './assets/data/pembayaran_participant';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // 2 MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('payment_proof')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('participant/upload_payment', $error);
            $this->load->view('templates/footer');
        } else {
            $file_data = $this->upload->data();
            $file_name = $file_data['file_name'];

            $this->db->insert('payment_participant', [
                'user_id' => $data['user']['id'],
                'image' => $file_name,
                'upload_date' => date('Y-m-d H:i:s')
            ]);

            $this->session->set_flashdata('message', 'Success');
            $this->session->set_flashdata('text', 'Payment proof uploaded successfully!');
            $this->session->set_flashdata('icon', 'success');
            redirect('participant/upload_payment');
        }
    }
}
