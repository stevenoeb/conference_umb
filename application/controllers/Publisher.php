<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publisher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('download');
        $this->session->unset_userdata('keyword');
    }

    public function index()
    {
        $data['title'] = 'List Of Articles';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Conference_model', 'conference');

        // Pagination
        $this->load->library('pagination');
        if (!$this->uri->segment(3) == 'publisher') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = base_url("publisher/index");
        $this->db->join('user', 'user.id = conference_submissions.user_id');
        $this->db->where('publish_journal', 'yes');
        if ($data['keyword']) {
            $this->db->like('title', $data['keyword']);
            $this->db->or_like('name', $data['keyword']);
        }
        $this->db->from('conference_submissions');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;
        $data['total_row'] = $config['total_rows'];
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        if (!$data['start']) {
            $data['start'] = 0;
        }

        $data['submitPaper'] = $this->conference->getAllArticles($config['per_page'], $data['start'], $data['keyword']);

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
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sorry, the data you are looking for was not found.</div>');
                redirect('publisher');
            } else {
                $path = 'assets/data/jurnal/' . $data->journal_path;
                if (file_exists($path)) {
                    force_download($path, NULL);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File not found!</div>');
                    redirect('publisher');
                }
            }
        }
    }
}
