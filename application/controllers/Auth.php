<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    private function cek_user()
    {
        if ($this->session->userdata('email')) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->cek_user();
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email',
            [
                'required' => 'Email wajib di-isi!',
                'valid_email' => 'Email tidak valid!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[8]|max_length[23]',
            [
                'required' => 'Password wajib di-isi!',
                'min_length' => 'Password minimal berisi 8 karakter!',
                'max_length' => 'Password maksimal berisi 23 karakter!'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('pages/auth/login');
            $this->load->view('template/footer');
        } else {
            $user_data = $this->User_model->get_user_by_email($this->input->post('email'));
            if (!$user_data) {
                $this->session->set_flashdata('error_msg', 'Alamat Email Belum Terdaftar!');
                redirect(base_url('login'));
            } else {
                $correct_pass = md5($this->input->post('password')) == $user_data['password'];
                if ($correct_pass) {
                    $session_user = [
                        'user_id' => $user_data['user_id'],
                        'nama' => $user_data['nama'],
                        'nomor' => $user_data['nomor'],
                        'email' => $user_data['email'],
                        'ballance' => $user_data['ballance'],
                    ];
                    $this->session->set_userdata($session_user);
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('error_msg', 'Password yang Anda Masukkan Salah!');
                    redirect(base_url('login'));
                }
            }
        }
    }

    public function login()
    {
        $this->cek_user();
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email',
            [
                'required' => 'Email wajib di-isi!',
                'valid_email' => 'Email tidak valid!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[8]|max_length[23]',
            [
                'required' => 'Password wajib di-isi!',
                'min_length' => 'Password minimal berisi 8 karakter!',
                'max_length' => 'Password maksimal berisi 23 karakter!'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('pages/auth/login');
            $this->load->view('template/footer');
        } else {
            $user_data = $this->User_model->get_user_by_email($this->input->post('email'));
            if (!$user_data) {
                $this->session->set_flashdata('error_msg', 'Alamat Email Belum Terdaftar!');
                redirect(base_url('login'));
            } else {
                $correct_pass = md5($this->input->post('password')) == $user_data['password'];
                if ($correct_pass) {
                    $session_user = [
                        'user_id' => $user_data['user_id'],
                        'nama' => $user_data['nama'],
                        'nomor' => $user_data['nomor'],
                        'email' => $user_data['email'],
                        'ballance' => $user_data['ballance'],
                    ];
                    $this->session->set_userdata($session_user);
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('error_msg', 'Password yang Anda Masukkan Salah!');
                    redirect(base_url('login'));
                }
            }
        }
    }

    public function register()
    {
        $this->cek_user();
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required',
            [
                'required' => 'Nama wajib di-isi!'
            ]
        );
        $this->form_validation->set_rules(
            'nomor',
            'nomor_telepon',
            'trim|required|min_length[10]|max_length[13]|is_unique[user.nomor]',
            [
                'required' => 'Nomor telepon wajib di-isi!',
                'min_length' => 'Nomor telepon minimal berisi 10 karakter!',
                'max_length' => 'Nomor telepon maksimal berisi 13 karakter!',
                'is_unique' => 'Nomor telepon sudah digunakan pengguna lain!',
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|is_unique[user.email]',
            [
                'required' => 'Email wajib di-isi!',
                'valid_email' => 'Email tidak valid!',
                'is_unique' => 'Email sudah digunakan pengguna lain!',
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'required|min_length[8]|max_length[23]',
            [
                'required' => 'Password wajib di-isi!',
                'min_length' => 'Password minimal berisi 8 karakter!',
                'max_length' => 'Password maksimal berisi 23 karakter!'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password2',
            'required|matches[password1]',
            [
                'required' => 'Konfirmasi Password wajib di-isi!',
                'matches' => 'Password tidak sesuai!'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('pages/auth/register');
            $this->load->view('template/footer');
        } else {
            $available = $this->User_model->get_user_by_email($this->input->post('email'));
            if (!$available) {
                if ($this->User_model->get_user_by_phone($this->input->post('nomor'))) {
                    $this->session->set_flashdata('error_msg', 'Nomor nomorpon Sudah Terdaftar!');
                } else {
                    $user_data = [
                        'nama' => $this->input->post('nama'),
                        'nomor' => $this->input->post('nomor'),
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password1'))
                    ];
                    $this->User_model->create_user($user_data);
                    $this->session->set_flashdata('success_msg', 'Selamat! Akun Berhasil Dibuat.');
                }

                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('error_msg', 'Alamat Email Sudah Terdaftar!');
                redirect(base_url('register'));
            }
        }
    }

    public function logout()
    {
        if ($this->session->userdata('email')) {
            $userdata_keys = array(
                'id',
                'nama',
                'nomor',
                'email',
                'role',
                'is_active',
                'created_at'
            );
            foreach ($userdata_keys as $key) {
                $this->session->unset_userdata($key);
            }
            $this->session->set_flashdata('success_msg', 'Berhasil Log Out.');
        }
        redirect(base_url('login'));
    }
}
