
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Table -->
		<!-- 			<table class="table"> -->
		<h2>Lista Profesores</h2>
		<table id="tabla" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><center>ID</center></th>
					<th><center>Nombre</center></th>
					<th><center>Apellido</center></th>
					<th><center>DNI</center></th>
					<th><center>E Mail</center></th>
					<th><center>Telefono</center></th>
					<?php if($baja || $modificacion){?>
                		
					<th><center>Acción</center></th><?php }?>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th><center>ID</center></th>
					<th><center>Nombre</center></th>
					<th><center>Apellido</center></th>
					<th><center>DNI</center></th>
					<th><center>E Mail</center></th>
					<th><center>Telefono</center></th>
					<?php if($baja || $modificacion){?>
                		
					<th><center>Acción</center></th><?php }?>
				</tr>
			</tfoot>
			<tbody>
					<?php
					foreach ( $profesores as $fila ) {?>
					<tr>
					<td><center><?php echo $fila->id_profesor;?></center></td>
					<td><center><?php echo $fila->nombre;?></center></td>
					<td><center><?php echo $fila->apellido;?></center></td>
					<td><center><?php echo $fila->dni;?></center></td>
					<td><center><?php echo $fila->email;?></center></td>
					<td><center><?php echo $fila->telefono;?></center></td>
					
							<?php if($baja){?>
              				<td><center>
							<a href="<?php echo base_url('profesor/baja/'.$fila->id)?>"
								method="post">Eliminar</a>
						</center></td>
                 			<?php
						} else {
							if ($modificacion) {
								?>
                 					<td><center>
							<a
								href="<?php echo base_url('profesor/modificacion_profesor/'.$fila->id)?>"
								method="post">Modificar</a>
						</center></td>
                 				<?php
							}
						}
						?>
            			</tr>
         	   <?php }?>
					
					
				</tbody>
		</table>
	</section>
</div>


<!-- /.content -->
</div>
<!-- /.content-wrapper -->
