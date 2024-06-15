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
}
