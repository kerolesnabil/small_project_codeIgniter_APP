<?php

class UsersModel extends CI_Model{


    public function get_all($page)
    {
        $this->db->limit(10,$page);
       return $this->db->get('users');
    }
    function get_num()
    {
        return $this->db->count_all_results('users');
    }

    function get_by_id($id)
    {

        $this->db->where('id',$id);
        $this->db->limit(1);
        return $this->db->get('users');

    }

    function update($user_id,$user)
    {
        $this->db->where('id',$user_id);
        $this->db->update('users',$user);
    }

}