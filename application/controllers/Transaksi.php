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
                'required' => 'Deskripsi transaksi wajib di-isi!',
                'min_length' => 'Deskripsi transaksi minimal berisi 3 karakter!',
                'max_length' => 'Deskripsi transaksi maksimal berisi 255 karakter!',
            ]
        );
		$this->form_validation->set_rules(
            'description',
            'Description',
            'trim|required|min_length[3]|max_length[255]',
            [
                'required' => 'Deskripsi transaksi wajib di-isi!',
                'min_length' => 'Deskripsi transaksi minimal berisi 3 karakter!',
                'max_length' => 'Deskripsi transaksi maksimal berisi 255 karakter!',
            ]
        );
		$this->form_validation->set_rules(
            'amount',
            'Amount',
            'trim|required|numeric|callback_amount_check_topup',
            [
                'required' => 'Jumlah transaksi wajib di-isi!',
            ]
        );
		$this->form_validation->set_rules(
            'type',
            'Type',
            'required|callback_type_check_topup',
            [
                'required' => 'Jumlah transaksi wajib di-isi!',
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
			$name = $this->input->post("name");
			$description = $this->input->post("description");
			$amount = $this->input->post("amount");
			$type = $this->input->post("type");
			$this->Transaksi_model->topup($name, $description, $amount, $type);
			redirect(base_url("income-list"));
		}
	}

	public function transfer()
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
                'required' => 'Deskripsi transaksi wajib di-isi!',
                'min_length' => 'Deskripsi transaksi minimal berisi 3 karakter!',
                'max_length' => 'Deskripsi transaksi maksimal berisi 255 karakter!',
            ]
        );
		$this->form_validation->set_rules(
            'description',
            'Description',
            'trim|required|min_length[3]|max_length[255]',
            [
                'required' => 'Deskripsi transaksi wajib di-isi!',
                'min_length' => 'Deskripsi transaksi minimal berisi 3 karakter!',
                'max_length' => 'Deskripsi transaksi maksimal berisi 255 karakter!',
            ]
        );
		$this->form_validation->set_rules(
            'amount',
            'Amount',
            'trim|required|numeric|callback_amount_check_transfer',
            [
                'required' => 'Jumlah transaksi wajib di-isi!',
            ]
        );
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			if (!$this->session->userdata('email')) {
				redirect(base_url("login"));
			} else {
				$this->load->view('template/logged_in_navbar');
				$this->load->view('pages/dashboard/transaction/transfer');
			}
			$this->load->view('template/footer');
		} else {
			$name = $this->input->post("name");
			$description = $this->input->post("description");
			$amount = $this->input->post("amount");
			$type = $this->input->post("type");
			$this->Transaksi_model->topup($name, $description, $amount, $type);
			redirect(base_url("income-list"));
		}
	}

	public function amount_check_transfer($value) {
		if($value < 10000) {
			$this->form_validation->set_message('amount_check_transfer', "Minimal jumlah transfer adalah 10.000!");
			return false;
		}
		return true;
	}

	public function amount_check_topup($value) {
		if($value < 10000) {
			$this->form_validation->set_message('amount_check_topup', "Minimal jumlah topup adalah 10.000!");
			return false;
		}
		return true;
	}

	public function type_check_topup($value) {
		if($value == 'none') {
			$this->form_validation->set_message('type_check_topup', "Type wajib dipilih!");
			return false;
		}
		return true;
	}

	public function download_income_invoice_pdf($id) {
		if (!$this->session->userdata('email')) {
			redirect(base_url("login"));
		} else {
			$data['income_transactions'] = $this->Transaksi_model->get_income_by_id($id);
			$this->load->view('pages/dashboard/transaction/income-invoice', $data);
		}
	}

	public function download_expense_invoice_pdf($id) {
		if (!$this->session->userdata('email')) {
			redirect(base_url("login"));
		} else {
			$data['expense_transactions'] = $this->Transaksi_model->get_expense_by_id($id);
			$this->load->view('pages/dashboard/transaction/expense-invoice', $data);
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