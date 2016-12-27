<?php
error_reporting(E_ERROR  | E_PARSE);

// try {
echo 'Cargando DATOS Pruebas';
#Datos Ejemplo Pruebas
// $usuario= 'prueba';
// $password = 'prueba';
$usuario= 'SISG76';
$password = 'CbD4YjK9eC';
// $numempresa = '2558'; //
$numempresa = '2501';
$Sucursal = '0';
// $TipoVenta =  '33016'; // Sistema Externo        
$TipoVenta =  '38300';

//DATOS de EJEMPLO
$Cliente = 784140;
$rowCliente = array();
$rowCliente['rfc'] = $_POST["1"];
$rowCliente['nombre'] = $_POST["2"];
$rowCliente['apellido_paterno'] = '';
$rowCliente['apellido_materno'] = '';
$rowCliente['email'] = $_POST["12"];

$plaza = 'Referencia Pruebas';
$fecha = '2015-03-03';
$rowCliente['calle'] = $_POST["6"];
$rowCliente['colonia'] = $_POST["10"];
$rowCliente['ciudad'] = $_POST["4"];
$rowCliente['codigo_postal'] = $_POST["11"];
$rowEstado['nom'] = $_POST["3"];
$rowCliente['numero_exterior']  = $_POST["7"];
$rowCliente['numero_interior'] = $_POST["8"];
$cveagen = 12345; //Opcional
$tipo_de_pago = 0; // 0 Contado, 1 Crédito
$formas_de_pago = 'Efectivo';
$SubTotal =  100;
$Iva = 16;
$iva_ret = 0;
$Total =  116;

$unidad = 'N/A';
$nom_unidad = 'N/A';
$Cantidad = 1;
$precio =  100;
//Observaciones
$cant = 1;
$nomunidad =  $_POST["concepto"];

$tasa_iva = 16;
$iva_partida = 16;

echo '<br/>';
echo 'Fin Cargar Datos Pruebas';

echo '<br/>';
echo '<br/>';
echo 'Inicia Objetos de WS';

$DatosFactura = array();                      
$DatosFactura['tipodocumento'] = $TipoVenta; // Sistema Externo             
$DatosFactura['fecha'] = $fecha;
$DatosFactura['receptor']['idcliente'] = $Cliente;             
$DatosFactura['receptor']['rfc'] = $_POST["1"];
$DatosFactura['receptor']['nombre'] = $_POST["2"];
$DatosFactura['receptor']['email'] = 'correo@menteinteractiva.com';
$DatosFactura['receptor']['calle'] = $_POST["6"];
$DatosFactura['receptor']['nexterior'] = $_POST["7"];
$DatosFactura['receptor']['ninterior'] = $_POST["8"];
$DatosFactura['receptor']['colonia'] = $_POST["10"];
$DatosFactura['receptor']['localidad'] = $_POST["5"];
$DatosFactura['receptor']['municipio'] = $_POST["4"];
$DatosFactura['receptor']['estado'] = $_POST["3"];
$DatosFactura['receptor']['pais'] = '261';
$DatosFactura['receptor']['codigopostal'] = $_POST["11"];
$DatosFactura['iddireccionentrega'] = '0';
$DatosFactura['razon_social_comp_id'] = '';
$DatosFactura['idagente'] = '0';
$DatosFactura['tipopago'] = $tipo_de_pago;                     
$DatosFactura['metodoDePago'] = 'No Identificado';
$DatosFactura['RefDePago'] = '';

$Concepto = array();                         
$Concepto['cantidad'] = $Cantidad;
$Concepto['unidad'] = 'No Aplica';
$Concepto['almacen'] = 0;
$Concepto['descripcion'] = 'PRUEBA DE DESCRIPCION';
$Concepto['valorunitario'] = $precio;                         
$Concepto['tasadescuento'] = 0;                         
$Concepto['descuento'] = 0;                         
$Concepto['tasaieps'] = 0;                         
$Concepto['ieps'] = 0;                         
$Concepto['tasaiva'] = 16;                         
$Concepto['iva'] = 16;                                              
$Concepto['observaciones'] = 'OBSERVACIONEs';
$Concepto['series'] = '';
$DatosFactura['conceptos'] = array();
$DatosFactura['conceptos'][] = $Concepto;

$DatosFactura['subtotal'] = 100;             
$DatosFactura['descuento'] = 0;             
$DatosFactura['ieps'] = 0;             
$DatosFactura['iva'] = 16;             
$DatosFactura['isrretenido'] = 0;
$DatosFactura['ivaretenido'] = 0;
$DatosFactura['total'] = $Total;


//Cambie por ruta directa
require_once("lib/nusoap.php");    

$oSoapClient = new nusoap_client("https://clickbalance.net/click/wsCFD.php?wsdl", 'wsdl');  

echo 'Invoca método setGeneraDocumentoVenta: ';
$Venta = $oSoapClient->call('setGeneraDocumentoVenta', array('usuario' => $usuario, 'password' => $password, 'empresa' => $numempresa, 'plaza' => $Sucursal, 'datosfactura' => $DatosFactura));  
$err = $oSoapClient->getError();  
echo '<br>';
echo '<h2>Request</h2><pre>' . htmlspecialchars($oSoapClient->request, ENT_QUOTES) . '</pre>';
print_r($Venta);


exit();


//if($Venta[c] != '')             
//{ 
if($Venta['contenido_archivo'] != '')                 
{                    
	$DocXML = new DOMDocument();                      
	$DocXML->loadXML(base64_decode($Venta['contenido_archivo']));                                      
	$Comprobante =$DocXML->getElementsByTagName("Comprobante")->item(0);                     
	$Serie = $Comprobante->getAttributeNode("serie")->value;                     
	$Folio = $Comprobante->getAttributeNode("folio")->value;    				
}             			 
if($Venta['resultado'] == 600 )                 
{                                    
   $posicion = strrpos($Venta['nombre_archivo'], ':');                     
   $mensaje = substr($Venta['nombre_archivo'], $posicion+1);                                                  
   $Error = explode(" ", $Venta['nombre_archivo']);                     
   $DatosVenta = explode(":",$Error[0]);                     
   $venta_id = $DatosVenta[1];     
   echo $mensaje;
   echo $Error;   
   //echo $venta_id;   
}
else if($Venta['resultado']==601)                 
{                                                    
	$posicion = strrpos($Venta['nombre_archivo'], ':');                     
	$mensaje = substr($Venta['nombre_archivo'], $posicion+1);                                  
	$Error = explode(" ", $Venta['nombre_archivo']);                     
	$DatosVenta = explode(":",$Error[0]);                     
	$venta_id = $DatosVenta[1];
} 
else{                     
   $venta_id = substr($Venta['nombre_archivo'],0,-4);            
}

// } catch (Exception $e) {
// 	echo 'error';
//     trigger_error($e->getMessage(), E_USER_WARNING);
// } 
//}
?>