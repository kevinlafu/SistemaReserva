<?php
	class Clientes_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function crearEvento($data){
			$this->db->insert('cliente',array('nombre' => $data['nom'], 'tel' =>$data['tel']));
		}
		function obtenerDatos(){
			/*$query = $this->db->get('calendar_events');
			if($query->num_rows > 0) return $query;
			else return false;*/
			$query= $this->db->query("SELECT * FROM cliente");
			return $query;
		}
	}
?>