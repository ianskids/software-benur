<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/Spout/Autoloader/autoload.php';


use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Common\Entity\Style\Color;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Common\Entity\Row;

// namespace App\Controllers;
class Benur_Proses extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_benur');
		$this->load->model('M_benur_proses');
		$this->load->model('M_petambak');

	}

	public function index() {


		$data['userdata'] = $this->userdata;

		$data['page'] = "regular";
		$data['judul'] = "Data Benur Regular";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenurProses";
		$data['jnsBnr'] = 'reg';

		$this->template->views('benur_proses/data-benur/home', $data);
	}

	public function data_proses() {


		$data['userdata'] = $this->userdata;

		$data['page'] = "regular";
		$data['judul'] = "Data Benur Regular";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenurProses";
		$data['jnsBnr'] = 'reg';

		$this->template->views('benur_proses/data-proses/home', $data);
	}

	public function premium() {


		$data['userdata'] = $this->userdata;

		$data['page'] = "premium";
		$data['judul'] = "Data Benur Premium";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenurProses";
		$data['jnsBnr'] = "prem";

		$this->template->views('benur_proses/home', $data);
	}

	public function maksimalprima() {


		$data['userdata'] = $this->userdata;

		$data['page'] = "maksimalprima";
		$data['judul'] = "Data Benur Maksimal Prima";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenurProses";
		$data['jnsBnr'] = "mp";

		$this->template->views('benur_proses/home', $data);
	}
	public function tampil($jenis= 'reg', $proses='daftar') {
		$data['dataBenur'] = $this->M_benur_proses->select_all_benur($jenis, $proses);
		
		$this->load->view('benur_proses/data-benur/list_data', $data);
	}
	public function tampil_proses($jenis= 'reg', $proses='daftar') {
		$data['dataBenur'] = $this->M_benur_proses->select_all_benur($jenis, $proses);
		
		$this->load->view('benur_proses/data-proses/list_data', $data);
	}

	public function jumlah($jenis= 'reg', $status='daftar') {
				
		echo json_encode($this->M_benur_proses->sum($jenis, $status)[0]);
	}


	public function detail() {
		$id = trim($_POST['id']);
		$data['userdata'] = $this->userdata;
		$data['dataBenur'] = $this->M_benur->select_by_id($id);
		$data['dataPetambak'] = $this->M_petambak->select_all_petambak();
		$data['dataJenisBenur'] = $this->M_benur->select_jenis_benur();
		$data['dataAgen'] = $this->M_benur->select_agen();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/benur_proses/modal_detail_benur', 'detail-benur', $data, 'lg');
	}


	public function update() {
		$id = trim($_POST['id']);
		$data['userdata'] = $this->userdata;
		$data['dataBenur'] = $this->M_benur->select_by_id($id);
		$data['dataPetambak'] = $this->M_petambak->select_all_petambak();
		$data['dataJenisBenur'] = $this->M_benur->select_jenis_benur();
		$data['dataAgen'] = $this->M_benur->select_agen();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/benur_proses/modal_update_benur', 'update-benur', $data, 'lg');
	}


	


	public function prosesInsert() {

	if ($this->input->post('alamat')) {
		$this->form_validation->set_rules('alamat' , 'Alamat', 'trim|required');
		$this->form_validation->set_rules('register' , 'Register', 'trim|required');
		$this->form_validation->set_rules('nama' , 'Nama', 'trim|required');
		$this->form_validation->set_rules('namaPendaftar', 'Nama Pendaftar', 'trim|required');
		$this->form_validation->set_rules('idAgen', 'agen', 'trim');
		$this->form_validation->set_rules('noHp', 'no hp', 'trim');
		$this->form_validation->set_rules('jnsBenur', 'jenis benur', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('kantong', 'kantong', 'trim|required');
		$this->form_validation->set_rules('jmlBenur', 'jmlBenur', 'trim|required');
		$this->form_validation->set_rules('jmlKantong', 'jmlKantong', 'trim|required');
		$this->form_validation->set_rules('tglSchedule', 'tglSchedule', 'trim|required');
		$this->form_validation->set_rules('biaya', 'biaya', 'trim');

		$data = $this->input->post();
		//print_r($data); die();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->M_benur_proses->proses($data);
				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Berhasil diupdate', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Gagal diupdate', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}
			
		}else{
				$result = $this->M_benur_proses->prosesbyid($this->input->post('id'));
				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Berhasil diupdate', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Gagal diupdate', '20px');
				}
			}
		

		echo json_encode($out);
	}
	public function prosesInsertKode() {

		$this->form_validation->set_rules('kode' , 'Kode', 'trim|required');
		$this->form_validation->set_rules('perkantong' , 'Isi Perkantong', 'trim|required');
		$this->form_validation->set_rules('stok' , 'Stok tersedia', 'trim|required');
		$this->form_validation->set_rules('kebutuhan', 'Nama Pendaftar', 'trim|required');
		$this->form_validation->set_rules('selisih', 'Selisih', 'trim|required');
		$this->form_validation->set_rules('id[]', 'Data Tambak', 'trim|required');

		$data = $this->input->post();

			if ($this->form_validation->run() == TRUE) {
				$result = $this->M_benur_proses->prosesinsertkode($data);
				if ($result[0] > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Berhasil diupdate', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Gagal diupdate', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_benur->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Benur Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Benur Gagal dihapus', '20px');
		}
	}

	public function print($id) {
		$data['userdata'] = $this->userdata;
		$data['dataBenur'] = $this->M_benur->select_by_id($id);
		$data['dataPetambak'] = $this->M_petambak->select_all_petambak();
		$data['dataJenisBenur'] = $this->M_benur->select_jenis_benur();
		$data['dataAgen'] = $this->M_benur->select_agen();
		$data['userdata'] = $this->userdata;

		$this->load->view('benur/print', $data);
	}


		public function proses_ajax() {
		$alamat = $this->input->get('alamat');
		$data['dataPetambak'] = $this->M_petambak->pilih_alamat($alamat);

		echo json_encode($data['dataPetambak']);
	}


		public function export() {
			error_reporting(E_ALL);


			 $headers = ['ID', 'ALAMAT', 'NAMAPENDAFTAR', 'IDAGEN', 'NOHP', 'JNSBENUR', 'HARGA', 'KANTONG', 'JMLBENUR', 'JMLKANTONG', 'BIAYA', 'DP', 'TGLDAFTAR', 'TGLSCHEDULE', 'TGLTEBAR', 'TGLBAYAR', 'REGISTER', 'NAMA', 'NAMA_AGEN'];

				$data['dataBenur'] = $this->M_benur->select_all_benur();
				$array = json_decode(json_encode($data['dataBenur']), true);
				
				//print_r($array);
				//die();
				$writer = WriterEntityFactory::createXLSXWriter();
					/**
					 * $fileName adalah nama file excel yang nantinya akan di export
					 */
					$fileName   = "Data Benur.xlsx";
					$writer->openToBrowser($fileName);

					/** Tambahkan beberapa style menggunakan StyleBuilder */
					$border = (new BorderBuilder())
								->setBorderBottom(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
								->setBorderTop(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
								->setBorderLeft(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
								->setBorderRight(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
								->build();

					$styleHeader = (new StyleBuilder())
								->setFontBold()
								->setBackgroundColor(Color::rgb(222, 222, 222))
								->setBorder($border)
								->build();

					$style = (new StyleBuilder())
								->setBorder($border)
								->build();

					$rowFromValues = WriterEntityFactory::createRowFromArray($headers, $styleHeader);
					$writer->addRow($rowFromValues);

					
					foreach($array as $k=>$val)
					{
						$rowFromValues = WriterEntityFactory::createRowFromArray($val, $style);
						$writer->addRow($rowFromValues);
					}


					$writer->close();
		}

}

/* End of file Benur.php */
/* Location: ./application/controllers/Benur.php */