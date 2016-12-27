<?php
//Regresa un Valor numerico 
// Si se introduce un string con letras ---> 0
// Si se introduce un 1,500.00 ---> 1500.00
// Si se introduce un 1,500.80 ---> 1500.80

//******************************************************************************************
// 								M A N E J O   D E   A R R E G L O S
//******************************************************************************************
//Devuelve un numero REAL con N decimales
function NumeroRealDecimales($numero,$num_decimales) {
   if (is_float($numero)) {}
   else {
         if ($numero=="0") {
    	     $numero="0.".str_repeat("0",$num_decimales);
    	  } else {
  if (!strrpos($numero, ".")) 
    		 {$numero=$numero.".".str_repeat("0",$num_decimales);}
	      }
   }
  $pos = strrpos($numero, ".");
   $dec = substr($numero, $pos+1, strlen($numero)-$pos); 	
   $decimales = substr($dec, 0, $num_decimales); 			//Guarda los Decimales con n digitos
   $parte_entera = substr($numero, 0, $pos); 				//Guarda la parte entera

 $dato=$parte_entera.".".$decimales;  //Numero con Formato
   
   return $dato;
}


/*function to add elements*/
function addArray(&$array, $id, $var)
{
   $tempArray = array( $var => $id);
   $array = array_merge ($array, $tempArray);
}


function floatvalor($strValue) {
   $floatValue = ereg_replace(",", "", $strValue);
   if (!is_numeric($floatValue)) $floatValue = ereg_replace("(^[0-9]*)(.*)", "\\1", $strValue);
   if (!is_numeric($floatValue)) $floatValue = 0;
   return $floatValue;
  }

//Regresa el NOMBRE de un Archivo SIN la Extension
function regresa_nombre_archivo($nombre,$extension) {
   return strrev(substr(strstr(strrev($nombre), strrev($extension)),strlen($extension)));
}    

//Regresa el NOMBRE de un Archivo SIN la Extension (Aunque tenga varios .)
function regresa_nombre_archivo_puntos($nombre) {
   $pos = strrpos($nombre, ".");
   if ($pos==false) {return " ";}
   else {
     $nombre = substr($nombre, 0, $pos);    // Nombre
	 return $nombre;
   }
}

//Regresa el NOMBRE de un Archivo SIN la palabra ALPHA
function regresa_nombre_archivo_alphas($nombre) {
   $pos = strrpos($nombre, ".");
   if ($pos==false) {return " ";}
   else {
     $nombre = substr($nombre, 0, $pos-6);    // Nombre
	 return $nombre;
   }
}

//Devuelve la EXTENSION de un Archivo SIN el Nombre
function DevuelveExtensionArchivo($nombre) {
   $pos = strrpos($nombre, ".");
   if ($pos==false) {return " ";}
   else {
     $extension = substr($nombre, $pos+1, strlen($nombre)-$pos);    // returns "ef"
	 return $extension;
   }
}

//Devuelve un nombre con la palabra _THUMB para nombrar los Thumbnails
function nombre_thumbnails($nombre_archivo)
{
   return regresa_nombre_archivo_puntos($nombre_archivo)."_thumb.".DevuelveExtensionArchivo($nombre_archivo);
}

//Devuelve un nombre con la palabra _THUMB_MED para nombrar los Thumbnails
function nombre_thumbnails_med($nombre_archivo)
{
   return regresa_nombre_archivo_puntos($nombre_archivo)."_thumb_med.".DevuelveExtensionArchivo($nombre_archivo);
}

//Devuelve un nombre con la palabra ALPHT para nombrar los Thumbnails
function nombre_thumbnails_alpha($nombre_archivo)
{
   return regresa_nombre_archivo_alphas($nombre_archivo).".Alpht.".DevuelveExtensionArchivo($nombre_archivo);
}

function FormatoMillares($numero) {
   if (is_float($numero)) {}
   else {
      if ($numero=="0") {
	     $numero="0.00";
	  } else {
	     if (!strrpos($numero, ".")) 
		 {$numero=$numero.".00";}
	  }
   }
   
   $pos = strrpos($numero, ".");
   $decimales = substr($numero, $pos+1, strlen($numero)-$pos); //Guarda los Decimales
   $parte_entera = substr($numero, 0, $pos); //Guarda la parte entera
   $longitud=strlen($parte_entera);   
   
   //$dato=$parte_entera.".".$decimales;
   $num_com=0;
   $numero_comas="";
   for ($i=$longitud; $i>=0; $i--) {
		$digito = substr($parte_entera, $i, 1);    // regresa el digito de der-izq
	    if ($num_com<3) //No agrega coma
			{
			  $numero_comas=$digito.$numero_comas;
			  $num_com++;
			} 
 	    else            //Si Agrega Comas
			{ 
  		      $numero_comas=$digito.$numero_comas;
			  if ($i>0) {
			     $numero_comas=",".$numero_comas;
			  } 
			     $num_com=1;
			}
   }
   
   $dato=$numero_comas.".".$decimales;  //Numero con Formato
   
   return $dato;
}

  // Convierte un numero REAL en uno ENTERO
function numero_entero($numero) 
{
	 if (strrpos($numero, "."))
	 {    //echo "en funcion numero entero entro!! --REAL--".$numero."<br>";
	      $pos = strrpos($numero, ".");
          $decimales = substr($numero, $pos+1, strlen($numero)-$pos); //Guarda los Decimales
          $parte_entera = substr($numero, 0, $pos); //Guarda la parte entera
		  return $parte_entera;              //Regresa la parte entera
	 } else  {
	     //echo "en funcion numero entero entro!! --ENTERO--".$numero."<br>";
         return $numero;              //Regresa la parte entera
	 }
   
}
  //  Devuelve la Fecha Actual formateada en dd/mm/aaaa
function FechaHoy() {
  $today=getdate();
  $dia=$today["mday"];
  $mes=$today["mon"];
  if (strlen($dia)==1) {$dia="0".$dia;};
  if (strlen($mes)==1) {$mes="0".$mes;};
  $fecha_actual=$dia."/".$mes."/".$today["year"];
  return $fecha_actual;
}

function FormatoFechaAmericana($fecha) {
  // Formato de Entrada para la Fecha ------->  dd/mm/aaaa
     $dia=substr($fecha,0,2);
	 $mes=substr($fecha,3,2);
	 $ano=substr($fecha,6,4);
  // Formato de Salida para la Fecha ------->  aaaa/mm/dd 
	 $FechaSalida=$ano."/".$mes."/".$dia;
	 return ($FechaSalida);
}

function FormatoFechaAmericana2($fecha) {
  // Formato de Entrada para la Fecha ------->  dd/mm/aaaa
     $dia=substr($fecha,0,2);
	 $mes=substr($fecha,3,2);
	 $ano=substr($fecha,6,4);
  // Formato de Salida para la Fecha ------->  aaaa/mm/dd 
	 $FechaSalida=$ano."-".$mes."-".$dia;
	 return ($FechaSalida);
}

function FormatoFechaMexico($fecha) {
  // Formato de Entrada para la Fecha ------->  dd/mm/aaaa
     $ano=substr($fecha,0,4);
	 $mes=substr($fecha,5,2);
	 $dia=substr($fecha,8,2);
  // Formato de Salida para la Fecha ------->  aaaa/mm/dd 
	 $FechaSalida=$dia."/".$mes."/".$ano;
	 return ($FechaSalida);
}

function FormatoFechaAmericanaDatos($dia, $mes, $ano) {
  // Formato de Salida para la Fecha ------->  aaaa/mm/dd 
  if (strlen($dia)==1) {$dia="0".$dia;};
  if (strlen($mes)==1) {$dia="0".$mes;};
	 $FechaSalida=$ano."/".$mes."/".$dia;
	 return ($FechaSalida);
}

//Recibe como parametro una fecha de la forma (d/m/aaaa) y la convierte a (dd/mm/aaaa)
function formatea_fecha_correcta($fecha)
{
 $dato="";
 $fecha_correcta="";
 for ($i = 0; $i < strlen($fecha); $i++) {
    $digito=substr($fecha, $i, 1); //Guarda un decimal
	if ($digito=="/") 
	   {  if (strlen($dato)<2) {$dato="0".$dato;}
	      $fecha_correcta=$fecha_correcta.$dato;
		  if (strlen($dato)==2) {$fecha_correcta=$fecha_correcta."/";
		                          $dato="";
								}
	   }
    else 
	   {$dato=$dato.$digito;}
 }
 $fecha_correcta=$fecha_correcta.$dato;
 return $fecha_correcta;
}

function VerificaSiHayFoto($ruta) {
   if ($ruta<>"") {
      return true;
   }
   else {
     return false;
   }
}

//Difereccia de Fechas dado un Intervalo
function datediff($interval, $date1, $date2) {
    // Function roughly equivalent to the ASP "DateDiff" function
    $seconds = $date2 - $date1;
    
    switch($interval) {
        case "y":
            list($year1, $month1, $day1) = split('-', date('Y-m-d', $date1));
            list($year2, $month2, $day2) = split('-', date('Y-m-d', $date2));
            $time1 = (date('H',$date1)*3600) + (date('i',$date1)*60) + (date('s',$date1));
            $time2 = (date('H',$date2)*3600) + (date('i',$date2)*60) + (date('s',$date2));
            $diff = $year2 - $year1;
            if($month1 > $month2) {
                $diff -= 1;
            } elseif($month1 == $month2) {
                if($day1 > $day2) {
                    $diff -= 1;
                } elseif($day1 == $day2) {
                    if($time1 > $time2) {
                        $diff -= 1;
                    }
                }
            }
            break;
        case "m":
            list($year1, $month1, $day1) = split('-', date('Y-m-d', $date1));
            list($year2, $month2, $day2) = split('-', date('Y-m-d', $date2));
            $time1 = (date('H',$date1)*3600) + (date('i',$date1)*60) + (date('s',$date1));
            $time2 = (date('H',$date2)*3600) + (date('i',$date2)*60) + (date('s',$date2));
            $diff = ($year2 * 12 + $month2) - ($year1 * 12 + $month1);
            if($day1 > $day2) {
                $diff -= 1;
            } elseif($day1 == $day2) {
                if($time1 > $time2) {
                    $diff -= 1;
                }
            }
            break;
        case "w":
            // Only simple seconds calculation needed from here on
            $diff = floor($seconds / 604800);
            break;
        case "d":
            $diff = floor($seconds / 86400);
            break;
        case "h":
            $diff = floor($seconds / 3600);
            break;        
        case "i":
            $diff = floor($seconds / 60);
            break;        
        case "s":
            $diff = $seconds;
            break;        
    }    
    return $diff;
}

//Cuenta los Dias Transcurridos entre una fecha ($start) y otra ($end) en el siguiente formato:
// ('yyyy/mm/dd') si uno de los parametros es ('0000/00/00') entonces regresa un 0 (cero)

function count_days($start, $end)
{
    if( $start != '0000-00-00' and $end != '0000-00-00' )
    {
        $timestamp_start = strtotime($start);
        $timestamp_end = strtotime($end);
        if( $timestamp_start >= $timestamp_end ) return 0;
        $start_year = date("Y",$timestamp_start);
        $end_year = date("Y", $timestamp_end);
        $num_days_start = date("z",strtotime($start));
        $num_days_end = date("z", strtotime($end));
        $num_days = 0;
        $i = 0;
        if( $end_year > $start_year )
        {
           while( $i < ( $end_year - $start_year ) )
           {
              $num_days = $num_days + date("z", strtotime(($start_year + $i)."-12-31"));
              $i++;
           }
         }
         return ( $num_days_end + $num_days ) - $num_days_start;
    }
    else
    {
         return 0;
     }
}

//Regresa un arreglo con el contenido de los campos deseados de una Base de Datos de Manera
// RANDOM

function registro_random_base_datos($conexion,$base_datos, $campo1, $filtro1, $filtro2, $campo2)
{
//regresa un registr de manera RANDOM
  if (($campo1<>"") and ($campo2=="")) {
    $query="select * from $base_datos
                     where $campo1='$filtro1'
					 order by rand()
					 limit 1";
					 
  }
  if (($campo1<>"") and ($campo2<>"")) {
    $query="select * from $base_datos
                     where $campo1='$filtro1' 
		  		     and $campo2='$filtro2'
					 order by rand()
					 limit 1";
					 
  }
  if (($campo1=="") and ($campo2=="")) {
    $query="select * from $base_datos
					 order by rand()
					 limit 1";
  }
   
   $resultado=mysql_query($query,$conexion);
   $registro=mysql_fetch_array($resultado);

   return $registro;
}

//****************************************************************************
// Elimina Espacios en Blanco

function elimina_espacios($cadena) {
$cadena=trim($cadena);
$longitud_cadena=strlen($cadena);
$nueva_cadena="";

   for($i = 0; $i < $longitud_cadena; $i++)
   {
    $caracter = substr ($cadena, $i, 1); // Devuelve solo 1 caracter
	if ($caracter<>" ") {
	  $nueva_cadena=$nueva_cadena.$caracter;
	}
   }
  return $nueva_cadena;
}

//******************************************************************************************
// 								M A N E J O   D E   S T R I N G S
//******************************************************************************************
function formatea_nombre_sin_espacios($file_name)
{
 $dato="";
 for ($i = 0; $i < strlen($file_name); $i++) {
    $caracter=substr($file_name, $i, 1); //Guarda un caracter a la vez
	if ($caracter==" ") 
	   { $dato=$dato."%20";}
    else 
	   {$dato=$dato.$caracter;}
 }
 return $dato;
}

//******************************************************************************************
// 								M A N E J O   D E   A R C H I V O S
//******************************************************************************************
//Sustituye el file_get_contents
//para regresar el tamaño de Archivo
function file_get_contents_old($filename, $use_include_path = 0) 
{
   $data = ""; // just to be safe. Dunno, if this is really needed
   $file = @fopen($filename, "rb", $use_include_path);
   if ($file) {
     while (!feof($file)) $data .= fread($file, 1024);
     fclose($file);
   }
   return $data;
}
// Lee el Archivo de coordenadas dado
// un ARCHIVO
function lee_coordenadas($archivo)
{
   $coord = array();                //Arreglo de Coordenadas
   $num_coordenadas = 0; 
   $contents="";
   $filename = $archivo;
   $fd = fopen ($filename, "r");
   
   if($fd){ 
     while(!feof($fd)) 
     { 
        $renglon = fgets($fd, 2048);    //Lee un renglon a la Vez
        $c_inicio = substr($renglon , 0, 2);  //Guarda los 2 primeros caracteres

		if (($c_inicio<>"//") and (substr($c_inicio,0,1)<>';'))  //Lee el archivo de coordenadas
		{  
		   if (trim($renglon)<>"") 
		   {
		      //Aqui comienzan las coordenadas del MARCO
  		      $num_coordenadas = $num_coordenadas + 1;
              $pos_coma = strrpos($renglon, ",");     							//Busca la coma
              $coord[$num_coordenadas] = trim(substr($renglon, 0, $pos_coma)); 		//Guarda la X

		      $num_coordenadas = $num_coordenadas + 1;
              $coord[$num_coordenadas] = trim(substr($renglon, $pos_coma+1, strlen($renglon)-$pos_coma)); 	//Guarda la Y

      	   }   
		   //$contents = $contents.$renglon."<br>";    //Lee un renglon a la Vez
	  	} else { 
		   //Solo son comentarios
		}

     }  
   }    
   //$contents = fread ($fd, filesize ($filename));
   fclose ($fd);
   return $coord;
}


// Regresa el Tamaño del Archivo Remoto
function RemoteFileSize($remote_file)
{
   //phpinfo();
   echo $remote_file;

if (!function_exists("file_get_contents")) {
   $file = file_get_contents_old($remote_file);    
} else {
   $file = file_get_contents($remote_file);
}  
   return strlen($file);
} 


// returns true if folder is empty or not existing
// false if folde is full
function is_emtpy_folder($folder){
   if(is_dir($folder) ){
       $handle = opendir($folder);
       while( (gettype( $name = readdir($handle)) != "boolean")){
               $name_array[] = $name;
       }
       foreach($name_array as $temp)
           $folder_content .= $temp;

       if($folder_content == "...")
           return true;
       else
           return false;
       
       closedir($handle);
   }
   else
       return true; // folder doesnt exist
}

//******************************************************************************************
// Crea un Directorio
function mkdirs($dirname) //mkdir
{  $path="";
   $dir=split("/", $dirname);
   for ($i=0;$i<count($dir);$i++)
   {
       $path.=$dir[$i]."/";
       if (!is_dir($path))
       @mkdir($path,0777);
       @chmod($path,0777);
   }
   if (is_dir($dirname))
       return 1;
} 

//******************************************************************************************
// Elimina un DIRECTORIO Y su CONTENIDO
function deldir($dir){
  $current_dir = opendir($dir);
  while($entryname = readdir($current_dir)){
     if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!="..")){
       deldir("${dir}/${entryname}");
     }elseif($entryname != "." and $entryname!=".."){
       unlink("${dir}/${entryname}");
     }
  }
  closedir($current_dir);
  rmdir(${dir});
}

//******************************************************************************************
// Elimina el CONTENIDO de un directorio
function delete_all_from_dir($Dir){
       // delete everything in the directory
       if      ($handle = @opendir($Dir)) {
               while  (($file = readdir($handle)) !== false) {
                       if      ($file == "." || $file == "..") {
                               continue;
                       }
                       if      (is_dir($Dir.$file)){
                               // call self for this directory
                               delete_all_from_dir($Dir.$file."/");
                               chmod($Dir.$file,0777);
                               rmdir($Dir.$file); //remove this directory
                       }else  {
                               chmod($Dir.$file,0777);
                               unlink($Dir.$file); // remove this file
                       }
               }
       }
       @closedir($handle);
} 
//******************************************************************************************
// Muestra el contenido de un directorio y regresa la lista en un ARREGLO

function muestra_contenido_dir($directorio)
{
   if ($id_dir = opendir($directorio)){
       while (false !== ($archivo = readdir($id_dir))){
           if ($archivo != "." && $archivo != ".."){
               if(is_dir($directorio.$archivo)){
                   $resultado[$archivo] = akelos_recursive_dir($directorio.$archivo."/");
               }
               else{
                   $resultado[] = $archivo;
               }
           }
       }
       closedir($id_dir);
   }
   
   return $resultado;
} 

//******************************************************************************************
// Borra un Archivo dado un DIRECTORIO y WILDCARDS como * y ?

/*
 * @Name: unlink_wc($dir,$pattern)
 * @Description: A unlink function that support wildcards ( * and ? )
 * (based on code taked from php.net manual comments)
 * @Author: Pablo Rosciani [ pabloATnkstudiosDOTnet ] [ http://pi.nks.com.ar ]
 * @Date: 15/10/03
 * @param string $dir      Directory to search files
 * @param string $pattern  Pattern to find.
 *
 * Uso unlink_wc("/path/to/folder/","*.*");
 */

function unlink_wc($dir, $pattern){
   if ($dh = opendir($dir)) { 
       
       //List and put into an array all files
       while (false !== ($file = readdir($dh))){
           if ($file != "." && $file != "..") {
               $files[] = $file;
           }
       }
       closedir($dh);
       
       
       //Split file name and extenssion
       if(strpos($pattern,".")) {
           $baseexp=substr($pattern,0,strpos($pattern,"."));
           $typeexp=substr($pattern,strpos($pattern,".")+1,strlen($pattern));
       }else{ 
           $baseexp=$pattern;
           $typeexp="";
       } 
       
       //Escape all regexp Characters 
       $baseexp=preg_quote($baseexp); 
       $typeexp=preg_quote($typeexp); 
       
       // Allow ? and *
       $baseexp=str_replace(array("\*","\?"), array(".*","."), $baseexp);
       $typeexp=str_replace(array("\*","\?"), array(".*","."), $typeexp);
       
       //Search for pattern match
       $i=0;
       foreach($files as $file) {
           $filename=basename($file);
           if(strpos($filename,".")) {
               $base=substr($filename,0,strpos($filename,"."));
               $type=substr($filename,strpos($filename,".")+1,strlen($filename));
           }else{
               $base=$filename;
               $type="";
           }
       
           if(preg_match("/^".$baseexp."$/i",$base) && preg_match("/^".$typeexp."$/i",$type))  {
               $matches[$i]=$file;
               $i++;
           }
       }
       
       while(list($idx,$val) = each($matches)){
           if (substr($dir,-1) == "/"){
               unlink($dir.$val);
           }else{
               unlink($dir."/".$val);
           }
       }
       
   }
}

//******************************************************************************************
// Muestra el PRIMER Elemento de un ARREGLO de archivos sin Contar con Thumbs.db

function primer_archivo($arreglo_archivos) 
{
   if (sizeof($arreglo_archivos)>0) {   //Si tiene archivos
      for($i=0; $i < sizeof($arreglo_archivos); $i++)
      {
        if ($arreglo_archivos[$i]<>"Thumbs.db") 
		  {$primer_archivo_encontrado=$arreglo_archivos[$i];
		   return $primer_archivo_encontrado;
		  }
      }
	  return " ";
   }
   return " ";
}

//******************************************************************************************
// Muestra los Directorios Solamente de una ruta Dada

function muestra_direcorios($directorio) 
{
$DirectoriesToScan  = array(realpath($directorio));
$DirectoriesScanned = array();

while (count($DirectoriesToScan) > 0) {
  foreach ($DirectoriesToScan as $DirectoryKey => $startingdir) {
   if ($dir = @opendir($startingdir)) {
     while (($file = readdir($dir)) !== false) {
       if (($file != '.') && ($file != '..')) {
         $RealPathName = realpath($startingdir.'/'.$file);
         if (is_dir($RealPathName)) {
           if (!in_array($RealPathName, $DirectoriesScanned) && !in_array($RealPathName, $DirectoriesToScan)) {
             $DirectoriesToScan[] = $RealPathName;
           $DirList[] = $RealPathName;
           }
         } 
       }
     }
     closedir($dir);
   }
   $DirectoriesScanned[] = $startingdir;
   unset($DirectoriesToScan[$DirectoryKey]);
  }
}

$DirList = array_unique($DirList);
sort($DirList);

foreach ($DirList as $dirname) {
  echo $dirname."<br>";
}

}

//******************************************************************************************
// 								M A T E M A T I C O S
//******************************************************************************************
function numero_paginas($total_datos, $datos_por_pagina) {
$cociente=intval($total_datos/$datos_por_pagina);
$residuo=$total_datos%$datos_por_pagina;

  if ($cociente==0) {
     return 1;
  } else {
    $pagina=$cociente;

    if ($residuo>0) {
      $pagina=$pagina + 1;
    }
	return $pagina;
  }
}


//echo formatea_fecha_correcta('1/1/2004');
//echo formatea_nombre_sin_espacios("esli efrain martinez rios.jpg")

//$cord = array();
//$cord=lee_coordenadas('E:/Inetpub/wwwroot/nagoya/marcos/categoria1/001 Green frame h.position');
//    echo "datos--> ".count($cord)."<br>";
//      for($i=1; $i <= count($cord); $i++)
//      {
//	    echo "coordenada=".$cord[$i]."<br>";
//	  }

//echo lee_coordenadas(formatea_nombre_sin_espacios('E:/Inetpub/wwwroot/nagoya/marcos/categoria1/hola.txt'));
?>