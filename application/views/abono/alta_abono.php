
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->

		<div class="col-xs-8">
			<form class="form-horizontal"
				action="<?php echo base_url('abono/alta')?>" method="POST">
				<center>
					<h3>Registrar un nuevo abono</h3>
					<br> <br>
				</center>
				<div class="form-group">
					<label class="control-label col-sm-2" for="duracion">Duración:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="duracion"
							name="duracion_abono" placeholder="Ingrese duración">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="precio">Precio:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="precio"
							name="precio_abono" placeholder="Ingrese precio">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="cantDias">Días:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cantDias"
							name="cantDias_abono" placeholder="Ingrese cantidad de días">
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



