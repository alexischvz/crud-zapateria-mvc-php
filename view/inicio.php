<!DOCTYPE html>
<html lang="es">

<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/icon/icon.css">
	<link rel="stylesheet" type="text/css" href="resources/css/alertify.css">
</head>

<body>

	<header>

		<div class="jumbotron bg-info rounded-0 d-flex flex-wrap justify-content-center">
			
			<h1 class="text-center text-light display-4 w-100">Inventario</h1>
			<a href="?c=registro" class="btn btn-outline-light btn-sm pl-3 pr-3 mt-2">Nuevo Registro</a>

		</div>
		
	</header>

	<section>

		<div class="container">

			<table class="table table-hover table-bordered table-sm text-center">

				<thead class="thead-dark">
					<tr>
						<th>Id</th>
						<th>Marca</th>
						<th>Tipo</th>
						<th>Clase</th>
						<th>Talla</th>
						<th>Descripcion</th>
						<th></th>
					</tr>
				</thead>

				<?php foreach ($this->modelo->readRegistro() as $r) { ?>

					<tbody>
						<tr>
							<td><?= $r->id_registro ?></td>
							<td><?= $r->marca ?></td>
							<td><?= $r->tipo ?></td>
							<td><?= $r->clase ?></td>
							<td><?= $r->talla ?></td>
							<td><?= $r->descripcion ?></td>
							<td>
								<a href="#" onclick="del(<?= $r->id_registro ?>);" class="btn btn-danger btn-sm icon-bin"></a>
								<a href="?c=modificar&id_registro=<?= $r->id_registro ?>" class="btn btn-success btn-sm icon-pencil"></a>
							</td>
						</tr>
					</tbody>
						
				<?php } ?>
					
			</table>
				
		</div>
		
	</section>

	<footer>
		
	</footer>

	<script type="text/javascript" src="resources/js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="resources/js/alertify.js"></script>
	<script>
		
		function del(id_r){
			alertify.confirm('Eliminar Registro', 'Está seguro de eliminar el registro?', function(){ 
				window.location = "?c=delete&id_registro=" + id_r;
			}, 
			function(){ 
				alertify.error('Cancelado')
			});
		}

	</script>

</body>

</html>