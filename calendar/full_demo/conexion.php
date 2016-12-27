<?

	function conectar()
	{
		$conexion = mysql_connect("localhost","root");
		
		mysql_select_db("agenda",$conexion);
	
	}

	
	
	function desconectar()
	{
		mysql_close();
	}
	
	function separar_fecha($fecha)
	{
		$temp = explode("/",$fecha);
		$mes_separado = separar_mes($temp[1]);
		$dia_separado = separar_mes($temp[2]);
		$fechafinal = array(1=>$temp[0],2=>$mes_separado,3=>$dia_separado);
		
		return $fechafinal;
	
	}
		
	function separar_mes($mesconcero)
	{
		$temp = implode("",$mesconcero);
		if($temp[0] == "0")
		{
			$mes_return = $temp[1]; 
		}
		else
		{
			$mes_return = $temp[0].$temp[1];
		}
		
		return $mes_return;
	}//En esta funcion se le quita el cero al mes... ya que asi lo pide el objeto date en javascript
	
	
	function separar_hora($hora)
	{
		$temp = explode(":",$hora);
		$horafinal = array(1=>$temp[0],2=>$temp[1]);
			
		return $horafinal;
	}	

?>