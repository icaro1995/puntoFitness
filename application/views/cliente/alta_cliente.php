
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		
		<div class="col-xs-8">
			<form class="form-horizontal" action="<?php echo base_url('cliente/alta')?>" method="POST">
				   <center>
					<h3>Registrar un nuevo cliente</h3>
					<br>
					<br>
				</center>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="nombre_cliente"
							placeholder="Ingrese nombre">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="last_name">Apellido:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="last_name" name="apellido_cliente"
							placeholder="Ingrese apellido">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="dni">DNI:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni" name="dni_cliente"
							placeholder="Ingrese DNI">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">E-mail:</label>
					<div class="col-sm-10">
						<input type="e_mail" class="form-control" id="email" name="email_cliente"
							placeholder="Ingrese su e-mail">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Clave:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="pwd" name="clave_cliente"
							placeholder="Ingrese su clave">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tel">Teléfono:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tel" name="tel_cliente"
							placeholder="Ingrese teléfono">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tel">Abono:</label>
					<div class="col-sm-10">
						<select name="abono_cliente">
						<?php foreach ($abonos as $fila){?>
						 <option type="select" class="form-control"><?php echo $fila->id?></option>
						 <?php }?>
						</select>	
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



