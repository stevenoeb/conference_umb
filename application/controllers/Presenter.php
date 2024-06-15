<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presenter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Presenter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('presenter/index', $data);
        $this->load->view('templates/footer');
    }



    public function payment()
    {
        $data['title'] = 'Payment';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('presenter/payment', $data);
        $this->load->view('templates/footer');
    }

    public function submitPaper()
    {
        $data['title'] = 'Submit Paper';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Conference_model', 'conference');

        $data['submitPaper'] = $this->conference->getSubmitPaper();
        $data['conference'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('topic', 'Topic', 'required|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('publish_journal', 'Publish Journal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('presenter/submit-paper', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_journal = $_FILES['journal_path']['name'];
            $upload_journal = str_replace(' ', '_', $upload_journal);
            $config = array();
            $config['allowed_types'] = 'docx|pdf|doc';
            $config['upload_path'] = './assets/data/jurnal/';
            $this->load->library('upload', $config, 'uploadjurnal');
            $this->uploadjurnal->initialize($config);
            $upjournal = $this->uploadjurnal->do_upload('journal_path');

            $upload_poster = $_FILES['poster_path']['name'];
            $upload_poster = str_replace(' ', '_', $upload_poster);
            $config = array();
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['upload_path'] = './assets/data/poster/';
            $this->load->library('upload', $config, 'uploadposter');
            $this->uploadposter->initialize($config);
            $upposter = $this->uploadposter->do_upload('poster_path');

            $data = [
                'title' => $this->input->post('title'),
                'user_id' => $data['user']['id'],
                'publish_journal' => $this->input->post('publish_journal'),
                'topic' => $this->input->post('topic'),
                'journal_path' => $upload_journal,
                'poster_path' => $upload_poster,
                'is_paid' => "unpaid",
                'is_accept' => "unaccept"
            ];
            $this->db->insert('conference_submissions', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Paper has been added!</div>');
            redirect('presenter');
        }
    }
    // public function myconference()
    // {
    //     $data['title'] = 'My Conference';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $this->load->model('Myconference_model', 'myconference');

    //     $data['dataSubmit'] = $this->myconference->getDataSubmit();
    //     $data['myconference'] = $this->db->get('user')->result_array();


    //     $this->form_validation->set_rules('video_link', 'Link Video Presentation', 'required|trim');

    //     if ($this->form_validation->run() == false) {

    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('presenter/myconference', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $video_link = $this->input->post('video_link');
    //         $id = $this->input->post('id');

    //         $this->db->set('link_video', $video_link);
    //         $this->db->where('id', $id);
    //         $this->db->update('conference_submissions');

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your video has been updated!</div>');
    //         redirect('presenter/myconference');
    //     }
    // }

    public function myconference()
    {
        $data['title'] = 'My Conference';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Myconference_model', 'myconference');

        $user_id = $data['user']['id']; // Assuming user table has an 'id' column
        $data['dataSubmit'] = $this->myconference->getDataSubmitByUserId($user_id);

        $this->form_validation->set_rules('video_link', 'Link Video Presentation', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('presenter/myconference', $data);
            $this->load->view('templates/footer');
        } else {
            $video_link = $this->input->post('video_link');
            $id = $this->input->post('id');

            $this->db->set('link_video', $video_link);
            $this->db->where('id', $id);
            $this->db->update('conference_submissions');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your video has been updated!</div>');
            redirect('presenter/myconference');
        }
    }
}
