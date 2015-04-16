<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Aktivitas extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view aktivitas dan model aktivitas
	 * Semua CRUD yang berhubungan dengan aktivitas memanggil controller ini
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
		$this->load->model('aktivitas_model');
		$this->load->model('metode_aktivitas_model');
		$this->load->model('profesi_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('aktivitas/daftar_aktivitas');
		}

	// fungsi ini digunkan untuk menampilkan daftar aktivitas

	public function daftar_aktivitas()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->aktivitas_model->get_data_aktivitas();
		$data['content'] = $this->load->view('backend/daftar_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah aktivitas baru

	public function form_aktivitas()
		{

		$isi['metode_aktivitas'] = $this->metode_aktivitas_model->get_data_metode_aktivitas();
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['urlAction'] = "aktivitas/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data aktivitas kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_aktivitas')==""){
				$isi['errtipe'] = true;
				$error=1;
			}
			if($this->input->post('metode_aktivitas')==0){
				$isi['errmetode_aktivitas'] = true;
				$error=1;
			}
			
			if($this->input->post('id_kategori_aktivitas')==0){
				$isi['erridkategori_aktivitas'] = true;
				$error=1;
			}
			
			if($this->input->post('profesi')==0){
				$isi['errprofesi'] = true;
				$error=1;
			}
			if($this->input->post('presentase')==""){
				$isi['errpresentasei'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$isi['urlAction'] = "aktivitas/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_aktivitas', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
						
			
			$data = array(
			'NAMA_AKTIVITAS' => $this->input->post('nama_aktivitas') ,
			'ID_METODE_AKTIVITAS' => $this->input->post('metode_aktivitas') ,
			'ID_KATEGORI_AKTIVITAS' => $this->input->post('id_kategori_aktivitas') ,
			'ID_PROFESI' => $this->input->post('profesi'),
			'PRESENTASE' => $this->input->post('presentase')
			
		);
			
		$this->aktivitas_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('aktivitas/daftar_aktivitas');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data aktivitas

	public function edit($id)
		{
		$hasil = $this->aktivitas_model->selectone($id);
		$isi['urlAction'] = "aktivitas/update/" . $id . "";
		$isi['nama_aktivitas'] = "";
		$isi['metode_aktivitas'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_aktivitas'] = $row->NAMA_AKTIVITAS;
			$isi['id_profesi'] = $row->ID_PROFESI;
			$isi['id_metode_aktivitas'] = $row->ID_METODE_AKTIVITAS;
			$isi['presentase'] = $row->PRESENTASE;
			
			
			}
		$isi['metode_aktivitas'] = $this->metode_aktivitas_model->get_data_metode_aktivitas();
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data aktivitas yang ada di database

	public function update($id)
		{
					
		$data = array(
			'NAMA_AKTIVITAS' => $this->input->post('nama_aktivitas') ,
			'ID_METODE_AKTIVITAS' => $this->input->post('metode_aktivitas') ,
			'ID_PROFESI' => $this->input->post('profesi'),
			'PRESENTASE' => $this->input->post('presentase')
			
		);
		$this->aktivitas_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('aktivitas/daftar_aktivitas');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data aktivitas

	public function delete($id)
		{
		$this->aktivitas_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('aktivitas/daftar_aktivitas');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */