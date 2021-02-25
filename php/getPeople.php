<?php 
	require('conexion.php');
	$val=$_POST['value'];
	$consulta="SELECT * FROM nombres WHERE value='$val'";
	$query=mysqli_query($conexion,$consulta);
	while($res=mysqli_fetch_array($query)){
		echo "<option value='".$res['nombre']."'>".$res['nombre']."</option>";
	}
 ?>