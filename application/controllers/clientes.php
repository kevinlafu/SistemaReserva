<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('clientes_model');
	}
	public function index()
	{
		$data['clientes_lista'] = $this->clientes_model->obtenerDatos();
		$this->load->view('parcial/header');
		$this->load->view('vistacliente',$data);
	}
}
