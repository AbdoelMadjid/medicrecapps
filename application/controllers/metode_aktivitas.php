<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class metode_aktivitas extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view metode_aktivitas dan model metode_aktivitas
	 * Semua CRUD yang berhubungan dengan metode_aktivitas memanggil controller ini
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
		$this->load->model('metode_aktivitas_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('metode_aktivitas/daftar_metode_aktivitas');
		}

	// fungsi ini digunkan untuk menampilkan daftar metode_aktivitas

	public function daftar_metode_aktivitas()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->metode_aktivitas_model->get_data_metode_aktivitas();
		$data['content'] = $this->load->view('backend/daftar_metode_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah metode_aktivitas baru

	public function form_metode_aktivitas()
		{
		$isi['urlAction'] = "metode_aktivitas/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_metode_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_metode_aktivitas')==""){
				$isi['errnama_metode_aktivitas'] = true;
				$error=1;
			}
			if($this->input->post('status')==""){
				$isi['errmetode'] = true;
				$error=1;
			}
			
			
			
			
			if($error==1){
				$isi['urlAction'] = "metode_aktivitas/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_metode_aktivitas', $isi);
				$this->load->view('/backend/main', $data);
				return;
			}
			
						
			
			$data = array(
			'NAMA_METODE_AKTIVITAS' => $this->input->post('nama_metode_aktivitas') ,
			'STATUS' => $this->input->post('status')
			
		);
			
		$this->metode_aktivitas_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('metode_aktivitas/daftar_metode_aktivitas');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data metode_aktivitas

	public function edit($id)
		{
		$hasil = $this->metode_aktivitas_model->selectone($id);
		$isi['urlAction'] = "metode_aktivitas/update/" . $id . "";
		$isi['nama_metode_aktivitas'] = "";
		$isi['status'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_metode_aktivitas'] = $row->NAMA_METODE_AKTIVITAS;
			$isi['status'] = $row->STATUS;
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_metode_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data metode_aktivitas yang ada di database

	public function update($id)
		{
					
		$data = array(
			'NAMA_METODE_AKTIVITAS' => $this->input->post('nama_metode_aktivitas') ,
			'STATUS' => $this->input->post('status')
			
		);
		$this->metode_aktivitas_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('metode_aktivitas/daftar_metode_aktivitas');
		}
		
		public function changeStatusAktif($id)
		{
					
		$data = array(
			'STATUS' =>1
			
		);
		$this->metode_aktivitas_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Status sudah diperbaruhi');
		redirect('metode_aktivitas/daftar_metode_aktivitas');
		}
		
		public function changeStatusNonaktif($id)
		{
					
		$data = array(
			'STATUS' =>0
			
		);
		$this->metode_aktivitas_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Status sudah diperbaruhi');
		redirect('metode_aktivitas/daftar_metode_aktivitas');
		}
		
		

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data metode_aktivitas

	public function delete($id)
		{
		$this->metode_aktivitas_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('metode_aktivitas/daftar_metode_aktivitas');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */