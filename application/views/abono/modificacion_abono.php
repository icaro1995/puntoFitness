
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->

		<div class="col-xs-8">
			<form class="form-horizontal"
				action="<?php foreach ($abono as $fila) echo base_url('abono/modificacion/'.$fila->id)?>"
				method="POST">
				<?php foreach ($abono as $fila){?>
				<center>
					<h3>Modificar un abono</h3>
					<br> <br>
				</center>
				<div class="form-group">
					<label class="control-label col-sm-2" for="duracion">Duración:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name"
							value=<?php echo $fila->duracion?> name="duracion_abono">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="precio">Precio:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="precio"
							value=<?php echo $fila->precio?> name="precio_abono">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="cantDias">Días:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cantDias"
							value=<?php echo $fila->cantidad_dias?> name="cantDias_abono">
					</div>
				</div>
	<?php }?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Modificar</button>
					</div>
				</div>
			</form>

		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



