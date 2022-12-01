<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Transaksi_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		if (!$this->session->userdata('email')) {
			$this->load->view('template/navbar');
			$this->load->view('pages/landing/index');
		} else {
			$this->load->view('template/logged_in_navbar');
			$data['ballance'] = $this->session->userdata('ballance');
			$data['income_transactions'] = $this->Transaksi_model->get_incomes();
			$data['expense_transactions'] = $this->Transaksi_model->get_expenses();
			$this->load->view('pages/dashboard/index', $data);
		}
		$this->load->view('template/footer');
	}
}
