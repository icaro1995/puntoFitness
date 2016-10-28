
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		
		<div class="col-xs-8">
			<form class="form-horizontal" action="<?php foreach($nota as $fila) echo base_url('nota/modificacion/'.$fila->id)?>"
			 method="POST">
				   <center>
					<h3>Modificar la nota de ejercicios</h3>
					<br>
					<br>
				</center>
				<?php foreach ($nota as $fila){?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Id:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="id_nota"
							value="<?php echo $fila->id ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Fecha:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="fecha_nota"
							value="<?php echo $fila->fecha?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="nombre_nota"
							value="<?php echo $fila->nombreEjercicio?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="last_name">Descripción:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="last_name" name="descripcion_nota"
							value="<?php echo $fila->descripcion?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="dni">Repeticiones:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni" name="rep_nota"
							value="<?php echo $fila->cantidadRepeticiones?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Modificar</button>
					</div>
				</div>
			</form>
		
		</div>
		<?php }?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



