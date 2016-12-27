<?

	function conectar()
	{
			mysql_connect("localhost","menteint_admin","navic1");
		
		mysql_select_db("menteint_dox");
	mysql_query("SET NAMES 'utf8'");
/*	mysql_connect("localhost", "root", "");
		mysql_select_db("dox");*/
	}

	function desconectar()
	{
		mysql_close();
	}
	
	function separar_fecha($fecha)
	{
		$temp = explode("-",$fecha);
		$fechafinal = array(1=>$temp[0],2=>$temp[1],3=>$temp[2]);
		return $fechafinal;
	
	}
		
	function separar_mes($mesconcero)
	{
		$temp = split($mesconcero);
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