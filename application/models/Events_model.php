<?php
	class Events_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function crearEvento($data){
			$this->db->insert('calendar_events',array('descripcion' => $data['des'], 'fecha_inicio' =>$data['inicio'] , 'fecha_fin' =>$data ['fin'], 'precio_actual'=> $data['pAct'], 'precio_total'=> $data['pTot'], 'cod_equipo'=> $data['equipo']));
		}
		function obtenerDatos(){
			/*$query = $this->db->get('calendar_events');
			if($query->num_rows > 0) return $query;
			else return false;*/
			$query= $this->db->query("SELECT * FROM calendar_events");
			return $query;
		}
	}
?>