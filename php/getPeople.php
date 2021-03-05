<?php 
	require('conexion.php');
	$val=$_POST['value'];
	$consulta="SELECT * FROM nombres WHERE value='$val' ORDER BY nombre";
	$query=mysqli_query($conexion,$consulta);
	echo "<option value='none'>Elija su nombre</option>";

	while($res=mysqli_fetch_array($query)){
		echo "<option value='".utf8_encode($res['nombre'])."'>".utf8_encode($res['nombre'])."</option>";
	}
 ?>