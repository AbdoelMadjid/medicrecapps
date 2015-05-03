<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view user dan model user
	 * Semua CRUD yang berhubungan dengan user memanggil controller ini
	 * Created by Mukhamad Faiz Fanani 
	 * V.1.0
	 */
	public function __construct()
		{
		parent::__construct();
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->model('user_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	

	// fungsi ini digunkan untuk menampilkan daftar user
	public function daftar_pengguna()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->user_model->get_data_user();
		$data['content'] = $this->load->view('backend/daftar_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		
		
	// fungsi ini digunakan untuk menampilkan form tambah user baru

	public function form_register()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "register/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('form_register', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data user kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_lengkap')==""){
				$isi['errnama_lengkap'] = true;
				$error=1;
			}
			if($this->input->post('nama_panggilan')==""){
				$isi['errnama_panggilan'] = true;
				$error=1;
			}
			if($this->input->post('alamat')==""){
				$isi['erralamat'] = true;
				$error=1;
			}
			if($this->input->post('email')==""){
				$isi['erremail'] = true;
				$error=1;
			}
			if($this->input->post('username')==""){
				$isi['errusername'] = true;
				$error=1;
			}
			if($this->input->post('password')==""){
				$isi['errpassword'] = true;
				$error=1;
			}
			if($this->input->post('peran')==""){
				$isi['errperan'] = true;
				$error=1;
			}
			
			if($this->input->post('kewarganegaraan')==""){
				$isi['errkewarganegaraan'] = true;
				$error=1;
			}
			
			
			if($error==1){
				
				$isi['urlAction'] = "user/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_pengguna', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
			
		$field_name = 'fotouser';
		$config['upload_path'] = "img/fotouser";
		$config['allowed_types'] = '*';
		$config['max_size'] = '10000';

		// $config['allowed_types'] ='jpg';
		// create folder

		if (!is_dir($config['upload_path']))
			{
			mkdir($config['upload_path'], 0777);

			// mkdir($config['upload_path2'], 0777);

			}

		$this->load->library('upload', $config);
		$files = $this->upload->do_upload($field_name);
		$data = $this->upload->data(); //get file_name
		if (!$files)
			{
			$file_name = 'default.jpg';
			$gagal = $this->upload->display_errors();
			}
		  else
			{
			$file_name = $data['file_name'];
			}

		$path[0] = 'img/fotouser/' . $file_name;
		$path[1] = $file_name;

		// return $path;

		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap') ,
			'nama_panggilan' => $this->input->post('nama_panggilan') ,
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username') ,
			'password' => md5($this->input->post('password')) ,
			'role' => $this->input->post('peran') ,
			'kewarganegaraan' => $this->input->post('kewarganegaraan') ,
			'status' => 0,
			'url_foto' => $path[0]
		);
		$this->user_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('user/daftar_pengguna');
		
		}
		
		
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */