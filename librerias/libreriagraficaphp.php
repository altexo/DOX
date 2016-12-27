<?php
include_once "libreriasphp.php";
// *********************************************************************************
// ************** L I B R E R I A S   G R A F I C A S   D E   P H P   **************
// *********************************************************************************

// *********************************************************************************
//  NOTA: USA LA LIBRERIA LIBRERIASPHP
// *********************************************************************************

// *********************************************************************************
//          MUESTRA UN THUMBNAIL Y MUESTRA LA FOTO EN UNA VENTANA POP UP
// *********************************************************************************
function show_thumbnail_liga($file,$max)
{
  // $file -----> Ruta del Archivo
  // $max ------> Tamaño máximo en Pixeles
  
  // $max = 150; // Max. thumbnail width and height

   $size = getimagesize($file);
   // $size[0] = Anchura de la imagen en Pixeles
   // $size[1] = Altura de la imagen en Pixeles
   // $size[2] = Tipo de Imagen ---> 1 = GIF , 2 = JPG, 3 = PNG
   // $size[3] = String ---> height=xxx width=xxx para ser usado en marca IMG

   if ( $size[0] <= $max && $size[1] <= $max )
   {
       $ret = '<img src="'.$file.'" '.$size[3].' border="0">';
   }
   else
   {
       $k = ( $size[0] >= $size[1] ) ? $size[0] / $max : $size[1] / $max;
       $ret = '<a href="javascript:;" onClick="window.open(\'foto.php?img=';
       $ret .= $file.'\',\'\',\'width='.$size[0];
       $ret .= ',height='.$size[1].'\')">';
       $ret .= '<img src="'.$file.'" width="'.floor($size[0]/$k).'" height="'.floor($size[1]/$k).'" border="0" alt="View full-size image"></a>'."<br>".$size[0]." x ".$size[1];
   }

   return $ret;
}

// *********************************************************************************
//                          G E N E R A   U N   T H U M B N A I L   
// *********************************************************************************

function thumbnail($image_path,$thumb_path,$image_name,$thumb_width,$thumb_h) 
{ 
    $src_img = imagecreatefromjpeg("$image_path/$image_name"); 
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
	
	//Nuevo
   if ( $origw <= $thumb_width && $origh <= $thumb_h )
   {   //Si la foto es mas pequeña que la dimension dada, queda igual
    $new_w = $origw; 
	$new_h = $origh; 
   }
   else
   {   //Si la Foto es mas grande, escala con el valor de la dimension dada como maximo
       $k = ( $origw >= $origh ) ? $origw / $thumb_width : $origh / $thumb_h;
       $new_w = $origw/$k; 
	   $new_h = $origh/$k; 
   }
	
	//Nuevo
    //-->$new_w = $thumb_width; 
    //$diff=$origw/$new_w; 
    //$new_h=$new_w; 
	//-->$new_h=round(($new_w*$origh)/$origw); 
    $dst_img = imagecreatetruecolor($new_w,$new_h); 
	
//	for($i=0; $i<256; $i+=2)
//       imagecolorallocate($dst_img , $i, $i, $i);

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 

    imagejpeg($dst_img, "$thumb_path/$image_name"); 
    return true; 
}

// *********************************************************************************
//               G E N E R A   U N   T H U M B N A I L  2    J P G
// *********************************************************************************

function crea_thumbnail($image_path,$image_name,$thumb_name,$thumb_width,$thumb_h) 
{ 
    $src_img = imagecreatefromjpeg("$image_path/$image_name"); 
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
	
	//Nuevo
   if ( $origw <= $thumb_width && $origh <= $thumb_h )
   {   //Si la foto es mas pequeña que la dimension dada, queda igual
    $new_w = $origw; 
	$new_h = $origh; 
   }
   else
   {   //Si la Foto es mas grande, escala con el valor de la dimension dada como maximo
       $k = ( $origw >= $origh ) ? $origw / $thumb_width : $origh / $thumb_h;
       $new_w = $origw/$k; 
	   $new_h = $origh/$k; 
   }
	
    $dst_img = imagecreatetruecolor($new_w,$new_h); 

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 

    imagejpeg($dst_img, "$image_path/$thumb_name"); 
    return true; 
}

// *********************************************************************************
//               G E N E R A   U N   T H U M B N A I L   G I F
// *********************************************************************************

function crea_thumbnail_gif($image_path,$image_name,$thumb_name,$thumb_width) 
{ 
    $src_img = imagecreatefromgif("$image_path/$image_name"); 
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
	
	//Nuevo
   if ( $origw <= $thumb_width && $origh <= $thumb_width )
   {   //Si la foto es mas pequeña que la dimension dada, queda igual
    $new_w = $origw; 
	$new_h = $origh; 
   }
   else
   {   //Si la Foto es mas grande, escala con el valor de la dimension dada como maximo
       $k = ( $origw >= $origh ) ? $origw / $thumb_width : $origh / $thumb_width;
       $new_w = $origw/$k; 
	   $new_h = $origh/$k; 
   }
	
    $dst_img = imagecreatetruecolor($new_w,$new_h); 

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 

    imagegif($dst_img, "$image_path/$thumb_name"); 
    return true; 
}

// *********************************************************************************
//               G E N E R A   U N   T H U M B N A I L   P N G
// *********************************************************************************

function crea_thumbnail_png($image_path,$image_name,$thumb_name,$thumb_width) 
{ 
    $src_img = imagecreatefrompng("$image_path/$image_name"); 
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
	
	//Nuevo
   if ( $origw <= $thumb_width && $origh <= $thumb_width )
   {   //Si la foto es mas pequeña que la dimension dada, queda igual
    $new_w = $origw; 
	$new_h = $origh; 
   }
   else
   {   //Si la Foto es mas grande, escala con el valor de la dimension dada como maximo
       $k = ( $origw >= $origh ) ? $origw / $thumb_width : $origh / $thumb_width;
       $new_w = $origw/$k; 
	   $new_h = $origh/$k; 
   }
	
    $dst_img = imagecreatetruecolor($new_w,$new_h); 

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 

    imagepng($dst_img, "$image_path/$thumb_name"); 
    return true; 
}

// *********************************************************************************
//                          G E N E R A   U N   T H U M B N A I L  2
// *********************************************************************************

function crea_thumbnail_fotografia_marco($image_path,$image_name,$thumb_name,$thumb_width,$thumb_lenght) 
{ 
    $src_img = imagecreatefromjpeg("$image_path/$image_name"); 
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
	
    $dst_img = imagecreatetruecolor($thumb_width,$thumb_lenght); 

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_width,$thumb_lenght,imagesx($src_img),imagesy($src_img)); 

    imagejpeg($dst_img, "$image_path/$thumb_name"); 
    return true; 
}


// *********************************************************************************
//                     M U E S T R A   U N   T H U M B N A I L  
// *********************************************************************************

function show_thumbnail($file,$max)
{
  // $file -----> Ruta del Archivo
  // $max ------> Tamaño máximo en Pixeles
  
  // $max = 150; // Max. thumbnail width and height
   $size = getimagesize($file);
   // $size[0] = Anchura de la imagen en Pixeles
   // $size[1] = Altura de la imagen en Pixeles
   // $size[2] = Tipo de Imagen ---> 1 = GIF , 2 = JPG, 3 = PNG
   // $size[3] = String ---> height=xxx width=xxx para ser usado en marca IMG

   if ( $size[0] <= $max && $size[1] <= $max )
   {   
       $ret = '<img src="'.$file.'" '.$size[3].' border="0">';
   }
   else
   {
       $k = ( $size[0] >= $size[1] ) ? $size[0] / $max : $size[1] / $max;
       $ret = '<img src="'.$file.'" width="'.floor($size[0]/$k).'" height="'.floor($size[1]/$k).'" border="0" alt="View full-size image">';
   }

   return $ret;
}

// *********************************************************************************
//                     GENERA UNA IMAGEN DE X x Y en un color dado
// *********************************************************************************
function crea_imagen_color($nombre_ruta,$x, $y, $cr,$cv,$ca)
{
   $imagen_nueva=imagecreate($x,$y);   //crea el fondo
   $col1=imagecolorallocate($imagen_nueva,$cr,$cv,$ca);   //asigna el color blanco
   imagejpeg($imagen_nueva,$nombre_ruta); 
   imagedestroy($imagen_nueva); 
   return true;
}

// *********************************************************************************
//           RECALCULA LA COORDENADA X o Y para CENTRARLA dentro de un marco
// *********************************************************************************
// Formula --->  Xf=Xi+[(am/2)-(af/2)]
// $xy = coordenada X o Y Inicial 
// $am = Ancho o Alto del Marco
// $af = Ancho o Alto de la Fotografia
function calcula_eje_inicial($xy,$am,$af)
{
   $xyf=$xy+(($am/2)-($af/2));
   //echo "Resultado de Eje Inicial ->".$xyf."<br>"; 
   $ent=numero_entero($xyf);               //Regresa el valor en parte entera
   //echo "abajo de calcula eje inicial en parte entera-->".$ent."<br>";
   return $ent;
}

// *********************************************************************************
//                              CALCULA AREA DE UN MARCO EN ARRAY
// *********************************************************************************
// $x1 = 
// $y1 = 
// $x2= 
// $y2= 
function calcula_area_marco($x1,$y1,$x2,$y2) {
   $area_marco = array();
   $area_marco[0] = $x2-$x1;
   $area_marco[1] = $y2-$y1;
   return $area_marco;                 
}

// *********************************************************************************
//                              Recalcula un Punto XY en base a una razon
// *********************************************************************************
// $ancho_fg = Ancho de la Foto Original
// $largo_fg = Largo de la Foto Original
// $ancho_fm = Ancho de la Foto Mediana
// $largo_fm = Largo de la Foto Mediana
// $x = Coordenada en X
// $y = Coordenada en Y
function escala_punto_xy($ancho_fg,$largo_fg,$ancho_fm,$largo_fm,$x,$y) {
   $punto_reescalado = array();
   $razon1 = $ancho_fm/$ancho_fg;
   $razon2 = $largo_fm/$largo_fg;
   
   if ($razon1 > $razon2) 
    {  $punto_reescalado[0] = numero_entero($x*$razon1);
	   $punto_reescalado[1] = numero_entero($y*$razon1);
    } else {
   	   $punto_reescalado[0] = numero_entero($x*$razon2);
	   $punto_reescalado[1] = numero_entero($y*$razon2);
	}
   return $punto_reescalado;                 
}

// *********************************************************************************
//                              ESCALA LA FOTOGRAFIA CON RAZON EN X O Y
// *********************************************************************************
// $nombre_foto = Nombre de la Fotografia a Escalar
// $axf = Ancho de la Foto
// $ayf = Alto de la Foto
// $axm = Ancho del Marco
// $aym = Alto del Marco

function escala_foto_para_marco_coordenadas($axf,$ayf,$axm,$aym)
{  $coordenadas_escala_fotografia=array();
  if ($axf>=$ayf)      // Si la foto es mas ANCHA o IGUAL en X
    {
	   $rx=$axm/$axf;
	   $ry=$aym/$ayf;

	   //Busca la MENOR RAZON para sacar calculos
	   if ($rx<$ry)     //La razon en X es MENOR que en Y
	   {  $ax=$axm;   
   	      $ay=numero_entero($ayf*$rx);
	   } else {
   	      $ax=numero_entero($axf*$ry);
   	      $ay=$aym;
	   }
	}
  else                 // Si la foto es mas ALTA en Y
    {  
	   $rx=$axm/$axf;
	   $ry=$aym/$ayf;
	   
	   //Busca la MENOR RAZON para sacar calculos
	   if ($rx<$ry)     //La razon en X es MENOR que en Y
	   {  $ax=$axm;   
   	      $ay=numero_entero($ayf*$rx);
	   } else {
   	      $ax=numero_entero($axf*$ry);
   	      $ay=$aym;
	   }
    }
	$coordenadas_escala_fotografia[0]=$ax;
	$coordenadas_escala_fotografia[1]=$ay;
	
	return $coordenadas_escala_fotografia;
}
// *********************************************************************************
//                              Obtiene info de URL remoto
// *********************************************************************************
function getimagesize_remote($image_url) {
   $count = 0;
   $handle = fopen ($image_url, "rb");
   $contents = "";
   if ($handle) {
   do {
       $count += 1;
       $data = fread($handle, 8192);
       if (strlen($data) == 0) {
           break;
       }
   $contents .= $data;
   } while(true);
   } else { return false; }
   fclose ($handle);

   $im = imagecreatefromstring($contents);
   if (!$im) { return false; }
   $gis[0] = ImageSX($im);
   $gis[1] = ImageSY($im);
// array member 3 is used below to keep with current getimagesize standards
   $gis[3] = "width={$gis[0]} height={$gis[1]}";
   imagedestroy($im);
   return $gis;
}

//echo show_thumbnail("../usuarios_registrados/esli/album1/10048718.jpg",80);
//echo show_thumbnail_liga("http://www.triangulostudios.com/nagoya/usuarios_registrados/esli/album/217442.jpg",300);

//echo show_thumbnail("http://www.triangulostudios.com/nagoya/usuarios_registrados/jeber/fotospersonales/Imagen%20054.jpg",300);

//$datos=getimagesize_remote("http://www.triangulostudios.com/nagoya/usuarios_registrados/jeber/fotospersonales/Imagen%20054.jpg");
//echo "Ancho = ".$datos[0]."<br>";
//echo "Largo = ".$datos[1]."<br>";
//echo "Datos = ".$datos[3]."<br>";

//$area=calcula_area_marco(164,148,528,684);
//echo "x=".$area[0]." - "."y=".$area[1]."<br>";
//echo calcula_eje_inicial(0,10,2)."<br>";
//$area=escala_foto_para_marco("nada",600,865,364,536);
//echo "x=".$area[0]." - "."y=".$area[1]."<br>";
//$area=escala_foto_para_marco("nada",865,600,520,380);
//echo "x=".$area[0]." - "."y=".$area[1]."<br>";

?>
