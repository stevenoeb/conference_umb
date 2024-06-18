<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getPaymentVerify($limit, $start, $keyword = null)
    {
        $this->db->select('payment.*, user.name, cs.user_id, cs.topic, cs.title, cs.journal_path, cs.is_paid, cs.is_accept');
        $this->db->join('conference_submissions cs', 'cs.id = payment.conference_id', 'inner');
        $this->db->join('user', 'user.id = cs.user_id', 'inner');
        $this->db->like('is_accept', 'accepted');
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('name', $keyword);
        }
        $this->db->order_by('payment.id', 'DESC');

        return $this->db->get('payment', $limit, $start)->result_array();
    }

    public function getArticleVerify($limit, $start, $keyword = null)
    {
        $this->db->select('conference_submissions.*, user.name');
        $this->db->join('user', 'user.id = conference_submissions.user_id', 'inner');
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('name', $keyword);
        }
        $this->db->order_by('conference_submissions.id', 'DESC');

        return $this->db->get('conference_submissions', $limit, $start)->result_array();
    }

    public function countAllArticles()
    {
        return $this->db->get("conference_submissions")->num_rows();
    }

    public function countAllAcceptedArticles()
    {
        $query = "SELECT COUNT(id) FROM conference_submissions WHERE is_accept LIKE '%accepted%'";

        return $this->db->query($query)->row_array();
    }

    public function countAllPresenter()
    {
        $query = "SELECT COUNT(id) AS presenter FROM user WHERE role_id=3";

        return $this->db->query($query)->row_array();
    }

    public function countAllPeserta()
    {
        $query = "SELECT COUNT(id) AS peserta FROM user WHERE role_id=6";

        return $this->db->query($query)->row_array();
    }
}
