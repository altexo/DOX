<?
include("librerias/conexion.php");

$id = $_GET['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar Seguro</title>

<style type="text/css">
<!--
p {
	margin-top: 10px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
}
fieldset {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	border-color:#EEE;
	width:200px; 
	margin-left:10px;
}
label {
	display: block;
	width: 115px;
	float: left;
}

-->
.test {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-decoration: none;
	
}
.test2{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-decoration: none;
	color:#000;
}
.test3 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	text-decoration: none;
	
}
a{
	text-decoration:none;
	color:#000;
}
a:hover
{
	color:#C00;
}
</style>

</head>
<? if(isset ($_POST["ace"]))
{
	
	
	conectar();
	$sql = "delete from seguro where id = ".$id."";
	
		if($result = mysql_query($sql))
		{ 
			echo "<br />";
			echo "<br />";
			echo "<br />";
			echo "<span class='test' style='margin-left:60px;>Registro Eliminado</span>";
			?> 
			<script languaje="javascript">
			
			window.opener.location.reload();
			window.close();
			
			</script>
			
			<?
	
		}
		desconectar();
}
else if(isset ($_POST["can"]))
{ ?>
	<script language=JavaScript>
	window.close();
	</script>
<? }
else
{

?>
<body>
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px">ELIMINAR SEGURO</span></p>
<form action="seguro_del.php?id=<? echo $id; ?>" method="post" enctype="multipart/form-data" name="form1" target="" id="form1" >
<fieldset style="float:left; height:80px;">
  <legend>¿Está seguro de eliminarlo?</legend>
  <p>
    <input type="submit" name="ace" id="ace" value="Aceptar" />
    <input type="submit" name="can" id="can" value="Cancelar" />
  </p>

</fieldset>
</form>
</body>
</html>
<? } ?>