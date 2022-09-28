<?php session_start(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>QR Code | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="js/instascan.min.js"></script>
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		#divvideo {
			box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>

<body style="background:#eee">
	<nav class="navbar" style="background:#fff">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">QR Code Attendance</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Maintenance <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> User</a></li>
						<li><a href="newUser.php"><span class="glyphicon glyphicon-plus-sign"></span> New</a></li>
						<li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span> Attendance</a></li>

					</ul>
				</li>
				<li><a href="#"><span class="glyphicon glyphicon-align-justify"></span> Reports</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-time"></span> Check Attendance</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">


				<form method="POST" action="usuarios.php" >
					<div class="form-group">
						<label for="exampleFormControlFile1">DNI</label>
						<input name="dni" class="form-control" type="text" placeholder="87654321">
					</div>
						<div class="form-group">
						<label for="exampleFormControlFile1">APELLIDOS</label>
						<input name="apellidos" class="form-control" type="text" placeholder="">
					</div>
					<div class="form-group">
						<label for="exampleFormControlFile1">NOMBRES</label>
						<input name="nombres" class="form-control" type="text" placeholder="">
					</div>
					<div class="form-group">
						<label for="exampleFormControlFile1">EDAD</label>
						<input name="edad" class="form-control" type="text" placeholder="">
					</div>
					<div class="form-group">
						<label for="exampleFormControlFile1">GENERO</label>
						<input name="genero" class="form-control" type="text" placeholder="">
					</div>
					<button  type="submit" class="btn btn-primary">Registrar</button>
				</form>

				<input class="form-control" type="text" id="texto_usuario" placeholder="Default input" aria-label="default input example">
				<button type="button" id="enviar" class="btn btn-primary" onclick="javascript:enviar_texto();">ENVIAR TEXTO</button>
				<div id="cont_img">

				</div>
				<button href="" onclick="javascript:miAlerta();">Guías</button>





			</div>

		</div>

	</div>
	<script>
		function Export() {
			var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
			if (conf == true) {
				window.open("export.php", '_blank');
			}
		}
	</script>

	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"autoWidth": false,
			});
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>

	<script>
		function enviar_texto() {
			$.ajax({
				url: "generaqr.php",
				type: "POST",
				data: "texto=" + document.getElementById("texto_usuario").value,
				success: function(resp);
				alert(datos.mensaje);
				$("#cont_img").html("<img src='" + datos.datos + "'>");
			})
			alert("si llegue hasta aqui");
		}
	</script>

	<script>
		function miAlerta(evento) {
			event.preventDefault();
			alert("Se ah dado clic al enlace pero el sitio no ah sido abierto");
		}
	</script>

</body>

</html>