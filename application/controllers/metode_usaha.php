<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Metode_usaha extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view metode_usaha dan model metode_usaha
	 * Semua CRUD yang berhubungan dengan metode_usaha memanggil controller ini
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
		$this->load->model('metode_usaha_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('metode_usaha/daftar_metode_usaha');
		}

	// fungsi ini digunkan untuk menampilkan daftar metode_usaha

	public function daftar_metode_usaha()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->metode_usaha_model->get_data_metode_usaha();
		$data['content'] = $this->load->view('backend/daftar_metode_usaha', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah metode_usaha baru

	public function form_metode_usaha()
		{
		$isi['urlAction'] = "metode_usaha/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_metode_usaha', $isi);
		$this->load->view('/backend/main', $data);
		}

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_metode_usaha')==""){
				$isi['errnama_metode_usaha'] = true;
				$error=1;
			}
			if($this->input->post('status')==""){
				$isi['errmetode'] = true;
				$error=1;
			}
			
			
			
			
			if($error==1){
				$isi['urlAction'] = "metode_usaha/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_metode_usaha', $isi);
				$this->load->view('/backend/main', $data);
				return;
			}
			
						
			
			$data = array(
			'NAMA_METODE_USAHA' => $this->input->post('nama_metode_usaha'),
			'NILAI' => $this->input->post('nilai'),
			'STATUS' => $this->input->post('status')	
		);
			
		$this->metode_usaha_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('metode_usaha/daftar_metode_usaha');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data metode_usaha

	public function edit($id)
		{
		$hasil = $this->metode_usaha_model->selectone($id);
		$isi['urlAction'] = "metode_usaha/update/" . $id . "";
		$isi['nama_metode_usaha'] = "";
		$isi['status'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_metode_usaha'] = $row->NAMA_METODE_USAHA;
			$isi['nilai'] = $row->NILAI;
			$isi['status'] = $row->STATUS;
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_metode_usaha', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data metode_usaha yang ada di database

	public function update($id)
		{
					
		$data = array(
			'NAMA_METODE_USAHA' => $this->input->post('nama_metode_usaha') ,
			'STATUS' => $this->input->post('status'),
			'NILAI' => $this->input->post('nilai')
			
		);
		$this->metode_usaha_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('metode_usaha/daftar_metode_usaha');
		}
		
		public function changeStatusAktif($id)
		{
					
		$data = array(
			'STATUS' =>1
			
		);
		$this->metode_usaha_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Status Berhasil diperbaharui');
		redirect('metode_usaha/daftar_metode_usaha');
		}
		
		public function changeStatusNonaktif($id)
		{
					
		$data = array(
			'STATUS' =>0
			
		);
		$this->metode_usaha_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Status Berhasil diperbaharui');
		redirect('metode_usaha/daftar_metode_usaha');
		}
		
		

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data metode_usaha

	public function delete($id)
		{
		$this->metode_usaha_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('metode_usaha/daftar_metode_usaha');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */