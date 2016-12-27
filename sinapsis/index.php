<?
include("librerias/conexion.php");	
$error="";
 if( isset($_POST['user'])  && isset($_POST['pass']) )
 {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	conectar();
	$sql = "SELECT * FROM usuario WHERE user = '$user' AND password = '$pass'";
	$result=mysql_query($sql);
	mysql_num_rows($result);
	if(mysql_num_rows($result)==1)
	{
		desconectar();
		header("Location: doctor.php");
	}
	else
	{
		$error = "Usuario y/o Contraseña Inválida";
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="shortcut icon" type="image/x-icon" href="colors/favicon.ico">
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>

<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="admin_header">
    
    <div id="admin_title">
      <h2><img src="../visual/logo2.png" width="150" height="62" /></h2>
    </div>
    
    
</div>

<div id="admin_main">
<h3>Ingreso al Sistema Administrativo</h3>


<form method="POST" action="index.php"> 
<label><span class="oblig">*</span> Nombre de Usuario</label>
<span id="sprytextfield1">
<input type="text" name="user" id="user" size="18" />
</span><br />
<label><span class="oblig">*</span> Contraseña</label>
<span id="sprytextfield2">
<input type="password" name="pass" id="pass" size="18" />
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
