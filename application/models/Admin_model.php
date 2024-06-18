<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getPaymentVerify()
    {
        $query = "SELECT `payment`.*, `cs`.*, `user`.`name`
        FROM `payment`
        INNER JOIN `conference_submissions` AS `cs`
        ON `payment`.`conference_id` = `cs`.`id`
        INNER JOIN `user`
        ON `cs`.`user_id` = `user`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function getArticleVerify($limit, $start, $keyword = null)
    {
        $this->db->join('user', 'user.id = conference_submissions.user_id');
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('name', $keyword);
        }
        return $this->db->get('conference_submissions', $limit, $start)->result_array();
    }

    public function countAllArticles()
    {
        return $this->db->get("conference_submissions")->num_rows();
    }

    public function getAllPresenter()
    {
        $query = "SELECT COUNT(id) AS presenter FROM user WHERE role_id=3";

        return $this->db->query($query)->row_array();
    }

    public function getAllPeserta()
    {
        $query = "SELECT COUNT(id) AS peserta FROM user WHERE role_id=6";

        return $this->db->query($query)->row_array();
    }
}
