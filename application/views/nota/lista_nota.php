  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      
    </section>

    <!-- Main content -->
    <section class="content">
       
      <!-- Your Page Content Here -->
		<h3>Listado de sus notas de ejercicios</h3><br>
				<table id="tabla" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre del ejercicio</th>
                <th>Descripción</th>
                <th>Repeticiones</th>
                <th>fecha</th>
                <?php if($baja || $modificacion){?>
                <th>Acción</th><?php }?>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>id</th>
                <th>Nombre del ejercicio</th>
                <th>Descripción</th>
                <th>Repeticiones</th>
                <th>fecha</th>
                <?php if($baja || $modificacion){?>
                <th>Acción</th><?php }?>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($notas as $fila){?>
            <tr>
                <td><?php echo $fila->id?></td>
                <td><?php echo $fila->nombreEjercicio?></td>
                <td><?php echo $fila->descripcion?></td>
                <td><?php echo $fila->cantidadRepeticiones?></td>
                <td><?php echo $fila->fecha?></td>
                <?php if($baja){?>
                 <td><a href="<?php echo base_url('nota/baja_nota/'.$fila->id)?>" method="post">Eliminar</a></td>
                 <?php }
                  else{ if($modificacion){?>
                 <td><a href="<?php echo base_url('nota/modificacion_nota/'.$fila->id)?>"method="post">Modificar</a></td>
                 <?php } }?>
            </tr>
            <?php }?>
        </tbody>
    </table>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->