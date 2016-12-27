<?php
	
	$conexion = mysql_connect("localhost","root");
		
	mysql_select_db("agenda",$conexion);

	for($c = 1; $c <= 7; $c++)
	{
		$arreglo[$c] = $_GET[$c];
		
	}//Aqui termina el for para guardar las fechas en el arreglo por medio del $_GET[] 
	
	for($f = 1;$f <= 7; $f++)
	{
	
	$sql = mysql_query("select hinicio from datos where inicio='".$arreglo[$f]."' and status='cita-web'");
	
	echo "<div id='hora".$f."'>";
	
	
	while($bd = mysql_fetch_array($sql))
	{
			$contador = 1;
	
			echo "<a href='#'>".$bd['hinicio']."</a><br>";
	
			$contador++;
	
	}//Aqui termina el while
		
	echo "</div>";
	
	}//Aqui termina el for que mueve todo
	
	

	function separar_hora($arreglo)
	{
		$size = count($arreglo);
		
		for($count = 1;$count <= $size;$count++)
		{
		
		
		
		}//Aqui termina el for para ordenacion	
		
	
	}//Esta funcion sirve para separa la hora y acomodarla de manera.. ascendente
	
	
	
	
?>