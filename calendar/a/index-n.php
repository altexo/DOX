<?php require_once('../../Connections/dox.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['nombre'])) {
  $loginUsername=$_POST['nombre'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "medico-panel.php";
  $MM_redirectLoginFailed = "index-n.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_dox, $dox);
  
  $LoginRS__query=sprintf("SELECT email, pass FROM doctor WHERE email=%s AND pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $dox) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Calendario</title>
<style type="text/css">
* { outline:none; }
body { font: 72.5% "Lucida Grande", Arial, sans-serif; margin: 30px 0; background-color: #f6f6f6; color: #666; }
a { color: #08c; text-decoration: none; }
a:hover { text-decoration: none; color:#333; }

h2 { font: 30px Arial, Helvetica, sans-serif; color: #333; letter-spacing:-1px; padding: 0; margin: 0; }
h3 { font:18px Arial; letter-spacing:-1px; color:#333; }

#admin_main, #admin_header, #footer {
margin: 0 auto; width: 540px; margin-bottom: 10px; overflow: hidden; }

#admin_main { padding: 15px; width: 510px; border: 1px solid #cbcbcb; -moz-border-radius: 10px; -webkit-border-radius:10px; background:#fff; }
#admin_title { float: left; }
#admin_logout { float: right; }

input, textarea, select {
	padding:7px;
	border:1px solid #eee;
	font:16px Arial, Helvetica, sans-serif;
	width:490px;
	color:#999;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
}

input[type=submit], input.submit {
	width: auto;
	border: 2px solid #005295;
	color: #fff;
	font-weight: bold;
	margin-top: 15px;
	cursor: pointer;
	width: auto;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	padding: 10px;
	background-color: #4F91CD;
}

input[type=submit]:hover, input[type=submit]:focus, input.submit:hover, input.submit:focus {
	color: #fff;
	background-color: #005496;
}

.checkbox { width:auto; }
input.edit_search { width:400px; }
select { width:auto; }
input:focus, textarea:focus { border-color:#ccc; color:#555; }


.oblig {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #C00;
	vertical-align: top;
	margin-bottom: 10px;
}
</style>


</head>



<body>
<div id="admin_header">
    
    <div id="admin_title">
      <h2><img src="../../visual/logo2.png" width="150" height="62" /></h2>
  </div>
    
    
</div>

<div id="admin_main">
<h3>Acceso al Calendario Virtual DOX</h3>


<form action="<?php echo $loginFormAction; ?>" method="POST" id="forma">
<label><span class="oblig">*</span> Email</label><span id="sprytextfield1">
<input type="text" name="nombre" id="nombre" size="18" />
</span><br />
<label><span class="oblig">*</span> Contraseña</label><span id="sprytextfield2">
<input type="password" name="password" id="password" size="18" />
</span><br /><br /> 
  <label style="color:#C00"><strong>
    <?	echo $error;?>
  </strong></label>
  <p><span class="oblig">* Campos Obligatorios</span><br />
  <input type="submit" value="Ingresar" name="login" id="login">
</p>
</form> 
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>

</body>



</html>