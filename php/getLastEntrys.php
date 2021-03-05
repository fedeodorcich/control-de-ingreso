<?php 
	require('conexion.php');
	$name=$_POST['name'];

	if($name != 'none'){
		$consulta="SELECT * FROM asistencia WHERE nombre= '$name' order by id desc limit 1";
		$query=mysqli_query($conexion,$consulta);

		if ($res=mysqli_fetch_array($query)){
			
			if($res['entrada']==$res['salida'])
			{
				echo "<td>".$res['entrada']."</td><td> Salida Pendiente </td>";
			}
			else
			{
				echo "<td>".$res['entrada']."</td><td>".$res['salida']."</td>";
			}	
		}
	}else{
		echo false;
	}
	
 ?>