<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('email')) {
            $this->refetch();
        }
    }


    public function create_user($user)
    {
        $this->db->insert('user', $user);
    }

    public function update_user($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('user', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    public function get_all_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_by_email($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_user_by_phone($phone)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nomor', $phone);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function refetch()
    {
        $user_data = $this->get_user_by_email($this->session->userdata('email'));
        $session_user = [
            'user_id' => $user_data['user_id'],
            'nama' => $user_data['nama'],
            'nomor' => $user_data['nomor'],
            'email' => $user_data['email'],
            'ballance' => $user_data['ballance'],
        ];
        $this->session->set_userdata($session_user);
    }
}
