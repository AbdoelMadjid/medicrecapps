<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pasien extends CI_Controller

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
		$this->load->model('pasien_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('pasien/daftar_pasien');
		}

	// fungsi ini digunkan untuk menampilkan daftar user

	public function daftar_pasien()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->pasien_model->get_data_pasien();
		$data['content'] = $this->load->view('backend/daftar_pasien', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		public function data_rekam_medik( $id)
		{
			$hasil = $this->pasien_model->selectone($id);
		$isi['urlAction'] = "pasien/update/" . $id . "";
		$isi['nama_pasien'] = "";
		
		foreach($hasil->result() as $row)
			{
			
			$isi['nama_pasien'] = $row->nama_pasien;
			
			
			$isi['url_foto'] = $row->url_foto;
			}
			
			
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->pasien_model->get_data_rekam_medik_pasien($id);
		$data['content'] = $this->load->view('backend/rekam_medik', $isi);
		$this->load->view('/backend/main', $data);
		}
		
 public function form_rekam_medik()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "pasien/tambah_rekam_medik";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_rekam_medik', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		 public function odontogram()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->pasien_model->get_data_pasien();
		$data['content'] = $this->load->view('backend/odontogram', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		
public function tambah_rekam_medik()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_pasien')==""){
				$isi['errnama_pasien'] = true;
				$error=1;
			}
			if($this->input->post('usia_pasien')==""){
				$isi['errusia_pasien'] = true;
				$error=1;
			}
			if($this->input->post('tanggal_lahir')==""){
				$isi['errtanggal_lahir'] = true;
				$error=1;
			}
			if($this->input->post('alamat_pasien')==""){
				$isi['erralamat_pasien'] = true;
				$error=1;
			}
			
			if($this->input->post('kewarganegaraan')==""){
				$isi['errkewarganegaraan'] = true;
				$error=1;
			}
			
			
			if($error==1){
				
				$isi['urlAction'] = "pasien/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_pasien', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
			
		$field_name = 'pasien';
		$config['upload_path'] = "img/fotopasien";
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

		$path[0] = 'img/fotopasien/' . $file_name;
		$path[1] = $file_name;

		// return $path;

		$data = array(
			'nama_pasien' => $this->input->post('nama_pasien') ,
			'usia_pasien' => $this->input->post('usia_pasien') ,
			'tanggal_lahir' => $this->input->post('tanggal_lahir') ,
			'alamat_pasien' => $this->input->post('alamat_pasien'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan') ,
			
			'url_foto' => $path[0]
		);
		$this->pasien_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('pasien/daftar_pasien');
		
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah user baru

	public function form_pasien()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "pasien/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_pasien', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data user kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_pasien')==""){
				$isi['errnama_pasien'] = true;
				$error=1;
			}
			if($this->input->post('usia_pasien')==""){
				$isi['errusia_pasien'] = true;
				$error=1;
			}
			if($this->input->post('tanggal_lahir')==""){
				$isi['errtanggal_lahir'] = true;
				$error=1;
			}
			if($this->input->post('alamat_pasien')==""){
				$isi['erralamat_pasien'] = true;
				$error=1;
			}
			
			if($this->input->post('kewarganegaraan')==""){
				$isi['errkewarganegaraan'] = true;
				$error=1;
			}
			
			
			if($error==1){
				
				$isi['urlAction'] = "pasien/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_pasien', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
			
		$field_name = 'pasien';
		$config['upload_path'] = "img/fotopasien";
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

		$path[0] = 'img/fotopasien/' . $file_name;
		$path[1] = $file_name;

		// return $path;

		$data = array(
			'nama_pasien' => $this->input->post('nama_pasien') ,
			'usia_pasien' => $this->input->post('usia_pasien') ,
			'tanggal_lahir' => $this->input->post('tanggal_lahir') ,
			'alamat_pasien' => $this->input->post('alamat_pasien'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan') ,
			
			'url_foto' => $path[0]
		);
		$this->pasien_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('pasien/daftar_pasien');
		
		}
		
		

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data user

	public function edit($id)
		{
		$hasil = $this->pasien_model->selectone($id);
		$isi['urlAction'] = "pasien/update/" . $id . "";
		$isi['nama'] = "";
		$isi['username'] = "";
		$isi['password'] = "";
		$isi['role'] = "";
		$isi['url_foto'] = "";
		foreach($hasil->result() as $row)
			{
			
			$isi['nama_pasien'] = $row->nama_pasien;
			$isi['usia_pasien'] = $row->usia_pasien;
			$isi['tanggal_lahir'] = $row->tanggal_lahir;
			$isi['alamat_pasien'] = $row->alamat_pasien;
			$isi['kewarganegaraan'] = $row->kewarganegaraan;
			
			$isi['url_foto'] = $row->url_foto;
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_pasien', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data user yang ada di database

	public function update($id)
		{
			//validate recent password
			
			$hasil = $this->pasien_model->selectone($id);
			
			
		$field_name = 'fotopasien';
		$config['upload_path'] = "img/fotopasien";
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

		$path[0] = 'img/fotopasien/' . $file_name;
		$path[1] = $file_name;

		// return $path;

		$field_name = 'pasien';
		$config['upload_path'] = "img/fotopasien";
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

		$path[0] = 'img/fotopasien/' . $file_name;
		$path[1] = $file_name;

		// return $path;

		$data = array(
			'nama_pasien' => $this->input->post('nama_pasien') ,
			'usia_pasien' => $this->input->post('usia_pasien') ,
			'tanggal_lahir' => $this->input->post('tanggal_lahir') ,
			'alamat_pasien' => $this->input->post('alamat_pasien'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan') ,
			
			'url_foto' => $path[0]
		);
		$this->pasien_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('pasien/daftar_pasien');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data user

	public function delete($id)
		{
		$this->pasien_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('pasien/daftar_pasien');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */