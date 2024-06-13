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

    public function insert_video($file_name)
    {
        $data = array(
            'user_id' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(), // Asumsi ada user_id di session
            'video_name' => $file_name,
            'upload_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('upload', $data);
    }

    public function upload()
{
    $data['title'] = 'Upload Video';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'mp4|avi|mov|mkv';
    // $config['max_size'] = 10000; // Maksimal 10 MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('video_file')) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('olimpiade/upload', $error);
        $this->load->view('templates/footer');
    } else {
        $file_data = $this->upload->data();
        $file_name = $file_data['file_name'];

        $this->load->model('Upload_model');
        $this->Upload_model->insert_video($file_name);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Video berhasil diupload!</div>');
        redirect('olimpiade');
    }
    }
}
