<?php
function conectar()
{
	mysql_connect("localhost","menteint_admin", "navic1");
	mysql_select_db("menteint_dox");
	
	/*mysql_connect("localhost", "root", "");
	mysql_select_db("dox");*/
}

function desconectar()
{
	mysql_close();
}
?>