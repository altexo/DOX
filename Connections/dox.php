
<!--# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dox = "localhost";
$database_dox = "dox";
$username_dox = "root";
$password_dox = "";
$dox = mysql_pconnect($hostname_dox, $username_dox, $password_dox) or trigger_error(mysql_error(),E_USER_ERROR); 
-->

<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dox = "localhost";
$database_dox = "menteint_dox";
$username_dox = "menteint_admin";
$password_dox = "navic1";
$dox = mysql_pconnect($hostname_dox, $username_dox, $password_dox) or trigger_error(mysql_error(),E_USER_ERROR); 
?>


	
	

