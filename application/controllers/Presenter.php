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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['payment_proof']['name'])) {
            if (!empty($this->input->post('selected_submissions'))) {
                $config['upload_path'] = './assets/data/pembayaran_conference/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 3072;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('payment_proof')) {
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];

                    // Save payment data for each selected submission
                    $selectedSubmissions = $this->input->post('selected_submissions');
                    // echo var_dump($selectedSubmissions);
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
                redirect('presenter/payment');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                $this->session->set_flashdata('text', 'Please select submission to pay!');
                $this->session->set_flashdata('icon', 'error');
                redirect('presenter/payment');
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
        // $data['title'] = 'Conference and Submit';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->model('Conference_model', 'conference');

        // // $data['submitPaper'] = $this->conference->getSubmitPaper();
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('title', 'Title', 'required|trim');
        // $this->form_validation->set_rules('abstract', 'Abstract', 'required|trim');
        // if (empty($_FILES['journal_path']['name'])) $this->form_validation->set_rules('journal_path', 'File FULLPAPER', 'required');
        // if (empty($_FILES['poster_path']['name'])) $this->form_validation->set_rules('poster_path', 'Poster', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('presenter/submit-paper', $data);
        //     $this->load->view('templates/footer');
        // } else {
        //     $upload_journal = $_FILES['journal_path']['name'];
        //     $upload_journal = str_replace(' ', '_', $upload_journal);
        //     $config = array();
        //     $config['allowed_types'] = 'docx|pdf|doc';
        //     $config['upload_path'] = './assets/data/jurnal/';
        //     $this->load->library('upload', $config, 'uploadjurnal');
        //     $this->uploadjurnal->initialize($config);
        //     $this->uploadjurnal->do_upload('journal_path');
        //     $this->uploadjurnal->display_errors();

        //     $upload_poster = $_FILES['poster_path']['name'];
        //     $upload_poster = str_replace(' ', '_', $upload_poster);
        //     $config = array();
        //     $config['allowed_types'] = 'jpg|png|jpeg';
        //     $config['upload_path'] = './assets/data/poster/';
        //     $this->load->library('upload', $config, 'uploadposter');
        //     $this->uploadposter->initialize($config);
        //     $this->uploadposter->do_upload('poster_path');
        //     $this->uploadposter->display_errors();

        //     $data = [
        //         'title' => $this->input->post('title'),
        //         'user_id' => $data['user']['id'],
        //         'publish_journal' => $this->input->post('publish_journal'),
        //         'topic' => $this->input->post('topic'),
        //         'abstract' => $this->input->post('abstract'),
        //         'journal_path' => $upload_journal,
        //         'poster_path' => $upload_poster,
        //         'is_paid' => "unpaid",
        //         'is_accept' => "unaccept"
        //     ];
        //     $this->db->insert('conference_submissions', $data);
        //     $this->session->set_flashdata('message', 'your Paper has been added!');
        //     redirect('presenter');
        // }

        $data['title'] = 'Conference and Submit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Validasi form
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required|trim');
        if (empty($_FILES['journal_path']['name'])) $this->form_validation->set_rules('journal_path', 'File FULLPAPER', 'required');
        if (empty($_FILES['poster_path']['name'])) $this->form_validation->set_rules('poster_path', 'Poster', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('presenter/submit-paper', $data);
            $this->load->view('templates/footer');
        } else {
            // Proses upload journal_path
            $config_journal = [
                'upload_path' => './assets/data/jurnal/',
                'allowed_types' => 'docx|pdf|doc',
                'overwrite' => TRUE
            ];

            $this->load->library('upload', $config_journal, 'upload_journal');
            if (!$this->upload_journal->do_upload('journal_path')) {
                $error = $this->upload_journal->display_errors();
                $this->session->set_flashdata('error_message', $error);
                redirect('presenter/submitPaper'); // Redirect kembali ke halaman form
                return; // Keluar dari controller
            }

            // Ambil data file journal yang berhasil diupload
            $upload_data_journal = $this->upload_journal->data();
            $journal_path = $upload_data_journal['file_name'];

            // Proses upload poster_path
            $config_poster = [
                'upload_path' => './assets/data/poster/',
                'allowed_types' => 'jpg|jpeg|png',
                'overwrite' => TRUE
            ];

            $this->load->library('upload', $config_poster, 'upload_poster');
            if (!$this->upload_poster->do_upload('poster_path')) {
                // Hapus file journal yang sudah terupload jika upload poster gagal
                if (file_exists('./assets/data/jurnal/' . $journal_path)) {
                    unlink('./assets/data/jurnal/' . $journal_path);
                }

                $error = $this->upload_poster->display_errors();
                $this->session->set_flashdata('error_message', $error);
                redirect('presenter/submitPaper'); // Redirect kembali ke halaman form
                return; // Keluar dari controller
            }

            // Ambil data file poster yang berhasil diupload
            $upload_data_poster = $this->upload_poster->data();
            $poster_path = $upload_data_poster['file_name'];

            // Jika kedua berkas berhasil diunggah, simpan data ke database
            $data_insert = [
                'title' => $this->input->post('title'),
                'user_id' => $data['user']['id'],
                'publish_journal' => $this->input->post('publish_journal'),
                'topic' => $this->input->post('topic'),
                'abstract' => $this->input->post('abstract'),
                'journal_path' => $journal_path,
                'poster_path' => $poster_path,
                'is_paid' => "unpaid",
                'is_accept' => "unaccept"
            ];

            // Simpan data ke database
            $this->db->insert('conference_submissions', $data_insert);

            // Set pesan flash untuk memberitahu pengguna bahwa pengiriman berhasil
            $this->session->set_flashdata('message', 'Your Paper has been added!');

            // Redirect ke halaman presenter atau halaman dashboard yang sesuai
            redirect('presenter');
        }

//         $data['title'] = 'Conference and Submit';
// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

// // Validasi form
// $this->form_validation->set_rules('title', 'Title', 'required|trim');
// $this->form_validation->set_rules('abstract', 'Abstract', 'required|trim');

// // Cek apakah ada file yang dipilih untuk diunggah
// if (!empty($_FILES['journal_path']['name'])) {
//     $this->form_validation->set_rules('journal_path', 'File FULLPAPER', 'required');
// }
// if (!empty($_FILES['poster_path']['name'])) {
//     $this->form_validation->set_rules('poster_path', 'Poster', 'required');
// }

// if ($this->form_validation->run() == FALSE) {
//     // Jika validasi gagal, tampilkan kembali form dengan pesan kesalahan
//     $this->load->view('templates/header', $data);
//     $this->load->view('templates/sidebar', $data);
//     $this->load->view('templates/topbar', $data);
//     $this->load->view('presenter/submit-paper', $data);
//     $this->load->view('templates/footer');
// } else {
//     // Proses upload journal_path jika ada file yang dipilih
//     $journal_path = '';
//     if (!empty($_FILES['journal_path']['name'])) {
//         $config_journal = [
//             'upload_path' => './assets/data/jurnal/',
//             'allowed_types' => 'docx|pdf|doc',
//             'overwrite' => TRUE
//         ];

//         $this->load->library('upload', $config_journal, 'upload_journal');
//         if (!$this->upload_journal->do_upload('journal_path')) {
//             $error = $this->upload_journal->display_errors();
//             $this->session->set_flashdata('error_message', $error);
//             redirect('presenter/submitPaper'); // Redirect kembali ke halaman form
//             return; // Keluar dari controller
//         }

//         // Ambil data file journal yang berhasil diupload
//         $upload_data_journal = $this->upload_journal->data();
//         $journal_path = $upload_data_journal['file_name'];
//     }

//     // Proses upload poster_path jika ada file yang dipilih
//     $poster_path = '';
//     if (!empty($_FILES['poster_path']['name'])) {
//         $config_poster = [
//             'upload_path' => './assets/data/poster/',
//             'allowed_types' => 'jpg|jpeg|png',
//             'overwrite' => TRUE
//         ];

//         $this->load->library('upload', $config_poster, 'upload_poster');
//         if (!$this->upload_poster->do_upload('poster_path')) {
//             // Hapus file journal yang sudah terupload jika upload poster gagal
//             if (!empty($journal_path) && file_exists('./assets/data/jurnal/' . $journal_path)) {
//                 unlink('./assets/data/jurnal/' . $journal_path);
//             }

//             $error = $this->upload_poster->display_errors();
//             $this->session->set_flashdata('error_message', $error);
//             redirect('presenter/submitPaper'); // Redirect kembali ke halaman form
//             return; // Keluar dari controller
//         }

//         // Ambil data file poster yang berhasil diupload
//         $upload_data_poster = $this->upload_poster->data();
//         $poster_path = $upload_data_poster['file_name'];
//     }

//     // Simpan data ke database
//     $data_insert = [
//         'title' => $this->input->post('title'),
//         'user_id' => $data['user']['id'],
//         'publish_journal' => $this->input->post('publish_journal'),
//         'topic' => $this->input->post('topic'),
//         'abstract' => $this->input->post('abstract'),
//         'journal_path' => $journal_path,
//         'poster_path' => $poster_path,
//         'is_paid' => "unpaid",
//         'is_accept' => "unaccept"
//     ];

//     // Simpan data ke database
//     $this->db->insert('conference_submissions', $data_insert);

//     // Set pesan flash untuk memberitahu pengguna bahwa pengiriman berhasil
//     $this->session->set_flashdata('message', 'Your Paper has been added!');

//     // Redirect ke halaman presenter atau halaman dashboard yang sesuai
//     redirect('presenter');
// }

    }
    // Callback function untuk memeriksa tipe berkas
    public function check_file_type($file, $type)
    {
        $allowed_types = ['journal_path' => 'docx|pdf|doc', 'poster_path' => 'jpg|jpeg|png'];

        $config['upload_path'] = ($type == 'journal_path') ? './assets/data/jurnal/' : './assets/data/poster/';
        $config['allowed_types'] = $allowed_types[$type];
        $config['overwrite'] = TRUE; // Jika ingin mengganti berkas dengan nama yang sama

        $this->load->library('upload', $config, 'upload_' . $type);
        $this->upload->{$type} = $file;

        if (!$this->upload->{$type}->do_upload($type)) {
            $this->form_validation->set_message('check_file_type', $this->upload->{$type}->display_errors());
            return FALSE;
        }

        return TRUE;
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

        $this->form_validation->set_rules('video_link', 'Link Video Presentation', 'required|trim|valid_url');
        if ($this->form_validation->run() == FALSE) {
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
            $this->session->set_flashdata('text', 'Please wait Admin to accept your Conference.');
            $this->session->set_flashdata('icon', 'success');
            redirect('presenter/myconference');
        }
    }

    public function delete_submission($id)
    {
        // Menghapus data berdasarkan ID
        if ($this->myconference->delete_submission_by_id($id)) {
            // Jika berhasil menghapus data, tampilkan pesan sukses
            $this->session->set_flashdata('message', 'Deleted!');
            $this->session->set_flashdata('text', 'The conference has been deleted.');
            $this->session->set_flashdata('icon', 'success');
        } else {
            // Jika gagal menghapus data, tampilkan pesan kesalahan
            $this->session->set_flashdata('message', 'Failed to delete data.');
            $this->session->set_flashdata('text', '');
            $this->session->set_flashdata('icon', 'error');
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
                show_error('Submission not found', 404);
            }
            // ...
        }
    }
}
