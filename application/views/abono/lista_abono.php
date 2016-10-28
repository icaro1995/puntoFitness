
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">

		<!-- Table -->
		<!-- 			<table class="table"> -->
		<h2>Lista Abonos</h2>
		<table id="tabla" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><center>ID</center></th>
					<th><center>Duración</center></th>
					<th><center>Precio</center></th>
					<th><center>Cantidad de días</center></th>
					
				<?php if($baja || $modificacion){?>
                		
					<th><center>Acción</center></th><?php }?>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th><center>ID</center></th>
					<th><center>Duración</center></th>
					<th><center>Precio</center></th>
					<th><center>Cantidad de días</center></th>
					
					<?php if($baja || $modificacion){?>
                		
					<th><center>Acción</center></th><?php }?>
				</tr>
			</tfoot>
			<tbody>
					<?php
					foreach ( $abonos as $fila ) {?>
					<tr>
					<td><center><?php echo $fila->id;?></center></td>
					<td><center><?php echo $fila->duracion;?></center></td>
					<td><center><?php echo $fila->precio;?></center></td>
					<td><center><?php echo $fila->cantidad_dias;?></center></td>
					
							<?php if($baja){?>
              				<td><center>
							<a href="<?php echo base_url('abono/baja/'.$fila->id)?>"
								method="post">Eliminar</a>
						</center></td>
                 			<?php
						} else 
							if ($modificacion) {
								?>
                 					<td><center>
							<a
								href="<?php echo base_url('abono/modificacion_abono/'.$fila->id)?>"
								method="post">Modificar</a>
						</center></td>
                 				<?php
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
