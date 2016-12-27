<?

	$conexion = mysql_connect("localhost","root");
		
	mysql_select_db("agenda",$conexion);

	$id = $_GET['id'];
	$inicio = $_GET['inicio'];
	$final = $_GET['final'];
	$hinicio = $_GET['hinicio'];
	$hfinal = $_GET['hfinal'];
	$titulo = $_GET['titulo'];
	$status = $_GET['status'];
	$sql = $_GET['sql'];
	
	
	switch($sql)
	{
		case 1:
		
			$datos = mysql_query("insert into datos(id,inicio,final,hinicio,hfinal,titulo,status) VALUES(".$id.", '".$inicio."', '".$final."', '".$hinicio."', '".$hfinal."','".$titulo."', '".$status."')");
	
		break;
	
		case 2:
				
			$datos2 = mysql_query("UPDATE datos SET inicio='".$inicio."', final='".$final."', hinicio='".$hinicio."', hfinal='".$hfinal."', titulo='".$titulo."', status='".$status."'  WHERE id=".$id."");

		break;
		
		case 3:
		
			$datos3 = mysql_query("delete from datos where id=".$id."");
				
		break;
	
	}
	
	mysql_close();

?>