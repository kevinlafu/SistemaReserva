<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!--QUITAR AL LANZAR DEFINITIVO EL SISTEMA
	<meta http-equiv="refresh" content="3">-->
	<title>Calendario</title>
	<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/app.css" rel="stylesheet" type="text/css">
	<link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/botonera.js"></script>
</head>
<style type="text/css">
	* {
	  padding: 0;
	  margin: 0;
	}
	p {
	  margin-bottom: 20px;
	}
	.wrapper {
	  width: 80%;
	  /*margin: auto;*/
	  overflow:hidden;
	}
	header {
	  background: rgba(0,0,0,0.9);
	  width: 100%;
	  position: fixed;
	  z-index: 10;
	}
	.body{
		padding-top: 80px;
	}
	nav {
	  float: left; /* Desplazamos el nav hacia la izquierda */
	}
	nav ul {
	  list-style: none;
	  overflow: hidden; /* Limpiamos errores de float */
	}
	nav ul li {
	  float: left;
	  font-family: Arial, sans-serif;
	  font-size: 16px;
	}
	nav ul li a {
	  display: block; /* Convertimos los elementos a en elementos bloque para manipular el padding */
	  padding: 20px;
	  color: #fff;
	  text-decoration: none;
	}
	nav ul li:hover {
	  background: #3ead47;
	}
	.contenido {
	  padding-top: 80px;
	}
		
</style>
<header>
  <section class="wrapper">
        <nav>
            <ul>
                <li><a href="<?php echo base_url();?>">Inicio</a></li>
                <li><a href="<?php echo site_url("clientes");?>">Clientes</a></li>
                <li><a href="<?php echo site_url("combos");?>">Combos</a></li>
                <li><a href="<?php echo site_url("reportes");?>">Reportes</a></li>
                <!--<li><a href="#">Contacto</a></li>-->
            </ul>
    </nav>
    </section>
</header>
