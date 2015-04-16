<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Uc extends CI_Controller

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
		$this->load->model('uc_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('uc/daftar_use_case');
		}

	// fungsi ini digunkan untuk menampilkan daftar uc

	public function daftar_use_case()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->uc_model->get_data_uc();
		$data['content'] = $this->load->view('backend/daftar_use_case', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah uc baru

	public function form_use_case()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "uc/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_use_case', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data uc kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('tipe')==""){
				$isi['errtipe'] = true;
				$error=1;
			}
			/*
			if($this->input->post('transaksi')==""){
				$isi['errtransaksi'] = true;
				$error=1;
			}
			*/
			if($this->input->post('bobot')==""){
				$isi['errbobot'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$isi['urlAction'] = "uc/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_use_case', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
						
			
			$data = array(
			'TIPE' => $this->input->post('tipe') ,
			//'JUMLAH_TRANSAKSI' => $this->input->post('transaksi') ,
			'BOBOT' => $this->input->post('bobot')
			
		);
			
		$this->uc_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('uc/daftar_use_case');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data uc

	public function edit($id)
		{
		$hasil = $this->uc_model->selectone($id);
		$isi['urlAction'] = "uc/update/" . $id . "";
		$isi['tipe'] = "";
		$isi['transaksi'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['tipe'] = $row->TIPE;
			$isi['transaksi'] = $row->JUMLAH_TRANSAKSI;
			$isi['bobot'] = $row->BOBOT;
			
			
			}

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_use_case', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data uc yang ada di database

	public function update($id)
		{
					
		$data = array(
			//'TIPE' => $this->input->post('tipe') ,
			'JUMLAH_TRANSAKSI' => $this->input->post('transaksi') ,
			'BOBOT' => $this->input->post('bobot')
			
		);
		$this->uc_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('uc/daftar_use_case');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data uc

	public function delete($id)
		{
		$this->uc_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('uc/daftar_use_case');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */