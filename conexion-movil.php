<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Request-Method: *');
    header('Access-Control-Allow-Headers: x-requested-with');
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	    header("HTTP/1.1 200 OK");
	    return;
    } 
?>
<?php include("librerias/conexion2.php");	
header('Content-type: text/json');
$error="";

 if( isset($_POST['email'])  && isset($_POST['contra']) )
 {
	$email = $_POST['email'];
	$passclean = $_POST['contra']."wiiwo";
	$pass = md5($passclean);
	conectar();
	
	$sql = "SELECT id, nombre, email, celular, passwordtoken FROM paciente WHERE email = '".$email."' AND passwordtoken = '".$pass."'";
	$result=mysql_query($sql);
	mysql_num_rows($result);
	if(mysql_num_rows($result)==1)
	{
		$_SESSION['email'] = $email;
		$_SESSION['contra'] = $pass;
		desconectar();
		
		
$row_usuario = mysql_fetch_assoc($result);
$totalRows_usuario = mysql_num_rows($result);
$results = array();
$row_usuario["exito"] = true;
echo json_encode($row_usuario);
mysql_free_result($result);
		
		
	}
	else
	{
		$error = array("exito" => false, "message" => "\"Usuario o password incorrecto\"");
		echo json_encode($error);
	}
	
}

?>
