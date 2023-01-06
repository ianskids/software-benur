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
class Benur extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_benur');
		$this->load->model('M_petambak');

	}

	public function index() {


		$data['userdata'] = $this->userdata;
		$jnsBenur= 	"reg";
		$data['sum'] = $this->M_benur->sum($jnsBenur);

		$data['page'] = "benur";
		$data['judul'] = "Data Benur";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenur";
		$data['jnsBnr'] = $jnsBenur;

		$this->template->views('benur/home', $data);
	}

	public function premium() {


		$data['userdata'] = $this->userdata;
		$jnsBenur= 	"prem";
		$data['sum'] = $this->M_benur->sum($jnsBenur);

		$data['page'] = "premium";
		$data['judul'] = "Data Benur Premium";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenur";
		$data['jnsBnr'] = $jnsBenur;

		$this->template->views('benur/home', $data);
	}

	public function maksimalprima() {


		$data['userdata'] = $this->userdata;
		$jnsBenur = "mp";
		$data['sum'] = $this->M_benur->sum($jnsBenur);

		$data['page'] = "maksimalprima";
		$data['judul'] = "Data Benur Maksimal Prima";
		$data['deskripsi'] = "Manage Data Benur";
		$data['tampilData'] = "tampilBenur";
		$data['jnsBnr'] = $jnsBenur;

		$this->template->views('benur/home', $data);
	}

	public function tampil($jenis= 'reg') {
		$data['dataBenur'] = $this->M_benur->select_all_benur($jenis);
		
		$this->load->view('benur/list_data', $data);
	}

	public function jumlah($jenis= 'reg') {
				
		echo json_encode($this->M_benur->sum($jenis)[0]);
	}


	public function proses_ajax() {
		$alamat = $this->input->get('alamat');
		$data['dataPetambak'] = $this->M_petambak->pilih_alamat($alamat);

		echo json_encode($data['dataPetambak']);
	}


	public function tambah() {
		$data['userdata'] = $this->userdata;
		// $data['dataBenur'] = $this->M_benur->select_all_benur();
		$data['dataPetambak'] = $this->M_petambak->select_all_petambak();
		$data['dataJenisBenur'] = $this->M_benur->select_jenis_benur();
		$data['dataAgen'] = $this->M_benur->select_agen();


		$data['page'] = "benur";
		$data['judul'] = "Data Benur";
		$data['deskripsi'] = "Manage Data Benur";

		//print_r($data['dataAgen']); die();

		echo show_my_modal('modals/benur/modal_tambah_benur', 'tambah-benur', $data, 'lg');
	}

	public function update() {
		$id = trim($_POST['id']);
		$data['userdata'] = $this->userdata;
		$data['dataBenur'] = $this->M_benur->select_by_id($id);
		$data['dataPetambak'] = $this->M_petambak->select_all_petambak();
		$data['dataJenisBenur'] = $this->M_benur->select_jenis_benur();
		$data['dataAgen'] = $this->M_benur->select_agen();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/benur/modal_update_benur', 'update-benur', $data, 'lg');
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('alamat' , 'Alamat', 'trim|required');
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

		if ($this->form_validation->run() == TRUE) {

			$result = $this->M_benur->insert($data);

			if ($result > 0) {
				$out['id'] = $result;
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Benur Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Benur Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('alamat' , 'Alamat', 'trim|required');
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
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_benur->update($data);
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

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_benur->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_kota'] = $value['D'];
							$resultData[$index]['id_kelamin'] = $value['E'];
							$resultData[$index]['id_posisi'] = $value['F'];
							$resultData[$index]['status'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_benur->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Benur Berhasil diimport ke database'));
						redirect('Benur');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Benur Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Benur');
				}

			}
		}
	}
}

/* End of file Benur.php */
/* Location: ./application/controllers/Benur.php */