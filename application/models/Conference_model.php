<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conference_model extends CI_Model
{
    public function getSubmitPaper($limit, $start, $keyword = null)
    {
        // $query = "SELECT `conference_submissions`.*,`user`.`name`
        // FROM `conference_submissions` JOIN `user`
        // ON `conference_submissions`.`user_id`= `user`.`id`";

        // return $this->db->query($query)->result_array();
        $this->db->select('conference_submissions.*, user.name');
        $this->db->join('user', 'user_id = conference_submissions.user_id');
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('name', $keyword);
        }

        return $this->db->get('conference_submissions', $limit, $start)->result_array();
    }
}
