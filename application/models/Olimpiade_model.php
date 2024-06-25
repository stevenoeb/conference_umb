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

    public function getOlimpiadeVerify($id)
    {
        $this->db->select('user.id AS `userID`, olimpiade_submissions.id AS `olimpiadeID`');
        $this->db->join('user', 'user.id = olimpiade_submissions.user_id');
        $this->db->where('user.id', $id);
        return $this->db->get('olimpiade_submissions')->row_array();
    }

    public function getOlimpiadeUnpaid($id)
    {
        $this->db->select('olimpiade_submissions.*, user.name, user.id');
        $this->db->join('user', 'user.id = olimpiade_submissions.user_id');
        $condition = [
            'is_paid' => 'unpaid',
            'user.id' => $id
        ];
        $this->db->where($condition);
        return $this->db->get('olimpiade_submissions')->result_array();
    }
}
