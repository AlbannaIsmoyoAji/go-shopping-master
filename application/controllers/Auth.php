<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function proseslogin()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Kolom <b>%s</b> Tidak Boleh Kosong.');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/login');
		}
		else
		{
			$cek = $this->Auth_model->CekLogin('user', array('username' => $username, 'password' => md5($password)));
			
			if($cek->num_rows() > 0)
			{
				$data = $cek->row_array();
				
				if($data['level'] == 'Admin')
				{
					$this->session->set_userdata('level', 'Admin');
					$this->session->set_userdata('username', $data['username']);
					redirect(base_url('admin'));
				}
				if($data['level'] == 'Pembeli')
				{
					$this->session->set_userdata('level', 'Pembeli');
					$this->session->set_userdata('username', $data['username']);
					redirect(base_url('/'));
				}
			}
			else
			{
				$cek = $this->Auth_model->CekLogin('user', array('username' => $username, 'password' => md5($password)));
				$data = $cek->row_array();

				if($data['username'] != $username && $data['password'] != $password)
				{
					$this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
					redirect(base_url('login'));
				}
				else
				{
					if($data['password'] != $password)
					{
						$this->session->set_flashdata('error', 'Kata Sandi Salah');
						redirect(base_url('login'));
					}
				}
			}
		}
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function prosesregister()
	{
		$username	= $this->input->post('username');
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]');
		$this->form_validation->set_message('required', 'Mohon Maaf! Kolom <b>%s</b> Tidak Boleh Kosong.');
		$this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s '. $username .'</b> Sudah Digunakan.');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! Kolom <b>%s</b> Minimal 5 Karakter');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/register');
		}
		else
		{
			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => md5($password),
				'level' => 'Pembeli',
			);
			$data = $this->Auth_model->Insert('user', $data);
			$this->session->set_flashdata('sukses', 'Selamat! Akun <b>'. $username .'</b> Berhasil Mendaftar. Silahkan Login');
			redirect(base_url('register'));
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
    }
}
