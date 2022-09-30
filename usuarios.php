<?php 
require "conn_db.php";
if(isset($_POST['dni'],$_POST['apellidos'],$_POST['nombres'],$_POST['edad'])){

$dni=$_POST['dni'];
$apellidos=$_POST["apellidos"];
$nombres=$_POST["nombres"];
$edad=$_POST["edad"];
$genero=$_POST["genero"];


    $sql = "INSERT INTO `student`(`ID`, `STUDENTID`, `FIRSTNAME`, `MNAME`, `LASTNAME`, `AGE`, `GENDER`) VALUES ('','$dni','$apellidos','','$apellidos','$edad','$genero')";
    $query = $conn->query($sql);
    echo "Se registro Correctamente";
}else {
    echo "No llego los datos";
}

?>



<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables 	<link rel="stylesheet" href="css/bootstrap.min.css">
	-->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
	

		<style>
		#divvideo{
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
				  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Student</a></li>
				  <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> New Student</a></li>
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
				<div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
				
				<a type="button" href="newUser.php" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" ></span> Add</a>
				
               <p>Attendance Summary</p>
			   <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
						<td>STUDENTID</td>
						<td>FIRSTNAME</td>
						<td>MNAME</td>
                        <td>MNAME</td>
						<td>AGE</td>
						<td>GENDER</td>
                        <td>ACTION</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                           $sql ="SELECT * FROM student";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'];?></td>
                                <td><?php echo $row['FIRSTNAME'];?></td>
                                <td><?php echo $row['MNAME'];?></td>
                                <td><?php echo $row['LASTNAME'];?></td>
                                <td><?php echo $row['AGE'];?></td>
                                <td><?php echo $row['GENDER'];?></td>
								
                                <td>
                                <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" href="viewCard.php?id=<?php echo $row['ID'];?>"><span class="glyphicon glyphicon-eye-open"></span></button>

                                <a type="button" class="btn btn-danger btn-sm" href="borrar.php?id=<?php echo $row['ID'];?>" > <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" >
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



		<script>
			function Export()
			{
				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
    
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script src="sweetAlert.js"></script>

		<script>
		$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').trigger('focus')
		})
		</script>
		<script>
		  $(function () {
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
		
    </body>
</html>