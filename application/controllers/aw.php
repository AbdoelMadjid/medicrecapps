<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Aw extends CI_Controller

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
		$this->load->model('aw_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('aw/daftar_aw');
		}

	// fungsi ini digunkan untuk menampilkan daftar uc

	public function daftar_aw()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->aw_model->get_data_aw();
		$data['content'] = $this->load->view('backend/daftar_aw', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah uc baru

	public function form_aw()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "aw/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_aw', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data uc kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('klasifikasi')==""){
				$isi['errklasifikasi'] = true;
				$error=1;
			}
			/*
			if($this->input->post('tipe')==""){
				$isi['errtipe'] = true;
				$error=1;
			}
			*/
			if($this->input->post('bobot')==""){
				$isi['errbobot'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$isi['urlAction'] = "aw/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_aw', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
			$data = array(
			'KLASIFIKASI_AKTOR' => $this->input->post('klasifikasi') ,
			//'TIPE_AKTOR' => $this->input->post('tipe') ,
			'BOBOT' => $this->input->post('bobot')
			
		);
			
		$this->aw_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('aw/daftar_aw');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data uc

	public function edit($id)
		{
		$hasil = $this->aw_model->selectone($id);
		$isi['urlAction'] = "aw/update/" . $id . "";
		$isi['tipe'] = "";
		$isi['klasifikasi_aktor'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['tipe'] = $row->TIPE_AKTOR;
			$isi['klasifikasi'] = $row->KLASIFIKASI_AKTOR;
			$isi['bobot'] = $row->BOBOT;
			
			
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_aw', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data uc yang ada di database

	public function update($id)
		{
					
		$data = array(
			'TIPE_AKTOR' => $this->input->post('tipe') ,
			'KLASIFIKASI_AKTOR' => $this->input->post('klasifikasi') ,
			'BOBOT' => $this->input->post('bobot')
			
		);
		$this->aw_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('aw/daftar_aw');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data uc

	public function delete($id)
		{
		$this->aw_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('aw/daftar_aw');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */