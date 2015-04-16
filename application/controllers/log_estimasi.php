<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Log_estimasi extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view uc dan model uc
	 * Semua CRUD yang berhubungan dengan uc memanggil controller ini
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
		$this->load->model('tcf_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('log_estimasi/daftar_log_estimasi');
		}

	// fungsi ini digunkan untuk menampilkan daftar uc

	public function daftar_log_estimasi()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->tcf_model->get_data_tcf();
		$data['content'] = $this->load->view('backend/daftar_log_estimasi', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah uc baru

	public function form_tcf()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "log_estimasi/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_tcf', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data uc kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('indikator')==""){
				$isi['errindikator'] = true;
				$error=1;
			}
			if($this->input->post('deskripsi')==""){
				$isi['errdeskripsi'] = true;
				$error=1;
			}
			if($this->input->post('bobot')==""){
				$isi['errbobot'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$isi['urlAction'] = "log_estimasi/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_tcf', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
			$data = array(
			'INDIKATOR' => $this->input->post('indikator') ,
			'DESKRIPSI' => $this->input->post('deskripsi') ,
			'BOBOT' => $this->input->post('bobot')
			
		);
			
		$this->tcf_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('log_estimasi/daftar_log_estimasi');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data uc

	public function edit($id)
		{
		$hasil = $this->tcf_model->selectone($id);
		$isi['urlAction'] = "log_estimasi/update/" . $id . "";
		$isi['indikator'] = "";
		$isi['deskripsi'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['indikator'] = $row->INDIKATOR;
			$isi['deskripsi'] = $row->DESKRIPSI;
			$isi['bobot'] = $row->BOBOT;
			
			
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_tcf', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data uc yang ada di database

	public function update($id)
		{
					
		$data = array(
			'INDIKATOR' => $this->input->post('indikator') ,
			'DESKRIPSI' => $this->input->post('deskripsi') ,
			'BOBOT' => $this->input->post('bobot')
			
		);
		$this->tcf_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('log_estimasi/daftar_log_estimasi');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data uc

	public function delete($id)
		{
		$this->tcf_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('log_estimasi/daftar_log_estimasi');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */