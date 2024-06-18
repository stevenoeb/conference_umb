<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conference_model extends CI_Model
{
    public function getSubmitPaper($limit, $start, $keyword = null)
    {
        $this->db->select('conference_submissions.*, user.name');
        $this->db->join('user', 'user.id = conference_submissions.user_id');
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('name', $keyword);
        }

        return $this->db->get('conference_submissions', $limit, $start)->result_array();
    }
}
