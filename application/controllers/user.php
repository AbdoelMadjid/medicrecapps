<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller

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

	public function index()
		{
		redirect('user/daftar_pengguna');
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
		
		public function daftar_request_pengguna()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->user_model->get_data_user_request();
		$data['content'] = $this->load->view('backend/daftar_request_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menampilkan form tambah user baru

	public function form_registrasi()
		{

	$isi['urlAction'] = "user/success_register";
		$this->load->view('form_registrasi',$isi);
		}
		
		
		public function success_register()
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
				
				
				$isi['urlAction'] = "user/success_register";
				$this->load->view('form_registrasi',$isi);
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
		$this->session->set_flashdata('pesan', 'Data Sudah Terkirim');
		redirect('login');
		
		}
		
		
		
	
	public function form_pengguna()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "user/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_pengguna', $isi);
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
		
		

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data user

	public function edit($id)
		{
		$hasil = $this->user_model->selectone($id);
		$isi['urlAction'] = "user/update/" . $id . "";
		$isi['nama'] = "";
		$isi['username'] = "";
		$isi['password'] = "";
		$isi['role'] = "";
		$isi['url_foto'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_lengkap'] = $row->nama_lengkap;
			$isi['nama_panggilan'] = $row->nama_panggilan;
			$isi['alamat'] = $row->alamat;
			$isi['email'] = $row->email;
			$isi['username'] = $row->username;
			$isi['password'] = $row->password;
			$isi['role'] = $row->role;
			$isi['kewarganegaraan'] = $row->kewarganegaraan;
			$isi['url_foto'] = $row->url_foto;
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}

		
		public function detail_user($id)
		{
		$hasil = $this->user_model->selectone($id);
		$isi['urlAction'] = "user/update/" . $id . "";
		$isi['nama'] = "";
		$isi['username'] = "";
		$isi['password'] = "";
		$isi['role'] = "";
		$isi['url_foto'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_lengkap'] = $row->nama_lengkap;
			$isi['nama_panggilan'] = $row->nama_panggilan;
			$isi['alamat'] = $row->alamat;
			$isi['email'] = $row->email;
			$isi['username'] = $row->username;
			$isi['password'] = $row->password;
			$isi['role'] = $row->role;
			$isi['kewarganegaraan'] = $row->kewarganegaraan;
			$isi['url_foto'] = $row->url_foto;
			}

		$data['header'] = "";
		$data['menu_kiri'] = "";
		$data['content'] = $this->load->view('backend/form_detail_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}

		
	// fungsi ini digunakan untuk melakukan pengubahan data user yang ada di database

	public function update($id)
		{
			//validate recent password
			
			$hasil = $this->user_model->selectone($id);
			
			foreach($hasil->result() as $row)
			{
			
			if(md5($this->input->post('password'))==$row->password){
				$isi['urlAction'] = "user/update/" . $id . "";
			$isi['nama_lengkap'] = $row->nama_lengkap;
			$isi['nama_panggilan'] = $row->nama_panggilan;
			$isi['alamat'] = $row->alamat;
			$isi['email'] = $row->email;
			$isi['username'] = $row->username;
			$isi['password'] = $row->password;
			$isi['role'] = $row->role;
			$isi['kewarganegaraan'] = $row->kewarganegaraan;
			$isi['url_foto'] = $row->url_foto;
			$isi['edit'] = true;
			$isi['pesan'] = "Password Tidak sesuai dengan yang sebelumnya";
			$data['header'] = $this->load->view('backend/header');
			$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
			$data['content'] = $this->load->view('backend/form_pengguna', $isi);
			$this->load->view('/backend/main', $data);
		 return;
				
			}
									
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
		$this->user_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('user/daftar_pengguna');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data user

	public function delete($id)
		{
		$this->user_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('user/daftar_pengguna');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */