<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Solucionáticos - CRUDs - Assistants<?php if ($projectVersionTitle != '') { ?> - Proyecto: <?php echo $projectVersionTitle; } ?></title>
	<!-- Tell the browser to be responsive to screen width -->

	<link rel="icon" href="http://localhost/solucionaticos/assets/images/favicon.ico" type="image/x-icon">

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

	<!-- jQuery 3 -->
	<script src="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="http://localhost/solucionaticos/assets/templates/admin/AdminLTE-2.4.18/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<style type="text/css">
		
	</style>

</head>
<body>

<div class="container-fluid">

	<div class="row" style="margin-bottom: 10px;">
		<div class="col-sm-4">
			<h3>Asistentes<?php if ($projectVersionTitle != '') { ?> <span style="font-size: 14px; color: grey;">Proyecto: <?php echo $projectVersionTitle; ?> <a class="btn btn-info btn-xs" href="<?php echo base_url(); ?>admin/cruds/assistants/selprojver" style="position: relative; top: -4px; height: 19px; font-size: 10px; margin-left: 3px;">Cambiar</a></span><?php } ?></h3>
		</div>
		<div class="col-sm-8">
			<ul class="nav nav-tabs">
				<li><a href="#">Cotizaciones <span style="color:red;">(Pendiente)</span></a></li>
				<li<?php echo $tab_class[0]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/proyectos">Proyectos</a></li>
				<li<?php echo $tab_class[1]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones">Versiones</a></li>
				<li<?php echo $tab_class[2]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/tablas">Tablas</a></li>
				<li<?php echo $tab_class[3]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/campos">Campos</a></li>
				<li><a href="#">Repositorio <span style="color:red;">(Pendiente)</span></a></li>
			</ul>			
		</div>
	</div>
