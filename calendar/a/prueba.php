<?php

$id = $_GET['id'];
$iddoctor = $_GET['iddoctor'];


	if(isset($_POST['enviar']))
	{
	mysql_connect("localhost","menteint_admin","navic1");
	mysql_select_db("menteint_dox");

	$datos = mysql_query("update datos set  titulo='".$_POST['persona']."', status='cita-hecha'
	where id=".$id." and iddoctor=".$iddoctor."");
}
?>


<!doctype>


	<meta charset="utf-8">



	<title>Prueba</title>





	<style>




	</style>

	<form method="post" action="">

	<div id="contenedor">

	<br>

	<h1><?php echo $_GET['hora']; ?></h1>
	<h1><?php echo $_GET['clinica']; ?></h2>
	<input type="text" name="persona">

	<br>


	<input type="submit" name="enviar" value="citar">


	</div>

	</div>