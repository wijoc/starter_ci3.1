<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

class Crud_c extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Crud_m'); // Load Model Crud_m
	}

	/** Non Ajax */
	// public function index(){
	//   /* Data yang akan dikirim ke view */
	// 	$this->pageData = array(
	// 		'title'  => 'Starter | CRUD',
	// 		'assets' => array()
	// 	);

  //     /* View file */
  //       $this->page = "crud/index_crud_v";

  //     /* Call function layout dari MY_Controller Class */
  //       $this->layout();
	// }

  // /* Function : Halaman Form Insert */
	// public function createPage(){
	// 	$this->pageData = array(
	// 		'title'  => 'CRUD | Create',
	// 		'assets' => array()
	// 	);
	// 	$this->page = 'crud/create_crud_v';
	// 	$this->layout();
	// }

  // /* Function : Proses Insert dari form ke Database */
	// function createProses(){
	//   /* Ambil value post dari form */
	//   	$postData = array(
	//   		'crud_field_1' => $this->input->post('postField1'),
	//   		'crud_field_2' => $this->input->post('postField2')
	//   	);

	//   /* Pas array post ke model */
	//   	$inputData = $this->Crud_m->insertCrud($postData);

	//   /* return & redirect */
	// 	/* Set session untuk alert */
	//    	if($inputData > 0){
	//    		$this->session->set_flashdata('flashStatus', 'sucessInsert');
	//    		$this->session->set_flashdata('flashMsg', 'Pesan success');
	//    	} else {
	//    		$this->session->set_flashdata('flashStatus', 'failedInsert');
	//    		$this->session->set_flashdata('flashMsg', 'Pesan failed');
	//    	}

	//    	/* Redirect */
	//    	redirect('Crud_c/createPage');
	// }

	/** Using Ajax */
	public function index () {
	  /* Data yang akan dikirim ke view */
		$this->pageData = array(
			'title'  => 'Starter | CRUD',
			'assets' => array()
		);

		/* View file */
			$this->page = "crud/index_crud_v";

		/* Call function layout dari MY_Controller Class */
			$this->layout();
	}

  /* Function : Halaman Form Insert */
	public function createPage () {
		$this->pageData = array(
			'title'  => 'CRUD | Create',
			'assets' 	=> array('sweetalert2', 'crud', 'store'),
		);
		$this->page = 'crud/create_crud_v';
		$this->layout();
	}

	public function showPage ($id) {
		$this->pageData = array(
			'title'  => 'CRUD | Create',
			'assets' 	=> array('sweetalert2', 'crud', 'update'),
			'data' => $this->Crud_m->findData($id)->result_array(),
			'id' => $id
		);
		$this->page = 'crud/create_crud_v';
		$this->layout();
	}

	/** Function : Halaman Show Data */
	function listPage () {
		$this->pageData = array(
			'title'  => 'CRUD | Read',
			'assets' 	=> array('datatables', 'sweetalert2', 'list_crud'),
		);
		$this->page = 'crud/list_crud_v';
		$this->layout();
	}

  /* Function : Proses Insert dari form ke Database */
	function store () {
		/** Load Library form_validation */
		$this->load->library("form_validation");

		/** Set rules form validation */
			$configValidation = array(
					array(
							'field'     => 'postField1',
							'label'     => 'Field 1',
							'rules'     => 'trim|required',
							'errors'    => array(
								'required' => 'Field 1 is required'
							)
					),
					array(
							'field'     => 'postField2',
							'label'     => 'Field 2',
							'rules'     => 'trim|required|in_list[opt1,opt2,opt3,opt4,opt5]',
							'errors'    => array(
									'required' => 'Field 2 is required'
							)
					),
			);
			$this->form_validation->set_rules($configValidation);

			// $validate = $this->form_validation->run();

	  /* Ambil value post dari form */
	  	$postData = array(
	  		'crud_field_1' => $this->input->post('postField1'),
	  		'crud_field_2' => $this->input->post('postField2')
	  	);

			if ($this->form_validation->run()) {
				/* Pas array post ke model */
				$inputData = $this->Crud_m->insertCrud($postData);

				/* Set session untuk alert */
					if($inputData > 0){
						$responseValue = array(
							'error'	=> FALSE,
							'status'	=> 'successInsert',
							'statusIcon' => 'success',
							'statusMsg'	 => 'Success add new data!',
						);
					} else {
						$responseValue = array(
							'error'	=> FALSE,
							'status'	=> 'failedInsert',
							'statusIcon' => 'failed',
							'statusMsg'	 => 'Failed add new data!',
						);
					}
			} else {
				$responseValue = array(
					'error'	=> TRUE,
					'status'	=> 'invalid',
					'statusIcon' => 'failed',
					'statusMsg'	 => 'Given data is invalid!',
					'test' => array(
						'postField1' => $this->input->post('postField1'),
						'postField2' => $this->input->post('postField2')
					),
					'errors' => [
						'errorField1' => strip_tags(form_error('postField1')),
						'errorField2' => strip_tags(form_error('postField2'))
					]
				);
			}

			/* Response */
			header('Content-Type: application/json');
			echo json_encode($responseValue);
	}

	/** function : List Data */
	function list () {
    $rowData	= array();
		$no			= $this->input->post('start');
        foreach($this->Crud_m->getData($this->input->post('length'), $this->input->post('start'), $this->input->post('search'), $this->input->post('order'))->result_array() as $showData){
            $row   = array();
            $no++;

            $row[] = $no;
            $row[] = $showData['crud_field_1'];
            $row[] = $showData['crud_field_2'];
            $row[] = '<a class="btn btn-xs btn-warning" href="'.site_url('Crud_c/showPage/').$showData['crud_id'].'"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-xs btn-danger" onclick="deleteRow(\''.$showData['crud_id'].'\')"><i class="fas fa-trash"></i></a>';

            $rowData[] = $row;
        }

		$output = array(
			'draw'			  => $this->input->post('draw'),
			'recordsTotal'	  => $this->Crud_m->count_all(),
			'recordsFiltered' => $this->Crud_m->getData($this->input->post('length'), $this->input->post('start'))->num_rows(),
			'data'			  => $rowData
		);

		header('Content-Type: application/json');
		echo json_encode($output);
	}

	/** Function Update */
	function update ($id = null) {
		if (!$id) {
			$responseValue = [
				'error'	=> TRUE,
				'status'	=> 'invalid',
				'statusIcon' => 'warning',
				'statusMsg'	 => 'Please Provide an ID',
			];
		} else {
			$data = $this->Crud_m->findData($id);
			if ($data) {
				/** Load Library form_validation */
					$this->load->library("form_validation");

				/** Set rules form validation */
					$configValidation = array(
							array(
									'field'     => 'postField1',
									'label'     => 'Field 1',
									'rules'     => 'trim|required',
									'errors'    => array(
										'required' => 'Field 1 is required'
									)
							),
							array(
									'field'     => 'postField2',
									'label'     => 'Field 2',
									'rules'     => 'trim|required|in_list[opt1,opt2,opt3,opt4,opt5]',
									'errors'    => array(
											'required' => 'Field 2 is required'
									)
							),
					);
					$this->form_validation->set_rules($configValidation);

	  	$postData = array(
	  		'crud_field_1' => $this->input->post('postField1'),
	  		'crud_field_2' => $this->input->post('postField2')
	  	);

			if ($this->form_validation->run()) {
				/* Pas array post ke model */
				$updateData = $this->Crud_m->updateData($postData, $id);

				/* Set session untuk alert */
					if($updateData > 0){
						$responseValue = array(
							'error'	=> FALSE,
							'status'	=> 'successUpdate',
							'statusIcon' => 'success',
							'statusMsg'	 => 'Success update data!',
						);
					} else {
						$responseValue = array(
							'error'	=> FALSE,
							'status'	=> 'failedUpdate',
							'statusIcon' => 'failed',
							'statusMsg'	 => 'Failed update data!',
						);
					}
			} else {
				$responseValue = array(
					'error'	=> TRUE,
					'status'	=> 'invalid',
					'statusIcon' => 'failed',
					'statusMsg'	 => 'Given data is invalid!',
					'errors' => [
						'errorField1' => strip_tags(form_error('postField1')),
						'errorField2' => strip_tags(form_error('postField2'))
					]
				);
			}
			} else {
				$responseValue = [
					'error'	=> True,
					'status'	=> 'invalid',
					'statusIcon' => 'error',
					'statusMsg'	 => 'Data not found',
				];
			}
		}

		header('Content-Type: application/json');
		echo json_encode($responseValue);
	}

	/** Function : Delete Data */
	function delete ($id = null) {
		if (!$id) {
			$responseValue = [
				'error'	=> TRUE,
				'status'	=> 'invalid',
				'statusIcon' => 'warning',
				'statusMsg'	 => 'Please Provide an ID',
			];
		} else {
			$data = $this->Crud_m->findData($id);
			if ($data) {
				$delete = $this->Crud_m->deleteData($id);

				if ($delete) {
					$responseValue = [
						'error'	=> False,
						'status'	=> 'deleted',
						'statusIcon' => 'success',
						'statusMsg'	 => 'Data Deleted',
					];
				} else {
					$responseValue = [
						'error'	=> False,
						'status'	=> 'deleted',
						'statusIcon' => 'error',
						'statusMsg'	 => 'Failed to delete data! Please contact server',
					];
				}
			} else {
				$responseValue = [
					'error'	=> True,
					'status'	=> 'invalid',
					'statusIcon' => 'error',
					'statusMsg'	 => 'Data not found',
				];
			}
		}

		header('Content-Type: application/json');
		echo json_encode($responseValue);
	}
}