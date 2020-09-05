<!DOCTYPE html>
<html lang="es">

<head>
	<title>Modificar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
</head>

<body>

	<header>

		<div class="jumbotron bg-success rounded-0 d-flex flex-wrap justify-content-center">
			
			<h1 class="text-center text-light display-4 w-100">Actualizar Registro</h1>
			<a href="?c=index" class="btn btn-outline-light btn-sm pl-3 pr-3 mt-2">Ver Inventario</a>

		</div>
		
	</header>

	<section>

		<div class="container">

			<form action="?c=update" method="post">
				<input type="hidden" name="id_registro" value="<?= $fila->id_registro ?>">
				<div class="row">
					<div class="form-group col-4">

						<label>Marca</label>
						<select class="custom-select custom-select-sm" name="marca">

							<?php 
							foreach ($this->modelo->readMarca() as $rm) { ?>

								<option value="<?= $rm->id_marca ?>"
									<?= $rm->id_marca == $fila->id_marca ? 'selected' : '' ?> >
									<?= $rm->marca ?>
								</option>
							 	
							<?php } ?>
							
						</select>
						
					</div>

					<div class="form-group col-4">

						<label>Tipo</label>
						<select class="custom-select custom-select-sm" name="tipo">

							<?php 
							foreach ($this->modelo->readTipo() as $rt) { ?>

								<option value="<?= $rt->id_tipo ?>" 
									<?= $rt->id_tipo == $fila->id_tipo ? 'selected' : '' ?> >

									<?= $rt->tipo ?>
									
								</option>
							 	
							<?php } ?>
							
						</select>
						
					</div>

					<div class="form-group col-4">

						<label>Clase</label>
						<select class="custom-select custom-select-sm" name="clase">

							<?php 
							foreach ($this->modelo->readClase() as $rc) { ?>

								<option value="<?= $rc->id_clase ?>" 
									<?= $rc->id_clase == $fila->id_clase ? 'selected' : '' ?> >

									<?= $rc->clase ?>
									
								</option>
							 	
							<?php } ?>
							
						</select>
						
					</div>
				</div>

				<div class="row">

					<div class="form-group col-4">

						<label>Talla</label>
						<input type="text" name="talla" value="<?= $fila->talla ?>" class="form-control form-control-sm">
							
					</div>

					<div class="form-group col-8">

						<label>Descripcion</label>
						<input type="text" name="descripcion" value="<?= $fila->descripcion ?>" class="form-control form-control-sm">
							
					</div>
					
				</div>

				<div class="row d-flex justify-content-center">

					<div class="btn-group">

						<input type="submit" class="btn btn-success btn-sm" value="Actualizar Registro">
						<a href="?c=index" class="btn btn-danger btn-sm ">Cancelar</a>
						
					</div>
					
				</div>
			</form>
			
		</div>
		
	</section>

	<footer>
		
	</footer>

</body>

</html>