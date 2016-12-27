<?php
	
	mysql_connect("localhost","menteint_admin","navic1");
		mysql_query('SET CHARACTER SET utf8');
	mysql_select_db("menteint_dox");

	for($c = 1; $c <= 7; $c++)
	{
		$arreglo[$c] = $_GET[$c];
		
	}//Aqui termina el for para guardar las fechas en el arreglo por medio del $_GET[] 
	
	
	
	
	
	for($f = 1;$f <= 7; $f++)
	{
	
	$sql = mysql_query("select hinicio,id from datos where inicio='".$arreglo[$f]."' and status='cita-web' order by hinicio");
	
	echo "<div id='hora".$f."'>";
	
	
	while($bd = mysql_fetch_array($sql))
	{
			echo "<a href='#'>".separar_hora($bd['hinicio'])."</a><br>";
	
	}//Aqui termina el while
		
	echo "</div>";
	
	}//Aqui termina el for que mueve todo
	
	
	
	function separar_hora($hora)
	{		
		 $hora_arreglo = explode(":",$hora);
		
		 $hora_final = $hora_arreglo[0].":".$hora_arreglo[1];
			
		return $hora_final; 
		
	}//Esta funcion sirve para separar la hora. 
	
	
	
	
?>