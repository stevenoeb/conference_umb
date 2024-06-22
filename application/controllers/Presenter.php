<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presenter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Myconference_model', 'myconference');
        $this->load->library('tcpdf'); // Memuat library TCPDF
    }

    public function index()
    {
        $data['title'] = 'Conference and Submit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('presenter/index', $data);
        $this->load->view('templates/footer');
    }

    public function payment()
    {
        $data['title'] = 'Payment Presenter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Myconference_model', 'myconference');

        $user_id = $data['user']['id'];
        $data['dataSubmit'] = $this->myconference->getDataSubmitByUserId($user_id);

        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['payment_proof']['name']) && !empty($this->input->post('selected_submissions'))) {
            $config['upload_path'] = './assets/data/pembayaran_conference/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('payment_proof')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];

                // Save payment data for each selected submission
                $selectedSubmissions = $this->input->post('selected_submissions');
                foreach ($selectedSubmissions as $conference_id) {
                    $paymentData = [
                        'user_id' => $user_id,
                        'image' => $image,
                        'conference_id' => $conference_id
                    ];
                    $this->myconference->savePaymentData($paymentData);

                    // Update is_paid status
                    $this->myconference->updateIsPaidStatus($conference_id);
                }

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment proof uploaded successfully!</div>');
                redirect('presenter/payment');
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }

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

        // $data['submitPaper'] = $this->conference->getSubmitPaper();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required|trim');
        if (empty($_FILES['journal_path']['name'])) $this->form_validation->set_rules('journal_path', 'File FULLPAPER', 'required');
        if (empty($_FILES['poster_path']['name'])) $this->form_validation->set_rules('poster_path', 'Poster', 'required');

        if ($this->form_validation->run() == FALSE) {
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
            $this->uploadjurnal->do_upload('journal_path');
            $this->uploadjurnal->display_errors();

            $upload_poster = $_FILES['poster_path']['name'];
            $upload_poster = str_replace(' ', '_', $upload_poster);
            $config = array();
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['upload_path'] = './assets/data/poster/';
            $this->load->library('upload', $config, 'uploadposter');
            $this->uploadposter->initialize($config);
            $this->uploadposter->do_upload('poster_path');
            $this->uploadposter->display_errors();

            $data = [
                'title' => $this->input->post('title'),
                'user_id' => $data['user']['id'],
                'publish_journal' => $this->input->post('publish_journal'),
                'topic' => $this->input->post('topic'),
                'abstract' => $this->input->post('abstract'),
                'journal_path' => $upload_journal,
                'poster_path' => $upload_poster,
                'is_paid' => "unpaid",
                'is_accept' => "unaccept"
            ];
            $this->db->insert('conference_submissions', $data);
            $this->session->set_flashdata('message', 'New Paper has been added!');
            redirect('presenter');
        }
    }

    public function myconference()
    {
        $data['title'] = 'My Conference';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Myconference_model', 'myconference');

        $user_id = $data['user']['id']; // Assuming user table has an 'id' column

        // Pagination
        $this->load->library('pagination');
        if (!$this->uri->segment(3) == 'myconference') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $data['dataSubmit'] = $this->myconference->getDataSubmitByUserIdMyConference($user_id, $data['keyword']);

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

            $this->session->set_flashdata('message', 'Your video has been updated!');
            redirect('presenter/myconference');
        }
    }

    public function delete_submission($id)
    {
        // Menghapus data berdasarkan ID
        if ($this->myconference->delete_submission_by_id($id)) {
            // Jika berhasil menghapus data, tampilkan pesan sukses
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            // Jika gagal menghapus data, tampilkan pesan kesalahan
            $this->session->set_flashdata('message', 'Gagal menghapus data.');
        }

        // Redirect kembali ke halaman sebelumnya atau halaman utama
        redirect('presenter/myconference');
    }

    public function view_pdf($submission_id)
    {
        // Mengambil data submission dari model
        $submission = $this->myconference->getSubmissionById($submission_id);

        if (empty($submission['abstract'])) {
            // Set flash data to show modal
            $this->session->set_flashdata('show_modal', true);
            redirect('presenter/myconference');
        } else {
            // Generate PDF or provide download link
            if ($submission) {
                // Memuat konten PDF dari view (gunakan template PDF jika perlu)
                $pdf_content = $this->load->view('presenter/abstract_pdf_template', $submission, true);

                // Inisialisasi TCPDF
                $pdf = new TCPDF();
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);
                $pdf->AddPage();
                $pdf->writeHTML($pdf_content, true, false, true, false, '');

                // Tampilkan PDF di browser
                $pdf->Output('abstract_' . $submission_id . '.pdf', 'I'); // 'I' untuk menampilkan di browser
            } else {
                show_error('Submission tidak ditemukan', 404);
            }
            // ...
        }
    }
}
