<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gimnasio Punto Fitness</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/dataTables.bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/AdminLTE.min.css')?>">
  
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/skins_adminlte/skin-blue.min.css')?>">
  
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/jquery-ui.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/jquery-ui.theme.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('recursos/css/jquery.dataTables.min.css')?>">
   <link rel="stylesheet" href="<?php echo base_url('recursos/plugins/jquery-jvectormap-1.2.2.css')?>">
  <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.1.1 -->
<script src="<?php echo base_url('recursos/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('recursos/js/bootstrap.min.js')?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('recursos/js/app.min.js')?>"></script>

<script src="<?php echo base_url('recursos/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('recursos/js/jquery.dataTables.min.js')?>"></script>

 
<style>
.container{

width:200px;
}

</style>
 <script>
 $(document).ready(function() {
	    var table = $('#tabla').DataTable();
	 
	    $('#tabla tbody').on( 'click', 'tr', function () {
	        if ( $(this).hasClass('selected') ) {
	            $(this).removeClass('selected');
	        }
	        else {
	            table.$('tr.selected').removeClass('selected');
	            $(this).addClass('selected');
	        }
	    } );
	} );
 </script>
  
 
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>






