<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_benur_proses extends CI_Model {

	public function select_all_benur($jenis, $data){
		$this->db->select('benur.*, agen.nama AS nama_agen');
		$this->db->from('benur');
		$this->db->join('petambak','benur.alamat = petambak.alamat','LEFT');      
		$this->db->join('agen','benur.idAgen = agen.id','LEFT');
		$this->db->where('status', $data);
		$this->db->where('jnsBenur', $jenis);
		$this->db->order_by('benur.tglDaftar', 'DESC');
		$data = $this->db->get();
	//	print_r($this->db->last_query());
		return $data->result();
		
	}

	public function sum($jenis, $data){
		$this->db->select_sum('jmlBenur');
		$this->db->where('status', $data);
		$this->db->where('jnsBenur', $jenis);
		$data = $this->db->get('benur');
		return $data->result_array();
		
	}
	public function proses($data) {

		$data = array(
				'id'=> $data['id'],
		        'alamat' 	=> $data['alamat'],
		        'namaPendaftar'=> $data['namaPendaftar'],
		        'idAgen'=> $data['idAgen'],
		        'noHp'=> $data['noHp'],
		        'jnsBenur'=> $data['jnsBenur'],
		        'harga'=> only_numbers($data['harga']),
		        'kantong'=> only_numbers($data['kantong']),
		        'jmlBenur'=> only_numbers($data['jmlBenur']),
		        'jmlKantong'=> only_numbers($data['jmlKantong']),
		        'tglSchedule'=> date("Y-m-d", strtotime($data['tglSchedule'])),
		        'biaya'=> only_numbers($data['biaya']),
		        'dp' => only_numbers($data['dp']),
		        'status'=> 'proses',
		);

		$this->db->where('id', $data['id']);
		$this->db->update('benur', $data);
		//print_r($this->db->last_query());
		return $this->db->affected_rows();
		
	}

	public function prosesbyid($data) {
		
		$data = array(
				'id'=> $data,
				'status'=> 'proses',
		);

		$this->db->where('id', $data['id']);
		$this->db->update('benur', $data);
		//print_r($this->db->last_query());
		return $this->db->affected_rows();
		
	}

	public function prosesinsertkode($data) {

		foreach ($data['id'] as $id) {
			$datas = array(
				'kode' 	=> $data['kode'],
			);
			$this->db->update('benur', $datas, array('id' => $id));
			// print_r($this->db->last_query());
			$hasil[] = $this->db->affected_rows();
		}

		return $hasil;
		
	}
}



/* End of file M_benur.php */
/* Location: ./application/models/M_benur.php */