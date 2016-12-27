<? 
 include("librerias/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX</title>
<link href="_css/sinapsis_novo.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<style type="text/css">
<!--
p {
	margin-top: 10px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
}
fieldset {
	font-family:Eurostyle;;
	font-size: 15px;
	border-color:#EEE;
	width:550px; 
	margin-left:10px;
	color:#999;
}
label {
	display: block;
	width: 150px;
	float: left;
}

.test3 {
	font-family:Eurostyle;
	font-size: 20px;
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

@font-face
{
	font-family:Eurostyle;
	src:url('fuentes/Eurostile.eot');
	

}
@font-face
{
	font-family:Eurostyle;
	src:url('fuentes/Eurostile.ttf');
	
	
}
</style>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<? 
function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}

?>
<div id="encabezado"><img src="_assets/logo.png" width="200" height="73" /></div>
<div id="menu">
  <p>Seleccione una opción</p>
  <a href="doctor.php" class="navi">Médicos</a> <!--<a href="galeria.php" class="navi">Imágenes de médicos</a>--> <a href="seguros.php" class="navi">Seguros Médicos</a>
  <p style="clear:both">&nbsp;</p>
</div>
<div id="contenido">
  
	
	<h1>Médicos </h1>
  <p><a href="#" id="bnuevo">Crear nuevo</a></p>
  <p>&nbsp; </p>
  
 
  <!--EMPIEZAN ELEMENTOS DE MEDICOS-->
  <div id="envoltura">

    <div id="cabeza">
     <div class="envoltura2">
      <div class="ficha1">Nuevo Doctor</div>
     </div>
    </div>
   
    <div class="envoltura2">
    <form action="insert_doc.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >
    <p>
     <label>Email:</label>
     <span id="sprytextfield1">
     <input type="text" name="email" id="email" />
     <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Inválido.</span></span></p>
   <? $hola =  get_rand_id(10); ?>
   <p>
     <label>Contraseña:</label>
     <span id="sprytextfield3">
     <input type="text" name="pass" id="pass" value="<? echo $hola; ?>" />
     <span class="textfieldRequiredMsg">Campo Obligatorio.</span></span>    </p>
   <p><label>&nbsp;</label>
     <input type="submit" name="guardar" id="guardar" value="Enviar" />
   </p>
     <p>
  <label>&nbsp;</label><iframe name="imagen" allowtransparency="true" style="border:none"  width="500px" height="60px" id="imagen" scrolling="Auto"> </iframe>
</p>
    <div style="clear:both;"></div>
      
    </form>
    </div>
        <div style="clear:both"></div>  
    
  </div>
      <!--TERMINAN ELEMENTOS DE MEDICOS-->
    <div style="clear:both"></div>
</div>
  
 
</div>
<div id="pie">Powered by Mente Interactiva's Sinapsis</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
//-->
</script>
</body>
</html>
