<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller {
	
	protected $pageData = array();

	public function __construct(){
		parent::__construct();
	}

	public function layout(){
		$this->layout['head_load'] = $this->load->view('layout/head_load', $this->pageData, TRUE);
		$this->layout['foot_load'] = $this->load->view('layout/foot_load', $this->pageData, TRUE);
		$this->layout['header']    = $this->load->view('layout/header', $this->pageData, TRUE);
		$this->layout['sidebar']   = $this->load->view('layout/sidebar', $this->pageData, TRUE);
		$this->layout['footer']    = $this->load->view('layout/footer', $this->pageData, TRUE);
		$this->layout['content']   = $this->load->view($this->page, $this->pageData, TRUE);
		$this->load->view('layout/base_layout', $this->layout);
	}
}