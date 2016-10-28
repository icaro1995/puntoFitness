  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      
    </section>

    <!-- Main content -->
    <section class="content">
       
      <!-- Your Page Content Here -->
		<h3>Listado de los clientes del gimnasio</h3><br>
				<table id="tabla" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Abono</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Contraseña</th>
                <th>Fecha de inscripción</th>
                <?php if($baja || $modificacion){?>
                <th>Acción</th><?php }?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Abono</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Contraseña</th>
                <th>Fecha de inscripción</th>
                <?php if($baja || $modificacion){?>
                <th>Acción</th><?php }?>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($clientes as $fila){?>
            <tr>
                <td><?php echo $fila->id_cliente?></td>
                <td><?php echo $fila->nombre?></td>
                <td><?php echo $fila->apellido?></td>
                <td><?php echo $fila->dni?></td>
                <td><?php echo $fila->idabono?></td>
                <td><?php echo $fila->email?></td>
                <td><?php echo $fila->telefono?></td>
                <td><?php echo $fila->password?></td>
                <td><?php echo $fila->fecha_inscripcion?></td>
                <?php if($baja){?>
                 <td><a href="<?php echo base_url('cliente/baja_cliente/'.$fila->dni)?>" method="post">Eliminar</a></td>
                 <?php }
                  else{ if($modificacion){?>
                 <td><a href="<?php echo base_url('cliente/modificacion_cliente/'.$fila->dni)?>"method="post">Modificar</a></td>
                 <?php } }?>
            </tr>
            <?php }?>
        </tbody>
    </table>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->