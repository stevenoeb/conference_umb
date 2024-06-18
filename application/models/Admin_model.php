<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getPayment()
    {
        $query = "SELECT `payment`.*, `cs`.*, `user`.`name`
        FROM `payment`
        INNER JOIN `conference_submissions` AS `cs`
        ON `payment`.`conference_id` = `cs`.`id`
        INNER JOIN `user`
        ON `cs`.`user_id` = `user`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function getAllPaper()
    {
        $query = "SELECT COUNT(id) AS totalPaper FROM conference_submissions";

        return $this->db->query($query)->row_array();
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
