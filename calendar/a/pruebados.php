<?php
	
	$conexion = mysql_connect("localhost","root");
	mysql_select_db("agenda",$conexion);

	$datos = mysql_query("select hinicio from datos where iddoctor=1 and id=2");
	$data = mysql_fetch_array($datos);
?>

<!doctype>


	<meta charset="utf-8">



	<title>Prueba</title>
	




	<style>

	#contenedor{margin:150px auto;text-align:center;}
	h1{font-size:150px;}

	</style>


	<div id="contenedor">

	<h1><a href="prueba.php?hora=<?php echo $data['hinicio']; ?>"><?php echo $data['hinicio']; ?></a></h1>

	</div>