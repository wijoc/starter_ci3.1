<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Crud_m extends CI_Model {

  /* Declare Table */
  	var $tb = 'tb_crud';
  	var $f  = array(
  		'0' => 'crud_id',
  		'1' => 'crud_field_1',
  		'2' => 'crud_field_2'
  	);

	/** Count All Data */
		function count_all () {
			return $this->db->get($this->tb)->num_rows();
		}

	/* Insert */
	function insertCrud ($data) {
		$resultInsert = $this->db->insert($this->tb, $data);
		return $resultInsert;
	}

	/** Select */
	function getData ($amount = 0, $offset = 0, $keyword = NULL, $order = NULL){
		$this->db->select('*');
		$this->db->from($this->tb);

		if ($keyword && $keyword !== null) {
			$this->db->where($this->f[1], $keyword);
		}

		($order == NULL)? $this->db->order_by($this->f[0], 'ASC') : $this->db->order_by($this->f[$order['order']['0']['coloumn']], $order['order']['0']['dir']);

		($amount > 0)? $this->db->limit($amount, $offset) : '';

		return $this->db->get();
	}

	/** find */
	function findData ($id) {
		$this->db->select('*');
		$this->db->from($this->tb);
		$this->db->where($this->f[0], $id);
		return $this->db->get();
	}

	/** update */
	function updateData ($data, $id) {
		$this->db->set($data);
		$this->db->where($this->f[0], $id);
		return $this->db->update($this->tb);
	}

	/** delete */
	function deleteData ($id) {
		$this->db->where($this->f[0], $id);
		return $this->db->delete($this->tb);
	}
}