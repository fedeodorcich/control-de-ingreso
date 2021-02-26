<?php 
	require('conexion.php');
	$name=$_POST['name'];
	$consulta="SELECT * FROM asistencia WHERE nombre= '$name' order by id desc limit 1";
	$query=mysqli_query($conexion,$consulta);

	if ($res=mysqli_fetch_array($query)){
		
		if($res['entrada']==$res['salida'])
		{
			echo ;
		}
		echo $res;
	}
	
 ?>