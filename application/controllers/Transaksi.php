<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
	}

	public function topup()
	{
		$this->form_validation->set_rules(
            'name',
            'Name',
            'trim|required|min_length[3]|max_length[20]',
            [
                'required' => 'Nama transaksi wajib di-isi!',
                'min_length' => 'Nama transaksi minimal berisi 3 karakter!',
                'max_length' => 'Nama transaksi maksimal berisi 20 karakter!',
            ]
        );
		$this->form_validation->set_rules(
            'description',
            'Description',
            'trim|required|min_length[3]|max_length[255]',
            [
                'required' => 'Nama transaksi wajib di-isi!',
                'min_length' => 'Deskripsi transaksi minimal berisi 3 karakter!',
                'max_length' => 'Deskripsi transaksi maksimal berisi 255 karakter!',
            ]
        );
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			if (!$this->session->userdata('email')) {
				redirect(base_url("login"));
			} else {
				$this->load->view('template/logged_in_navbar');
				$this->load->view('pages/dashboard/transaction/topup');
			}
			$this->load->view('template/footer');
		} else {
		}
	}

    public function income_list()
	{
        $this->load->view('template/header');
		if (!$this->session->userdata('email')) {
            redirect(base_url("login"));
		} else {
			$this->load->view('template/logged_in_navbar');
			$data['income_transactions'] = $this->Transaksi_model->get_incomes();
			$this->load->view('pages/dashboard/transaction/income-list', $data);
		}
		$this->load->view('template/footer');
    }

    public function expense_list()
	{
        $this->load->view('template/header');
		if (!$this->session->userdata('email')) {
            redirect(base_url("login"));
		} else {
			$this->load->view('template/logged_in_navbar');
			$data['expense_transactions'] = $this->Transaksi_model->get_expenses();
			$this->load->view('pages/dashboard/transaction/expense-list', $data);
		}
		$this->load->view('template/footer');
    }
}