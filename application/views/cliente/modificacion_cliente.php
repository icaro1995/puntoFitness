
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		
		<div class="col-xs-8">
			<form class="form-horizontal" action="<?php foreach ($cliente as $fila)echo base_url('cliente/modificacion/'.$fila->id)?>" method="POST">
				   <center>
					<h3>Actualizar la información del cliente</h3>
					<br>
					<br>
				</center>
				<?php foreach ($cliente as $fila){?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">ID:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="identificador" name="id_clientem"
							value="<?php echo $fila->id?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="nombre_clientem"
						value="<?php echo $fila->nombre?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="last_name">Apellido:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="last_name" name="apellido_clientem"
							value="<?php echo $fila->apellido?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="dni">DNI:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dni" name="dni_clientem"
							value="<?php echo $fila->dni?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">E-mail:</label>
					<div class="col-sm-10">
						<input type="e_mail" class="form-control" id="email" name="email_clientem"
							value="<?php echo $fila->email?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="tel">Teléfono:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tel" name="tel_clientem"
							value="<?php echo $fila->telefono?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tel">Abono:</label>
					<div class="col-sm-10">
						<select name="abono_clientem">
						<?php foreach ($abonos as $ab){?>
						 <option type="select" class="form-control"
						 <?php if($ab->id==$fila->idabono){?>selected<?php }?>><?php echo $ab->id?></option>
						 <?php }
						}?>
						 
						</select>	
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Actualizar</button>
					</div>
				</div>
			</form>
		
		</div>
		
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



