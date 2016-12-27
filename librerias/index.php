<? 
include("librerias/conexion.php");
	conectar();
	//Buscar la Última noticia.
	$sql = mysql_query("SELECT * FROM noticias ORDER BY id ");//DESC limit 3
	//$row = mysql_fetch_array($sql);
	//$num = mysql_num_rows($sql);

	
	//Relacionar la Última noticia con la imagen.
	$sql2 = mysql_query("SELECT * FROM galeria inner join noticias where galeria.id_noticia = noticias.id order by noticias.id ");
	
	
	//Buscar Ãºltimos videos
	//$sql3 = mysql_query("SELECT * FROM video ORDER BY id_video DESC limit 5");
	
	desconectar();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

      <link rel="shortcut icon" href="favicon.ico" >

      <link rel="icon" href="animated_favicon.gif" type="image/gif" >


<style type="text/css">
.slideshow { height: 327px; width: 669px; clear:both; }
.slideshow img { border: 0px solid #ccc; background-color: #eee; }
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$(".toggle_container").hide();

	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});

});
</script>
<!-- include jQuery library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<!-- include Cycle plugin -->
<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'zoom' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escuela Activa Integral</title>
<link href="estilos/activa_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

<script src="js/tooltip.js" type="text/javascript"></script>


<link href="estilos/activa_posiciones.css" rel="stylesheet" type="text/css" />
<link href="estilos/activa_adornos.css" rel="stylesheet" type="text/css" />
<link href="estilos/activa_textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.slideshow {height: 239px; width: 647px; }
.slideshow {height: 239px; width: 647px; }
.slideshow {height: 239px; width: 647px; }


#dhtmltooltip{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
position: absolute;
left: -300px;
width: 150px;
border: 1px solid black;
padding: 2px;
background-color: lightyellow;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}

#dhtmlpointer{
position:absolute;
left: -300px;
z-index: 101;
visibility: hidden;
}


</style>
//Código Google Analitics
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19893855-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> </head>


<body onload="MM_preloadImages('interfaz/nav/images/bt_04.jpg','interfaz/botones/circularesr.jpg','interfaz/botones/calendarior.jpg','interfaz/icons/images/vesp2_01.jpg','interfaz/icons/images/vesp2_02.jpg','interfaz/icons/images/vesp2_03.jpg','interfaz/icons/images/vesp2_04.jpg','interfaz/icons/images/vesp2_05.jpg')">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" class="bg_nav"><?php include("nav.php"); ?></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="992" valign="top" class="bg_content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="678" valign="top" class="margen1">
                
                  <table width="669" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="340" valign="top"><div class="slideshow"> 
                  <img src="interfaz/featured/featured.jpg" width="669" height="327" /> 
                    <img src="interfaz/featured/featured2.jpg" width="669" height="327" />
                    <img src="interfaz/featured/featured3.jpg" width="669" height="327" />
                 
                </div></td>
                    </tr>
                    <tr>
                      <td class="bg_news"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                        <? while($row4= mysql_fetch_array($sql) and $row2 = mysql_fetch_array($sql2))
		   				{
			   
							$img="fotos_noticias/".$row2[2].".jpg";
			   				?>
                          <td width="33%" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="12"></td>
                            </tr>
                            <tr>
                              <td align="center"><a href="noticiacompleta.php?id=<?php echo $row4[0]; ?>"><img src="<?php echo $img; ?>" width="200" height="134" border="0" /></a></td>
                            </tr>
                            <tr>
                              <td height="8" align="left" valign="top"> </td>
                            </tr>
                            <tr>
                              <td align="center" valign="top"><a href="noticiacompleta1.php?id=<?php echo $row4[0]; ?>" class="liga_noticia1"><? echo $row4['titulo'];?></a></td>
                            </tr>
                          </table></td> <? } ?>
                         
                          <td align="center" valign="top">&nbsp;</td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="270"><a href="ecologia.php"><img src="interfaz/banners/b_ecolog.jpg" width="245" height="77" border="0" /></a></td>
                      <td width="270"><a href="alumnossolidarios.php"><img src="interfaz/banners/b_solidarios.jpg" width="245" height="77" border="0" /></a></td>
                      <td><a href="sembrador.php"><img src="interfaz/banners/b_sembrador.jpg" width="123" height="77" border="0" /></a></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p></td>
                <td align="right" valign="top" class="margen2" style="margin-right:0px"><?php include("sub.php"); ?>
               <a href="sembrador.php"></a></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="bg_bottom"><?php include("pie.php"); ?></td>
  </tr>
</table>
</body>
</html>
