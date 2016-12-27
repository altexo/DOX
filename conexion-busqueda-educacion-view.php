<?php 

include("librerias/conexion2.php");

// 01 identifica variables
session_start();


$id = $_GET['id'];
$clinica = $_GET['clinica'];

// hola, soy una función

function separar_hora($hora)
  {   
     $hora_arreglo = explode(":",$hora);
    
     $hora_final = $hora_arreglo[0].":".$hora_arreglo[1];
      
    return $hora_final; 
    
  }

//

conectar();

mysql_query('SET CHARACTER SET utf8');
$sql = mysql_query("Select * From doctor, clinica Where doctor.id = clinica.id_doctor and doctor.id = ".$id." and clinica.id = ".$clinica."");
$row = mysql_fetch_array($sql);
                                                  
desconectar();  

// fin


?><!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Certificaciones</h2>
<?php echo $row["certificaciones"]; ?>
<h2>Educacion</h2>
<?php echo $row["educacion"]; ?>
</body>
</html>