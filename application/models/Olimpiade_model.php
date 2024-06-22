<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Olimpiade_submission_model extends CI_Model
{
    public function insert_submission($user_id, $video_link)
    {
        $data = array(
            'user_id' => $user_id,
            'link_video' => $video_link,
            'upload_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('olimpiade_submissions', $data);
    }
}

class Olimpiade_model extends CI_Model
{
    public function insert_video_link($video_link)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $user['id'];

        // Memanggil model Olimpiade_submission_model untuk menyimpan data
        $this->load->model('Olimpiade_submission_model', 'submission_model');
        return $this->submission_model->insert_submission($user_id, $video_link);
    }

    public function getOlimpiadeVerify()
    {
        $this->db->join('olimpiade_submissions os', 'os.id = payment_olimpiade.olimpiade_id');
        return $this->db->get('payment_olimpiade')->result_array();
    }
}
