<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
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

    public function getOlimpiadeSubmissions()
    {
        $this->db->select('olimpiade_submissions.*, user.name');
        $this->db->from('olimpiade_submissions');
        $this->db->join('user', 'olimpiade_submissions.user_id = user.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPaymentVerify($limit, $start, $keyword = null)
    {
        $this->db->select('payment_conference.*, user.name, cs.user_id, cs.topic, cs.title, cs.journal_path, cs.is_paid, cs.is_accept', FALSE);
        $this->db->join('conference_submissions cs', 'cs.id = payment_conference.conference_id', 'inner');
        $this->db->join('user', 'user.id = cs.user_id', 'inner');
        $this->db->where('is_accept', 'accepted');
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('name', $keyword);
        }
        $this->db->order_by('payment_conference.id', 'DESC');

        return $this->db->get('payment_conference', $limit, $start)->result_array();
    }

    public function getOlimpiadeVerify($limit, $start, $keyword = null)
    {
        $this->db->select('payment_olimpiade.*, user.name, os.is_paid');
        $this->db->join('olimpiade_submissions os', 'os.id = payment_olimpiade.olimpiade_id');
        $this->db->join('user', 'user.id = payment_olimpiade.user_id');
        if ($keyword) {
            $this->db->like('name', $keyword);
        }
        $this->db->order_by('payment_olimpiade.id', 'DESC');

        return $this->db->get('payment_olimpiade', $limit, $start)->result_array();
    }

    // public function getParticipantVerify() {
    //     $this->db->select('payment_participant', )
    // }

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
