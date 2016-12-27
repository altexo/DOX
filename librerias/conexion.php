<?php
function conectar()
{
	mysql_connect("localhost","menteint_admin", "navic1");
 /* mysql_query('SET CHARACTER SET utf8'); */
	mysql_select_db("menteint_dox");
	mysql_query("SET NAMES 'utf8'");

	
	/*mysql_connect("localhost", "root", "");
	mysql_select_db("dox");*/
}

function desconectar()
{
	mysql_close();
}



?>