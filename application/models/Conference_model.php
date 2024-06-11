<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conference_model extends CI_Model
{
    public function getSubmitPaper()
    {
        $query = "SELECT `conference_submissions`.*,`user`.`name`
        FROM `conference_submissions` JOIN `user`
        ON `conference_submissions`.`user_id`= `user`.`id`";

        return $this->db->query($query)->result_array();
    }
}
