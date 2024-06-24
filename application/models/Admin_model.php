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

    public function getOlimpiadeSubmissions($limit, $start, $keyword = null)
    {
        $this->db->select('olimpiade_submissions.*, user.name');
        $this->db->join('user', 'olimpiade_submissions.user_id = user.id');
        if ($keyword) {
            $this->db->like('name', $keyword);
        }
        $this->db->order_by('olimpiade_submissions.id', 'DESC');
        return $this->db->get('olimpiade_submissions', $limit, $start)->result_array();
    }

    public function getPaymentVerify($limit, $start, $keyword = null)
    {
        $this->db->select('payment_conference.*, user.name, cs.user_id, cs.topic, cs.title, cs.journal_path, cs.is_paid, cs.is_accept', FALSE);
        $this->db->join('user', 'user.id = payment_conference.user_id', 'inner');
        $this->db->join('conference_submissions cs', 'cs.id = payment_conference.conference_id', 'inner');
        $this->db->where('is_accept', 'accepted');
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('title', $keyword);
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

    public function getParticipantVerify($limit, $start, $keyword = null)
    {
        $this->db->select('payment_participant.*, user.name');
        $this->db->join('user', 'user.id = payment_participant.user_id');
        if ($keyword) {
            $this->db->like('name', $keyword);
        }
        $this->db->order_by('payment_participant.id', 'DESC');

        return $this->db->get('payment_participant', $limit, $start)->result_array();
    }

    public function countAllArticles()
    {
        return $this->db->get("conference_submissions")->num_rows();
    }

    public function countAllAcceptedArticles()
    {
        $this->db->where('is_accept', 'accepted');
        return $this->db->get('conference_submissions')->num_rows();
    }

    public function countAllPresenter()
    {
        $this->db->where('role_id', 3);
        $this->db->count_all();
        return $this->db->get('user')->num_rows();
    }

    public function countAllOlimpiade()
    {
        $this->db->count_all();
        return $this->db->get('olimpiade_submissions')->num_rows();
    }

    public function countAllPeserta()
    {
        $this->db->where('role_id', 6);
        $this->db->count_all();
        return $this->db->get('user')->num_rows();
    }
}
