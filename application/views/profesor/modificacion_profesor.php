
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->

		<div class="col-xs-8">
			<form class="form-horizontal"
				action="<?php foreach ($profesor as $fila) echo base_url('profesor/modificacion/'.$fila->id)?>"
				method="POST">
				<?php foreach ($profesor as $fila){?>
				<center>
					<h3>Modificar un profesor</h3>
					<br> <br>
				</center>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name"
							value=<?php echo $fila->nombre?> name="nombre_profesorm">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="last_name">Apellido:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="last_name"
							value=<?php echo $fila->apellido?> name="apellido_profesorm">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="dni">DNI:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni"
							value=<?php echo $fila->dni?> name="dni_profesorm" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">E-mail:</label>
					<div class="col-sm-10">
						<input type="e_mail" class="form-control" id="email"
							value=<?php echo $fila->email?> name="email_profesorm"
							placeholder="Ingrese su e-mail">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tel">Teléfono:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tel"
							value=<?php echo $fila->telefono?> name="tel_profesorm"
							placeholder="Ingrese teléfono">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tel">Titulos:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="titu"
							value=<?php echo $fila->titulo?> name="titulo_profesorm"
							placeholder="Ingrese teléfono">
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



