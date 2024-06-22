<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');
        $data['paper'] = $this->admin->countAllArticles();
        $data['presenter'] = $this->admin->countAllPresenter();
        $data['olimpiade'] = $this->admin->countAllOlimpiade();
        $data['peserta'] = $this->admin->countAllPeserta();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role has been added!</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
    }

    public function verify_article()
    {
        $data['title'] = 'Article Verification';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'article');

        // Pagination
        $this->load->library('pagination');
        if (!$this->uri->segment(3) == 'verify_article') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = base_url("admin/verify_article");
        $this->db->join('user', 'user.id = conference_submissions.user_id');
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

        $data['articles'] = $this->article->getArticleVerify($config['per_page'], $data['start'], $data['keyword']);

        // Action
        if ($this->input->post('accept')) {
            $id = $this->input->post('id');
            $this->db->set('is_accept', 'accepted');
            $this->db->where('id', $id);
            $this->db->update('conference_submissions');
            redirect('admin/verify_article/' . $data['start']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/article-verification', $data);
        $this->load->view('templates/footer');
    }

    public function payment_verify_conference()
    {
        $data['title'] = 'Conference';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'payment');

        // Pagination
        $this->load->library('pagination');
        if (!$this->uri->segment(3) == 'payment_verify_conference') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = base_url("admin/payment_verify_conference");
        $this->db->select('payment_conference.*, user.name, cs.user_id, cs.topic, cs.title, cs.journal_path, cs.is_paid, cs.is_accept');
        $this->db->join('conference_submissions cs', 'cs.id = payment_conference.conference_id');
        $this->db->join('user', 'user.id = payment_conference.user_id');
        $this->db->where('cs.is_accept', 'accepted');
        if ($data['keyword']) {
            $this->db->like('title', $data['keyword']);
            $this->db->or_like('name', $data['keyword']);
        }
        $this->db->from('payment_conference');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;
        $data['total_row'] = $config['total_rows'];
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        if (!$data['start']) {
            $data['start'] = 0;
        }

        $data['payment'] = $this->payment->getPaymentVerify($config['per_page'], $data['start'], $data['keyword']);

        // Action
        if ($this->input->post('accept')) {
            $id = $this->input->post('id');
            $this->db->set('is_paid', 'paid');
            $this->db->where('id', $id);
            $this->db->update('conference_submissions');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment has been successfully accepted.</div>');
            redirect('admin/payment_verify_conference/' . $data['start']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/payment-conference-verification', $data);
        $this->load->view('templates/footer');
    }

    public function payment_verify_olimpiade()
    {
        $data['title'] = 'Olimpiade';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');

        // Pagination
        $this->load->library('pagination');
        if (!$this->uri->segment(3) == 'payment_verify_olimpiade') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = base_url("admin/payment_verify_olimpiade");
        $this->db->select('payment_olimpiade.*, user.name, os.is_paid');
        $this->db->join('olimpiade_submissions os', 'os.id = payment_olimpiade.olimpiade_id');
        $this->db->join('user', 'user.id = payment_olimpiade.user_id');
        if ($data['keyword']) {
            $this->db->like('name', $data['keyword']);
        }
        $this->db->from('payment_olimpiade');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;
        $data['total_row'] = $config['total_rows'];
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        if (!$data['start']) {
            $data['start'] = 0;
        }

        $data['payment'] = $this->Admin_model->getOlimpiadeVerify($config['per_page'], $data['start'], $data['keyword']);

        // Action
        if ($this->input->post('accept')) {
            $id = $this->input->post('id');
            $this->db->set('is_paid', 'paid');
            $this->db->where('id', $id);
            $this->db->update('olimpiade_submissions');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment has been successfully accepted.</div>');
            redirect('admin/payment_verify_olimpiade/' . $data['start']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/payment-olimpiade-verification', $data);
        $this->load->view('templates/footer');
    }

    public function payment_verify_participant()
    {
        $data['title'] = 'Participant';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');

        // Pagination
        $this->load->library('pagination');
        if (!$this->uri->segment(3) == 'payment_verify_participant') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = base_url("admin/payment_verify_participant");
        $this->db->join('user', 'user.id = payment_participant.user_id');
        if ($data['keyword']) {
            $this->db->like('name', $data['keyword']);
        }
        $this->db->from('payment_participant');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;
        $data['total_row'] = $config['total_rows'];
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        if (!$data['start']) {
            $data['start'] = 0;
        }

        $data['payment'] = $this->Admin_model->getParticipantVerify($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/payment-participant-verification', $data);
        $this->load->view('templates/footer');
    }

    public function list_olimpiade()
    {
        $data['title'] = 'List Olimpiade';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');
        $data['submissions'] = $this->admin->getOlimpiadeSubmissions();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/olimpiade', $data);
        $this->load->view('templates/footer');
    }
}
