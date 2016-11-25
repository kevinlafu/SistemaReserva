<body>
<section class="body">
<p>Esta es la seccion de clientes</p>
	<div class="container">
		<div class="row">
			<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Telefono</th>
						</tr>
					</thead>
					<tbody>
			<?php
				foreach ($clientes_lista->result_array() as $clientes) {
				echo '
							<tr>	
								<td>'.$clientes['nombre'].'</td>
								<td>'.$clientes['tel'].'</td>
							</tr>
					</ul>';
					//
				}?>
					</tbody>
			</table>
		</div>
	</div>
</section>
</body>
</html>