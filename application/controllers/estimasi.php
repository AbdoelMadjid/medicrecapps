<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Estimasi extends CI_Controller
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
		 $this->load->model('aw_model');
		 $this->load->model('tcf_model');
		 $this->load->model('ecf_model');
        $this->load->model('estimasi_model');
        $this->load->library('session');
        if ($this->session->userdata('username') == NULL) {
            
            // redirect('login');
            
        }
    }
    
    public function index()
    {
        redirect('uc/daftar_use_case');
    }
    
    // fungsi ini digunkan untuk menampilkan daftar uc
    
    public function daftar_log_estimasi()
    {
        //$isi['pesan']="Load Data Berhasil";
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $isi['pesan']      = $this->session->flashdata('pesan');
        $isi['isi']        = $this->estimasi_model->get_log_estimasi();
        $data['content']   = $this->load->view('frontend/daftar_log_estimasi', $isi);
        $this->load->view('/backend/main', $data);
    }
	
	// daftar log use case
	 public function daftar_log_use_case($id)
    {
        //$isi['pesan']="Load Data Berhasil";
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $isi['pesan']      = $this->session->flashdata('pesan');
        $isi['isi']        = $this->estimasi_model->get_log_use_case($id);
        $data['content']   = $this->load->view('frontend/daftar_log_use_case', $isi);
        $this->load->view('/backend/main', $data);
    }
	
    
    
    
    // fungsi ini digunakan untuk menampilkan form tambah uc baru
    
    public function form_ucw()
    {
        // setting session null
        $this->session->set_userdata('id_aplikasi',"");
		$this->session->set_userdata('hasil' ,"");
        $isi['isi']        = $this->estimasi_model->get_data_ucw();
		$isi['kirim']        = $this->session->flashdata('kirim');
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $data['content']   = $this->load->view('frontend/form_ucw', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    
    public function add_ucw()
    {
        // initial value
        $jum_simple    = 0;
        $jum_average   = 0;
        $jum_complex   = 0;
        $nama_aplikasi = $this->input->post('nama_aplikasi');
        // log transaksi
        
        // insert aplication name
        $check = $this->session->userdata('id_aplikasi');
        if ($check == "") {
            // checking apakah sudah dimasukan nama aplikasi
            if ($nama_aplikasi == "") {
                $status["STATUS"]      = "Nama aplikasi Belum dimasukan.";
                $status["diasble"]     = false;
                $status["diasbleUC"]   = true;
                $status["diasbleTran"] = true;
                
            } else {
                $dataaplikasi = array(
                    'NAMA_APLIKASI' => $this->input->post('nama_aplikasi'),
					'STATUS' => 0,
                    'DATE_CREATED' =>DATE('d-m-Y')
                );
                
                $this->estimasi_model->insert_log_transaction($dataaplikasi);
                // get id max aplikasi and store in the session
                $this->session->set_userdata('id_aplikasi', $this->estimasi_model->getMaxID()->row()->ID_APLIKASI);
                $status["STATUS"]      = " Nama aplikasi berhasil disimpan, silahkan masukan nama use case dan jumlah transaksi";
                $status["diasble"]     = true;
                $status["diasbleUC"]   = false;
                $status["diasbleTran"] = false;
                
            }
            
        } else {
            // melakukan penyimpanan use case dan jumlah transaksi serta melakukan pengkategorian use case 
            $namaUseCase    = $this->input->post('nama_uc');
            $inputtransaksi = $this->input->post('jum_transaksi');
            
            if ($namaUseCase == "" && $inputtransaksi == 0) {
                $status["STATUS"] = " Anda belum memasukan Nama Use Case atau jumlah transaksi";
            } else {
                
                //checking klasifikasi categori berdasarkan use case
                // get all catgory
                $result = $this->uc_model->get_data_uc();
                
                foreach ($result->result() as $row) {
                    
                    $id_category      = $row->ID_UC_WEIGHT;
                    $jumlah_transaksi = $row->JUMLAH_TRANSAKSI;
                    $bobot				=$row->BOBOT;
                    
                    // checking characteristic of character 
                    if (substr($row->JUMLAH_TRANSAKSI, 0, 2) == "<=") {
                        
                        //conversi  mix string to int
                        $number = (float) filter_var($jumlah_transaksi, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        
                        if ($number <= $inputtransaksi) {
                            $datauc = array(
                                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                                'NAMA_USE_CASE' => $namaUseCase,
                                'JUM_TRANSAKSI' => $inputtransaksi,
								'BOBOT' =>  $bobot,
                                'ID_KATEGORI' => $id_category
                            );
                            
                            $this->estimasi_model->insert_log_uc_weight($datauc);
                            break;
                        }
                    } elseif (substr($row->JUMLAH_TRANSAKSI, 0, 2) == ">=") {
                        
                        //conversi  mix string to int							
                        $number = (float) filter_var($row->JUMLAH_TRANSAKSI, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        
                        if ($number <= $inputtransaksi) {
                            $datauc = array(
                                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                                'NAMA_USE_CASE' => $namaUseCase,
                                'JUM_TRANSAKSI' => $inputtransaksi,
								'BOBOT' =>  $bobot,
                                'ID_KATEGORI' => $id_category
                            );
                            
                            $this->estimasi_model->insert_log_uc_weight($datauc);
                            break;
                        }
                        
                    } else {
                        $inputRangeSplit = explode("-", $jumlah_transaksi);
                        $awal            = $inputRangeSplit[0];
                        // error handling
                        $akhir           = isset($inputRangeSplit[1]) ? $inputRangeSplit[1] : 0;
                        
                        
                        if (($awal <= $inputtransaksi) && ($inputtransaksi <= $akhir)) {
                            $datauc = array(
                                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                                'NAMA_USE_CASE' => $namaUseCase,
                                'JUM_TRANSAKSI' => $inputtransaksi,
								'BOBOT' =>  $bobot,
                                'ID_KATEGORI' => $id_category
                            );
                            
                            $this->estimasi_model->insert_log_uc_weight($datauc);
                            break;
                            
                        }
                        
                    }
                }
                $status["STATUS"]  = " Nama use case dan aplikasi sudah disimpan, silahkan masukan use case yang lain";
                $status["diasble"] = true;
            }
            
            $jum_simple  = $this->estimasi_model->countCatUW($this->session->userdata('id_aplikasi'),1)->row()->JUMLAH;
            $jum_average = $this->estimasi_model->countCatUW($this->session->userdata('id_aplikasi'),2)->row()->JUMLAH;
            $jum_complex = $this->estimasi_model->countCatUW($this->session->userdata('id_aplikasi'),3)->row()->JUMLAH;
        }
		// kalkulasi hasil akhir perhitungan
		//$bobot_simple	=$this->estimasi_model->get_bobotUW(1)->row()->BOBOT;
		//$bobot_average	=$this->estimasi_model->get_bobotUW( 2)->row()->BOBOT;
		//$bobot_complex	=$this->estimasi_model->get_bobotUW( 3)->row()->BOBOT;
		
      //  $status["hasil"] = ($jum_simple * $bobot_simple) + ($jum_average * $bobot_average) + ($jum_complex * $bobot_complex);
		//melakukan perhitungan hasil
		 $hasil=$this->estimasi_model->hasilUW($this->session->userdata('id_aplikasi'))->row()->HASIL;
		 
		 // insert data from Use Case Weight in log transaction
		 $id_aplikasi=$this->session->userdata('id_aplikasi');
		  $dataucw = array(
                                'UCW' => $hasil
                            );				
							
		$this->estimasi_model->update_transaction_log($dataucw,$id_aplikasi);
		 
		$status["hasil"] = $hasil;
        $status["Simple"]  = $jum_simple;
        $status["Average"] = $jum_average;
        $status["Complex"] = $jum_complex;
        echo json_encode($status);
        
        
    }
    
    public function form_aw()
    {
			
			
        $isi['isi']        = $this->estimasi_model->get_data_aw();
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $data['content']   = $this->load->view('frontend/form_aw', $isi);
        $this->load->view('/backend/main', $data);
	}
	
    
    public function add_aw()
    {
        
        // initial value
        $jum_simple  = 0;
        $jum_average = 0;
        $jum_complex = 0;
		$status["STATUS"]="";
        $nama_aktor  = $this->input->post('nama_aktor');
		$kategori 	= $this->input->post('kategori');
		// log transaksi
        
        // insert aplication name
        $check = $this->session->userdata('id_aplikasi');
		
		$status["STATUS"]  = $jum_simple;
        if ($nama_aktor == "" || $kategori == "") {
			
			$status["STATUS"]="Masukkan nama kategori dan nama aktor";
			
			
            
        } else {
			
			//get bobot berdasarkan category
            $bobot=$this->estimasi_model->get_bobotAW($kategori)->row()->BOBOT;
            $dataaw = array(
                                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                                'NAMA_AKTOR' => $nama_aktor,
                                'ID_KATEGORI' => $kategori,
								'BOBOT' => $bobot
                            );
			
            $this->estimasi_model->insert_log_actor_weight($dataaw);
			$status["STATUS"]="Data Actor Sudah Dimasukan";
			
			
			$jum_simple  = $this->estimasi_model->countCatAW($this->session->userdata('id_aplikasi'), 1)->row()->JUMLAH;
			$jum_average = $this->estimasi_model->countCatAW($this->session->userdata('id_aplikasi'), 2)->row()->JUMLAH;
            $jum_complex = $this->estimasi_model->countCatAW($this->session->userdata('id_aplikasi'), 3)->row()->JUMLAH;
        }
			// menghitung perumusan UAW
			//$bobot_simple	=$this->estimasi_model->get_bobotAW( 1)->row()->BOBOT;
			//$bobot_average	=$this->estimasi_model->get_bobotAW( 2)->row()->BOBOT;
			//$bobot_complex	=$this->estimasi_model->get_bobotAW( 3)->row()->BOBOT;
		
			//$hasil=($jum_simple*$bobot_simple) +($jum_average*$bobot_average)+($jum_complex*$bobot_complex);
			$hasil=$this->estimasi_model->hasilAW($this->session->userdata('id_aplikasi'))->row()->HASIL;
			
			//update log transaction by insert value of AW
			
			 $id_aplikasi=$this->session->userdata('id_aplikasi');
			  $datauaw = array(
                                'UAW' => $hasil
                            );				
							
		$this->estimasi_model->update_transaction_log($datauaw,$id_aplikasi);
		
		 // sending value to view by Json
			$status["Simple"]  = $jum_simple;
            $status["Average"] = $jum_average;
            $status["Complex"] = $jum_complex;
			$status["hasil"] = $hasil;
		//$status["hasil2"] = $hasil2;
			
		 echo json_encode($status);
        
    
	}
    
    public function form_tcf()
    {
        
        // $data['header']=$this->load->view('backend/header');
        //
        // $data['content']=$this->load->view('backend/form
        $this->load->model('tcf_model');
        $isi['isi']        = $this->tcf_model->get_data_tcf();
        $isi['urlAction']  = "uc/tambah";
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $data['content']   = $this->load->view('frontend/form_tcf', $isi);
        $this->load->view('/backend/main', $data);
    }
	public function add_tcf()
	{
		// get session id aplikasi
		 $id_aplikasi = $this->session->userdata('id_aplikasi');
		// melakukan penghapusan untuk melakukan pembaharuan log jika sudah ada sebelumnya
		 $jumlah=$this->estimasi_model->deletetcf($id_aplikasi);
		// get count indikator tcf untuk pengulangan
		$jumlah=$this->estimasi_model->countTf()->row()->JUMLAH;
		//echo var_dump($jumlah);
		$index=1;
		
		while($index<=$jumlah){
			
			$var1='idtcf'.$index.'';
			$var2='bobot'.$index.'';
			$var3='surveytcf'.$index.'';
			 $id_tcf  	= $this->input->post($var1);
			 $bobot  	= $this->input->post($var2);
			 $survey  	= $this->input->post($var3);
			 $datatcf = array(
                                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                                'ID_TCF' => $id_tcf,
								'VALUE' =>$survey,
								'BOBOT' =>$bobot,								
                            );
			//echo var_dump($datatcf);		
			
		$this->estimasi_model->insert_log_tcf_weight($datatcf);
		$index++;
			
		}
		//echo var_dump($index); 
		//count using sum untuk mendapatkan nilai tcf
		//mendapatkan jumlah seluruh nilai survey yang dilaikan dengan tcf
		 $tf=$this->estimasi_model->sumLogTf($id_aplikasi)->row()->VALUE;
		$nilaitcf=0.6+(0.01*$tf);
		
		$status["hasil"] = $nilaitcf;
		
		// melakukan update log_transaction dengan memasukan nilai negatif TCF
		$id_aplikasi=$this->session->userdata('id_aplikasi');
			  $datatcf = array(
                                'TCF' =>$nilaitcf
                            );				
							
		$this->estimasi_model->update_transaction_log($datatcf,$id_aplikasi);
		
		$status["STATUS"] = "Data Sudah tersimpan";
			
		 echo json_encode($status);
		
	}
    
    
    public function form_ecf()
    {
        $this->load->model('ecf_model');
        $isi['isi'] = $this->ecf_model->get_data_tcf();
        
        $isi['urlAction']  = "uc/tambah";
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $data['content']   = $this->load->view('frontend/form_ecf', $isi);
        $this->load->view('/backend/main', $data);
    }
    
	public function add_ecf()
	{
		// get session id aplikasi
		$id_aplikasi = $this->session->userdata('id_aplikasi');
		 // untuk melakukan penghapusan terlebih dahulu jika ada pembaharuan
		$jumlah=$this->estimasi_model->deleteecf($id_aplikasi);
		// get count indikator tcf untuk pengulangan
		$jumlah=$this->estimasi_model->countEf()->row()->JUMLAH;
		$index=1;
		
		while($index<=$jumlah){
			
			 $var1='idef'.$index.'';
			 $var2='bobot'.$index.'';
			 $var3='surveyef'.$index.'';
			 $id_ecf  	= $this->input->post($var1);
			 $bobot  	= $this->input->post($var2);
			 $survey  	= $this->input->post($var3);
			
			
			 $dataecf = array(
                                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                                'ID_ECF' => $id_ecf,
								'VALUE' =>$survey,
								'BOBOT' =>$bobot,								
                            );
			
		$this->estimasi_model->insert_log_ecf_weight($dataecf);
		$index++;
			
		}
		
		//count using sum untuk mendapatkan nilai tcf
		//mendapatkan jumlah seluruh nilai survey yang dilaikan dengan tcf
		 $ef=$this->estimasi_model->sumLogEf($id_aplikasi)->row()->VALUE;
		$nilaief=0.6+(0.01*$ef);
		
		// melakukan update log_transaction dengan memasukan nilai negatif TCF
		
			  $dataecf = array(
                                'ECF' =>$nilaief
                            );				
							
		$this->estimasi_model->update_transaction_log($dataecf ,$id_aplikasi);
		
		
		$status["hasil"] = $nilaief;
		$status["STATUS"] = "Data Sudah tersimpan";
			
		 echo json_encode($status);
		
	}
    
  public function result()
    {
       // get data log application
	   // get session id aplikasi
		$id_aplikasi = $this->session->userdata('id_aplikasi');
        $get_data=$this->estimasi_model->spesific_transaction($id_aplikasi);
		$uaw	=	$get_data->row()->UAW;
		$ucw	=	$get_data->row()->UCW;
		$ecf	=	$get_data->row()->ECF;
		$tcf	=	$get_data->row()->TCF;
		
		$nilai_ucp=($uaw+$ucw)*$ecf*$tcf;
		
		//echo var_dump($nilai_ucp);
		//return;
		// for show into view
		$isi['uaw'] 		= $uaw;
		$isi['ucw'] 		= $ucw;
		$isi['ecf'] 		= $ecf;
		$isi['tcf'] 		= $tcf;
		$isi['nilai_ucp'] 	= $nilai_ucp;
		
		//$isi['aktivitas'] = $get_data_acitivity();
		
		// nilai hour effort
		
		$isi['nama_metode_usaha'] 	= 	$this->estimasi_model->get_konstanta_effort()->row()->NAMA_METODE_USAHA;
		$konstanta					=	$this->estimasi_model->get_konstanta_effort()->row()->NILAI;
		$nilai_hour_effort			=	$konstanta*$nilai_ucp;
		$isi['nilai_hour_effort']	= 	$nilai_hour_effort;
        
		// nilai estimasi usaha
		$distribusi_usaha			=	$this->estimasi_model->get_distribusi_usaha();
		$isi['distribusi_usaha']	=	$this->estimasi_model->get_distribusi_usaha();
        
        $data['header']    = $this->load->view('backend/header');
        $data['menu_kiri'] = $this->load->view('backend/menu_kiri');
        $data['content']   = $this->load->view('frontend/result', $isi);
        $this->load->view('/backend/main', $data);
    
	
	}
	
	public function  printRecapUCP(){
		
		// get session id aplikasi
		$id_aplikasi = $this->session->userdata('id_aplikasi');
		
		
		
		
		// untuk menentukan distribusi usaha
		$get_data=$this->estimasi_model->spesific_transaction($id_aplikasi);
		$uaw	=	$get_data->row()->UAW;
		$ucw	=	$get_data->row()->UCW;
		$ecf	=	$get_data->row()->ECF;
		$tcf	=	$get_data->row()->TCF;
		$nilai_ucp=($uaw+$ucw)*$ecf*$tcf;
		$konstanta					=	$this->estimasi_model->get_konstanta_effort()->row()->NILAI;
		$nilai_hour_effort			=	($uaw+$ucw)*$ecf*$tcf;
		
		$isi['nilai_hour_effort']	= 	$nilai_hour_effort;
		$isi['distribusi_usaha']	=	$this->estimasi_model->get_distribusi_usaha();
		
		// untuk lampiran
		//log UCW
		$isi['log_ucw']=$this->estimasi_model->get_data_log_ucw($id_aplikasi);
		$isi['nilai_ucw'] =	$ucw;
		// log UAW
		$isi['log_uaw']	=	$this->estimasi_model->get_data_log_aw($id_aplikasi);
		$isi['nilai_uaw'] =	$uaw;
		
		//LOG TCF
		$isi['log_tcf']=$this->estimasi_model->get_data_log_tcf($id_aplikasi);
		
		$isi['nilai_tcf'] =$tcf;
		//LOG ECF
		$isi['log_ecf']=$this->estimasi_model->get_data_log_tcf($id_aplikasi);
		$isi['nilai_ecf'] = $ecf;
		
		
	$this->load->view('frontend/print/templete_print2', $isi);
    /*
	$html = $this->output->get_output();
		
		// Load/panggil library dompdfnya
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'potrait'); 
		$this->dompdf->render();
		//utk menampilkan preview pdf
		$this->dompdf->stream("result.pdf",array('Attachment'=>0));
	//atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
	//$this->dompdf->stream("welcome.pdf");
		*/
	
	}
	
	public function submit(){
		
		// get session id aplikasi
		$id_aplikasi = $this->session->userdata('id_aplikasi');
		
		// update untuk field biaya estimasi
		$nilai=$this->input->post('total');
		
		$kirimestimasi = array(
                                'BIAYA_ESTIMASI' =>$nilai
                            );				
		
		$this->estimasi_model->update_transaction_log($kirimestimasi ,$id_aplikasi);
		$this->session->set_flashdata('kirim',"Estimasi Biaya sudah dikonfirmasi");
		
		redirect('estimasi/form_ucw');
		
	}
	
	public function popUCW(){
		
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = "";
		$data['menu_kiri'] = "";
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->uc_model->get_data_uc();
		$data['content'] = $this->load->view('frontend/popup/daftar_use_case', $isi);
		$this->load->view('/backend/main', $data);
		
	}
	public function popAW(){
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = "";
		$data['menu_kiri'] = "";
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->aw_model->get_data_aw();
		$data['content'] = $this->load->view('frontend/popup/daftar_aw', $isi);
		$this->load->view('/backend/main', $data);
		
	}
	public function popTCF(){
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = "";
		$data['menu_kiri'] = "";
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->tcf_model->get_data_tcf();
		$data['content'] = $this->load->view('frontend/popup/daftar_tcf', $isi);
		$this->load->view('/backend/main', $data);
		
	}
	public function popECF(){
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = "";
		$data['menu_kiri'] = "";
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->ecf_model->get_data_tcf();
		$data['content'] = $this->load->view('frontend/popup/daftar_ecf', $isi);
		$this->load->view('/backend/main', $data);
		
		
	}
    

  
  }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */