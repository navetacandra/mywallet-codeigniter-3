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

    public function transfer($recipient, $message, $amount) {
        $user_id = $this->session->userdata('user_id');
        $username = $this->session->userdata('nama');

        $this->db->from("user");
        $this->db->where("user_id", $recipient);
        $recipient_details = $this->db->get()->row_array();
        
        $data_sender = [
            "type" => "account",
            "category_id" => 2,
            "user_id" => $user_id,
            "name" => "Transfer to: ". $recipient_details["nama"],
            "description" => "Transfer to: ". $recipient_details["nama"] . "<br/>Message: " . $message,
            "amount" => $amount,
        ];
        $data_recipient = [
            "type" => "account",
            "category_id" => 1,
            "user_id" => $recipient,
            "name" => "Transfer from: ". $username,
            "description" => "Message : ". $message,
            "amount" => $amount,
        ];

        $this->db->insert("transaksi", $data_sender);
        $this->db->insert("transaksi", $data_recipient);

        // Sender Ballance
        $this->db->from("user");
        $this->db->where("user_id", $user_id);
        $current_ballance = $this->db->get()->row_array()["ballance"];
        $this->db->set("ballance", $current_ballance - $amount);
        $this->db->where("user_id", $user_id);
        $this->db->update("user");

        // Recipient Ballance
        $current_ballance = $recipient_details["ballance"];
        $this->db->set("ballance", $current_ballance + $amount);
        $this->db->where("user_id", $recipient);
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