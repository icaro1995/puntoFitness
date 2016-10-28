
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		
		<div class="col-xs-8">
			<form class="form-horizontal" action="<?php echo base_url('nota/alta')?>" method="POST">
				   <center>
					<h3>Registrar una nota de ejercicios</h3>
					<br>
					<br>
				</center>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="nombre_nota"
							placeholder="Ingrese nombre del ejercicio">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="last_name">Descripción:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="last_name" name="descripcion_nota"
							placeholder="Ingrese una descripción del ejercicio a realizar">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="dni">Repeticiones:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni" name="rep_nota"
							placeholder="Ingrese la cantidad de repeticiones...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Registrar</button>
					</div>
				</div>
			</form>
		
		</div>
		
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



