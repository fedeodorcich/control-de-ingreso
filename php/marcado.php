<?php 
	require('conexion.php');
	//-------verificar si la ultima salida es igual que la entrada
	//-------cargar salida o cargar entrada segun corresponda
	//-------modificar la cuestion de las entradas y salidas

	$nombre=$_POST['name'];	

	if($nombre != 'none'){

		$preprequery=mysqli_query($conexion,"SELECT * FROM asistencia WHERE nombre='$nombre' ORDER BY entrada DESC LIMIT 1");
		$consult=mysqli_fetch_array($preprequery);

		if($consult){
			if($consult['entrada']==$consult['salida']){
						
				$id=$consult['id'];
				$entrada=$consult['entrada'];
						
				$salida = "UPDATE `asistencia` SET salida = CURRENT_TIMESTAMP , entrada = '$entrada' WHERE id='$id' ";
				$query = mysqli_query($conexion,$salida);
				if($query){
					echo '<div class="mt-3 alert alert-success text-center" role="alert">
  									<b>Salida</b> marcada con éxito
									</div>';
				}else{
					echo 'ERROR AL MARCAR SALIDA</div>';
				}

			}else{
				$entrada="INSERT INTO `asistencia` (`id`, `nombre`, `entrada`,`salida`) VALUES ('0', '$nombre', current_timestamp(),current_timestamp())";
				$query=mysqli_query($conexion,$entrada);
				if($query){
					echo '<div class="mt-3 alert alert-primary text-center" role="alert">
  									<b>Entrada</b> marcada con éxito
									</div>';			
				}else{
					echo 'ERROR AL MARCAR ENTRADA';
				}
			}
		}else{
			$entrada="INSERT INTO `asistencia` (`id`, `nombre`, `entrada`,`salida`) VALUES ('0', '$nombre', current_timestamp(),current_timestamp())";
			$query=mysqli_query($conexion,$entrada);
			if($query){
				echo 'Marcado entrada correcto';			
			}else{
				echo 'ERROR AL MARCAR ENTRADA';
			}
		}
	}else{
		echo false;
	}

 ?>