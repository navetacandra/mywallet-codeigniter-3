<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function topup($name, $description, $amount, $type) {
        $user_id = $this->session->userdata('user_id');
        $data = [
            "type" => strtolower($type),
            "category_id" => 1,
            "user_id" => $user_id,
            "name" => $name,
            "description" => $description,
            "amount" => $amount,
        ];
        $this->db->insert("transaksi", $data);
        $this->db->from("user");
        $this->db->where("user_id", $user_id);
        $current_ballance = $this->db->get()->row_array()["ballance"];
        $this->db->set("ballance", $current_ballance + $amount);
        $this->db->where("user_id", $user_id);
        $this->db->update("user");
    }

    public function get_incomes() {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('user_id', $user_id);
        $this->db->where('category_id', '1');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_income_by_id($id) {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $id);
        $this->db->where('category_id', '1');
        $result = $this->db->get()->result_array()[0];
        return $result;
    }

    public function get_expense_by_id($id) {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $id);
        $this->db->where('category_id', '2');
        $result = $this->db->get()->result_array()[0];
        return $result;
    }
    
    public function get_expenses() {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('user_id', $user_id);
        $this->db->where('category_id', '2');
        $result = $this->db->get()->result_array();
        return $result;
    }
}