<?
	
	
	$conexion = mysql_connect("localhost","root");
		
	mysql_select_db("agenda",$conexion);

	$inicio = $_GET['inicio'];
		
	$sql = mysql_query("select * from datos where inicio='".$inicio."' and status='cita-web'");

	
	
	while($data = mysql_fetch_array($sql))
	{
	
		echo  "<a href='#'>".$data['hinicio']."</a> <br>";	
		
	}


?>