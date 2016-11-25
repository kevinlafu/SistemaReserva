<body>

<div class="calendar">

<?php

	/*$mysqli = new mysqli('localhost', 'admin', 'admin', 'sysreserva');

	if ( $mysqli->connect_errno )
	{
		die( $mysqli->mysqli_connect_error() );
	}
	
	$movimiento= 0;
	echo '
  		<form method="GET" action="?aumentar" class="botones">
  			<input type="hidden" class="btn" name="count">
  		</form>';
  		//<button type="button" class="btn" id="disminuir">Anterior</button>
  		//<button type="button" class="btn"  id="aumentar">Siguiente</button>
  	echo '<input type="hidden" name="count" id="count" value="0" />';
  	echo '<a id="disminuir" class="btn">Anterior</a>';
  	echo ' ';
  	echo '<a id="aumentar" class="btn">Siguiente</a>';*/
  	/*echo '<script>
		var capnum = 0;
		function add(){
     		capnum++;
     		document.getElementById("count").value = capnum;
		}
	</script>
	<form action="'. $_SERVER['PHP_SELF'] .'" method="post">
		<button onclick="add()">Add</button>
		<input type="hidden" name="count" id="count" value="0" />
		<input type="submit" />
	</form>';*/
	$bandera= true;
	$var_php;
		echo "<script language='javascript'>
			var cantidad;
			document.getElementById('var_php');
		     </script> ";
		     //cantidad = prompt('Introduce cantidad',1);
		//Ya tenemos capturada la variable con javascript
	?>	
		<form action=?bandera method="POST" name="enviar">
		              <input type="text" name="var_php" value= "0">
		              <input type="submit" name="submit"></form>
	<?php	 
		 if($bandera = 0){ //action="<?php echo $_SERVER['PHP_SELF']; ?>"
	?>
		 	<script language='javascript'>
		              document.enviar.var_php.value=cantidad;
		              document.enviar.submit();
		</script>
	<?php
		$bandera=false;
	}
	$movimiento = "0";
	$var_php = "0";
	if (isset($_POST['var_php']))	{
		$var_php = $_POST ['var_php'];//"<script> document.write(cantidad); </script>";
	}

	echo gettype($var_php);
	echo $var_php;
	$movimiento =$var_php;
	echo gettype($movimiento).' ';

	  	if(isset($_GET['count']))	{
	  		$movimiento= 1;
	  		//$movimiento = (int) $_REQUEST['movim'];
	  	}
	echo ' '.$movimiento;

    //aca empieza lo del form ?actionevent
	if(isset($_GET['add-event']))
	{
		$error = true;

		if(!isset($_POST['start_hour']) || empty($_POST['start_hour']))
			$errors[] = 'hora de inicio necesaria';

		if(!isset($_POST['end_hour']) || empty($_POST['end_hour']))
			$errors[] = 'hora de finalizacion necesaria';

		$start_hour = explode(':', isset($_POST['start_hour']) ? $_POST['start_hour'] : '');
		$end_hour = explode(':', isset($_POST['end_hour']) ? $_POST['end_hour'] : '');

		if(!preg_match('~^([1-2][0-3]|[01]?[1-9]):([0-5]?[0-9]):([0-5]?[0-9])$~', $_POST['start_hour']))
		{
			$errors[] = 'hora de inicio incorrecta';
		}

		if(!preg_match('~^([1-2][0-3]|[01]?[1-9]):([0-5]?[0-9]):([0-5]?[0-9])$~', $_POST['end_hour']))
		{
			$errors[] = 'hora de finalizacion incorrecta';
		}

		$month = (int) $_POST['month'];
		$day = (int) $_POST['day'];

		$start_datetime = new DateTime();
		$end_datetime = new DateTime();

		$start_datetime->setDate(date('Y'), $month, $day);
		$end_datetime->setDate(date('Y'), $month, $day);

		$start_datetime->setTime(
			$start_hour[0],
			$start_hour[1],
			$start_hour[2]
		);

		$end_datetime->setTime(
			$end_hour[0],
			$end_hour[1],
			$end_hour[2]
		);

		if($end_datetime < $start_datetime)
			$errors[] = 'la hora de finalizacion debe ser superar a la de inicio';

		$description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');

		if( empty($description) || trim($description) == '' )
			$errors[] = 'descripcion invalida';

		$pAct = $_POST['pago'];
		echo $pAct;

		if( empty($pAct) || trim($description) == '' )
			$errors[] = 'falta pago';

		$pTot = $_POST['combo'];
		echo $pTot;

		if( empty($pAct) || trim($description) == '' )
			$errors[] = 'falta combo';

		//si hasta aca no hubo errores continua con la grabacion en la base de datos.

		if( !empty($errors) )
		{
			die(implode('<br>', $errors) . '
				</body></html>');
		}
		else
		{
			$formated_startdate = $start_datetime->format('Y-m-d G:i:s');
			$formated_enddate = $end_datetime->format('Y-m-d G:i:s');
			$team_code = 1;

			$data = array(
				'des'=>$description,
				'inicio'=>$formated_startdate,
				'fin'=>$formated_enddate,
				'pAct' => (float) $pAct,
				'pTot' => (float) $pTot, 
				'equipo'=>$team_code
			);
			$this->events_model->crearEvento($data);

			/*if($stmt = $mysqli->prepare("
				INSERT INTO calendar_events
				(descripcion, fecha_inicio, fecha_fin, cod_equipo) 
				VALUES (?, ?, ?, ?)"))
			{
				$stmt->bind_param('sssi', 
					$description,
					$formated_startdate,
					$formated_enddate,
					$team_code
				);

				$stmt->execute();

				header('location: index.php');
			}
			else
			{
				die($mysqli->error . '
					</body></html>');
			}*/
		}
	}

	$result = $this->events_model->obtenerDatos(); //$mysqli->query('SELECT * FROM calendar_events');

	/*if( !$result )
		die( $mysqli->error );*/

	$events = array();

	/*while*/foreach($result->result_array() as $row)//$row = $result->fetch_assoc())
	{
		$start_date = new DateTime($row['fecha_inicio']);
		$end_date = new DateTime($row['fecha_fin']);
		$day = $start_date->format('j');
		$month = $start_date->format('n');

		$events[$month][] = array(
			'id' => $row['id'],
			'day' => $day,
			'start_hour' => $start_date->format('G:i a'),
			'end_hour' => $end_date->format('G:i a'),
			'preAct' => $row['precio_actual'],
			'preTot' => $row['precio_total'],
			'team_code' => $row['cod_equipo'],
			'description' => $row['descripcion']
		);
	}
	
	$datetime = new DateTime();

	// mes en texto
	$txt_months = array(
		'Enero', 'Febrero', 'Marzo',
		'Abril', 'Mayo', 'Junio',
		'Julio', 'Agosto', 'septiembre',
		'Octubre', 'Noviembre', 'Diciembre'
	);

	// month number
	$month_number = $datetime->format('n')+ intval($movimiento);
	//echo gettype($month_number).' ';

	// nombre del mes
	$month_txt = ucwords($txt_months[$datetime->format('n')-1+ intval($movimiento)]);
	//echo gettype($month_txt).' ';

	// ultimo dia del mes
	$month_days = date('j', strtotime("last day of"))+ intval($movimiento);
	//echo gettype($month_days);

	echo '<h1>' . $month_txt . '</h1>';

	



	foreach(range(1, $month_days) as $day)
	{
		$marked = false;
		$markedType = false;
		$events_list = array();

		// si existe el mes en los eventos...
		if(array_key_exists($month_number, $events))
		{
			// recorremos los eventos del mes $events[numero de mes]
			foreach($events[$month_number] as $key => $event)
			{
				// si el dia del evento coincide lo marcamos y guardamos la informacion
				if($event['day'] == $day)
				{
					$marked = true;
					$events_list[] = $event;
					if($event['preAct'] == $event['preTot']){
						$markedType = true;
					}
					break;
				}
			}
		}

		echo '
		<div class="day' . ($marked ? ' marked' : '') . ($markedType ? ' pagado' : '') . '">
			<strong class="day-number">' . $day . '</strong>';

			if( !empty($events_list) )
			{
				echo '<div class="events"><ul>';
					
					foreach($events_list as $event)
					{
						echo '<li>
							<h5>' . $event['description'] . '</h5>
							<div>
								<strong>Inicio:</strong>
								<span>' . $event['start_hour'] . '</span>
							</div>
							
							<div>
								<strong>Fin:</strong>
								<span>' . $event['end_hour'] . '</span>
							</div>

							<div>
								<strong>Deuda:</strong>
								<span>' . "Faltan: $". ($event['preTot']-$event['preAct']) . '</span>
							</div>
						</li>';
					}

				echo '</ul></div>';
			}
			else
			{
				echo '<a data-month="' . $month_number . '" data-day="' . $day . '" class="add-event" href="#"></a>';
			}

		echo '</div>';
	}
	?>
</div>
<div class="add-event-form">
	<div class="wrapper">
		<form method="POST" action="?add-event">
		<? //aca se carga el formulario que se cargara con el evento .modal('show') ?>
		</form>
	</div>
</div>

<? //aca empieza el formulario que se cargara con el evento .modal('show') ?>
<div class="modal fade" id="add-event">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" action="?add-event">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar evento</h4>
      </div>
      <div class="modal-body">
			<div>
				<label>Descripcion</label>
				<input type="text" name="description">
			</div>
			<div>
				<label>Pago</label>
				<input type="text" name="pago" value="0">
			</div>
			<div>
				<label>Combo</label>
				<input type="text" name="combo" value="3200">
			</div>
			<div>
				<label>Hora de inicio</label>
				<input type="text" name="start_hour" value="08:00:00">
			</div>
			<div>
				<label>Hora de finalizacion</label>
				<input type="text" name="end_hour" value="23:00:00">
			</div>
			<div>
				<input type="hidden" name="month">
				<input type="hidden" name="day">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar evento</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>