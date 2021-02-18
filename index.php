<?php 
	require("php/conexion.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Anchipurac Ingresos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-info text-light">
  <a class="navbar-brand" href="#">Anchipurac</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>


<div class="container col-md-4 col-11" style="margin-top: 2em;">
	<h3 class="text-center">Ingresos</h3>
	<form action="" method="POST" class="form" style="margin-top:20px;">
		<select name="nombre" id="" class="form-control form-control-sm">
			<option value="none">Elija su nombre</option>
			<?php 
				$nombres=mysqli_query($conexion,"SELECT * FROM nombres WHERE id!=0");
				while ($consulta=mysqli_fetch_array($nombres))
				{
					    echo '<option value="'.$consulta['nombre'].'">'.$consulta['nombre'].'</option>';
				}
			 ?>
			
		</select>
		<div class="row col-12" style="padding: 0; margin:0; margin-top: 20px;">
			<input type="submit" value="ENTRADA" name="entrada" method="POST" class="btn btn-info col-5" style="margin: 0 auto;">
			<input type="submit" value="SALIDA" name="salida" method="POST" class="btn btn-success col-5" style="margin: 0 auto;">
		</div>
	</form>	
</div>
	
	<?php 
		if(isset($_POST['entrada']))
		{
			
			$nombre=$_POST['nombre'];
			

			if($nombre != 'none'){
				$ban=0;
				$preprequery=mysqli_query($conexion,"SELECT * FROM asistencia WHERE nombre='$nombre' ORDER BY id DESC LIMIT 1");
				while($consult=mysqli_fetch_array($preprequery))
				{
					if($consult['entrada']==$consult['salida'])
					{echo '<div class="alert alert-danger text-center" role="alert">
						  ERROR YA MARCASTE ENTRADA
						</div>';
						$ban=1;
					}
				}
				if($ban==0)
				{
					$entrada="INSERT INTO `asistencia` (`id`, `nombre`, `entrada`,`salida`) VALUES ('0', '$nombre', current_timestamp(),current_timestamp())";
					$query=mysqli_query($conexion,$entrada);
					if($query)
					{
						echo '<div class="alert alert-success text-center" role="alert">
						  Marcado de entrada Correcto
						</div>';			
					}
					else
						{
						echo '<div class="alert alert-danger text-center" role="alert">
						  ERROR AL MARCAR ENTRADA
						</div>';}
				}
			}else{
				echo '<div class="alert alert-warning text-center" role="alert">
				DEBE SELECCIONAR UN NOMBRE DEL LISTADO
				</div>';
			}
		}

		if(isset($_POST['salida']))
		{
			$nombre=$_POST['nombre'];

			if($nombre != 'none'){
				$ban1=0;
				$preprequery=mysqli_query($conexion,"SELECT * FROM asistencia WHERE nombre='$nombre' ORDER BY id DESC LIMIT 1");
				while($consult=mysqli_fetch_array($preprequery))
				{
					if($consult['entrada']!=$consult['salida'])
					{
						echo '<div class="alert alert-danger text-center" role="alert">
						  ERROR YA MARCASTE SALIDA
						</div>';
						$ban1=1;
					}
				}
				if($ban1==0)
				{
					$var="SELECT * FROM asistencia WHERE nombre='$nombre' ORDER BY id DESC LIMIT 1";
					$prequery=mysqli_query($conexion,$var);
					$auxid;
					while($consulta=mysqli_fetch_array($prequery))
					{
						$auxid=$consulta['id'];
						$auxentrada=$consulta['entrada'];
					}
					$salida="UPDATE `asistencia` SET salida = CURRENT_TIMESTAMP , entrada = '$auxentrada' WHERE id='$auxid' ";
					$query2=mysqli_query($conexion,$salida);
					if($query2)
					{
						echo '<div class="alert alert-success text-center" role="alert">
						 Marcado de salida correcto
						</div>';
					}
					else
						{
						echo '<div class="alert alert-danger text-center" role="alert">
						ERROR AL MARCAR SALIDA
						</div>';
					}
				}
			}else{
				echo '<div class="alert alert-warning text-center" role="alert">
				  DEBE SELECCIONAR UN NOMBRE DEL LISTADO
				</div>';
			}
			
		}
	 ?>

</body>
</html>