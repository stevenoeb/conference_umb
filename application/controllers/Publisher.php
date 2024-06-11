<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publisher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('download');
    }

    public function index()
    {
        $data['title'] = 'Publisher';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Conference_model', 'conference');

        $data['submitPaper'] = $this->conference->getSubmitPaper();
        $data['conference'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('publisher/index', $data);
        $this->load->view('templates/footer');
    }

    public function download($id)
    {
        $data = $this->db->get_where('conference_submissions', ['id' => $id])->row();
        if ($data) {
            if (!$data->journal_path) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, data yang Anda cari tidak ditemukan.</div>');
                redirect('publisher');
            } else {
                $path = 'assets/data/jurnal/' . $data->journal_path;
                if (file_exists($path)) {
                    force_download($path, NULL);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak ditemukan!</div>');
                    redirect('publisher');
                }
            }
        }
    }
}
