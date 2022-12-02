<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('email')) {
            redirect(base_url('login'));
        }
    }

    public function edit()
    {
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
            'Telepon',
            'trim|required|min_length[10]|max_length[13]|is_unique[user.nomor]',
            [
                'required' => 'Nomor telepon wajib di-isi!',
                'min_length' => 'Nomor telepon minimal berisi 10 karakter!',
                'max_length' => 'Nomor telepon maksimal berisi 13 karakter!',
                'is_unique' => 'Nomor telepon sudah digunakan pengguna lain!',
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/logged_in_navbar');
            $this->load->view('pages/dashboard/edit_profile');
            $this->load->view('template/footer');
        } else {
            if ($this->input->post('nama') == $this->session->userdata('nama') && $this->input->post('nomor') == $this->session->userdata('nomor')) {
                $this->session->set_flashdata('error_msg', 'Tidak Ada Perubahan Akun!');
            } else {
                $isDeletedUser = !$this->User_model->get_user_by_email($this->session->userdata('email'));
                if (!$isDeletedUser) {
                    if ($this->input->post('nomor') != $this->session->userdata('nomor')) {
                        $phone_available = !$this->User_model->get_user_by_phone($this->input->post('nomor'));
                        if ($phone_available) {
                            $data = [
                                'nama' => $this->input->post('nama'),
                                'nomor' => $this->input->post('nomor')
                            ];
                            $this->User_model->update_user($this->session->userdata('email'), $data);
                            $this->session->set_flashdata('success_msg', 'Berhasil Merubah Info Akun!');
                        } else {
                            $this->session->set_flashdata('error_msg', 'Nomor Telepon Sudah Terdaftar!');
                        }
                    } else {
                        $data = [
                            'nama' => $this->input->post('nama'),
                        ];
                        $this->User_model->update_user($this->session->userdata('email'), $data);
                        $this->session->set_flashdata('success_msg', 'Berhasil Merubah Info Akun!');
                        
                    }
                } else {
                    $this->session->set_flashdata('error_msg', 'User Tidak Terdaftar!');
                }
            }
            redirect(base_url('edit-profile'));
        }
    }

    public function _edit()
    {
    }
}
