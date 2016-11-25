<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('parcial/header');
		$this->load->view('vistareporte');
	}
}
