<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myconference_model extends CI_Model
{
    public function getDataSubmit()
    {
        $query = "SELECT `conference_submissions`.*,`user`.`name`
        FROM `conference_submissions` JOIN `user`
        ON `conference_submissions`.`user_id`= `user`.`id`";

        return $this->db->query($query)->result_array();
    }

    // public function getMyConference()
    // {
    //     $query = "SELECT `cs`.*, `user`.`id`, `user`.`name`
    //     FROM `conference_submissions` AS `cs`
    //     INNER JOIN `user`
    //     ON `cs`.`user_id` = `user`.`id`
    //     WHERE `user`.`id` = 14";

    //     return $this->db->query($query)->result_array();
    // }

    public function getDataSubmitByUserId($user_id)
    {
        $this->db->select('conference_submissions.*, user.name');
        $this->db->from('conference_submissions');
        $this->db->join('user', 'conference_submissions.user_id = user.id');
        $this->db->where('conference_submissions.user_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function getSubmissionById($submission_id)
    {
        // Query untuk mengambil data submission dan informasi user terkait
        $this->db->select('cs.*, u.name as user_name'); // Ambil kolom name dari tabel user sebagai user_name
        $this->db->from('conference_submissions cs');
        $this->db->join('user u', 'u.id = cs.user_id'); // Sesuaikan dengan kolom yang sesuai
        $this->db->where('cs.id', $submission_id);
        $query = $this->db->get();

        return $query->row_array(); // Mengembalikan satu baris data sebagai array
    }

    public function savePaymentData($data)
    {
        $this->db->insert('payment', $data);
    }

    public function updateIsPaidStatus($conference_id)
    {
        $this->db->where('id', $conference_id);
        $this->db->update('conference_submissions', ['is_paid' => 'pending']);
    }
    public function delete_submission_by_id($id)
    {
        // Menghapus data dari tabel berdasarkan ID
        $this->db->where('id', $id);
        return $this->db->delete('conference_submissions');  // Gantilah 'submissions' dengan nama tabel Anda
    }
}
