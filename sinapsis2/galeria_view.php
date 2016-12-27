<?
include("librerias/conexion.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuevo Doctor</title>

<!--<script type="text/javascript" src="../fecha_prueba/mootools.v1.11.js" ></script>
<script type="text/javascript" src="../fecha_prueba/DatePicker.js" ></script>-->
<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
<script src="../js/jquery-1.3.1.min.js" type="text/javascript" charset="utf-8"></script>
<!--<script type="text/javascript">

// The following should be put in your external js file,
// with the rest of your ondomready actions.

window.addEvent('domready', function(){

	$$('input.DatePicker').each( function(el){
		new DatePicker(el);
	});

});


</script>-->
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
    editor_selector : "mceEditor",
    editor_deselector : "mceNoEditor",
	
      plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
      theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,bullist,numlist",
      theme_advanced_buttons2 : "undo,redo,|,link,unlink,image,code,|,forecolor,backcolor,tablecontrols",
      theme_advanced_buttons3 : "sub,sup,|,fullscreen,attribs,outdent,indent,|,hr,visualaid",
    
      theme_advanced_toolbar_location : "external",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : false
});

function MM_openBrWindow(theURL,winName,features) { //v2.0



  window.open(theURL,winName,features);



}

</script> 


<style type="text/css">
<!--
.oblig {	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
-->
</style>
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
	width:480px; 
	margin-left:10px;
}
label {
	display: block;
	width: 100px;
	float: left;
}
.oblig{
	color:#C00; 
	font-size:16px; 
	margin-left:5px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
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
<style type="text/css">



input.DatePicker{
	display: block;
	width: 60px;
	padding: 3px 3px 3px 24px;
	border: 1px solid #0070bf;
	font-size: 10px;
	background: #fff url(../fecha_prueba/date.gif) no-repeat top left;
	cursor: pointer;
}
input:focus.DatePicker{
	background: #fffce9 url(../fecha_prueba/datefocus.gif) no-repeat top left;
}
.dp_container{
	position:  absolute;
	padding: 0;
	z-index: 500;
}
.dp_cal{
	background-color: #fff;
	border: 1px solid #0070bf;
	position: absolute;
	width: 177px;
	top: 24px;
	left: 0;
	margin: 0px 0px 3px 0px;
}
.dp_cal table{
	width: 100%;
	border-collapse: collapse;
	border-spacing: 0;
}
.dp_cal select{
	margin: 2px 3px;
	font-size: 11px;
}
.dp_cal select option{
	padding: 1px 3px;
}
.dp_cal th,
.dp_cal td{
	width: 14.2857%;
	text-align: center;
	font-size: 11px;
	padding: 2px 0;
}
.dp_cal th{
	border: solid #aad4f2;
	border-width: 1px 0;
	color: #797774;
	background: #daf2e6;
	font-weight: bold;
}
.dp_cal td{
	cursor: pointer;
}
.dp_cal thead th{
	background: #d9eefc;
}
.dp_cal td.dp_roll{
	color: #000;
	background: #fff6bf;
}
 
.dp_hide{
	visibility: hidden;
}
.dp_empty{
	background: #eee;
}
.dp_today{
	background: #daf2e6;
}
.dp_selected{
	color: #fff;
	background: #328dcf;
}



</style>




		<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>


<body>
<p><span class="test3" style="font-weight:bold; margin-left:10px; margin-bottom:10px">VISUALIZAR GALERÍA</span></p>
<form action="insert_doc.php" method="post" enctype="multipart/form-data" name="form1" target="imagen" id="form1" >
  <fieldset style="float:left;">
    <legend></legend>
    <p>
    <label style="width:135">Seleccione un Dr: </label>
  
    <select name="select" id="select">
    </select>
    </p>
    <p>&nbsp;</p>
    <p><label>Portada</label> <label>Imagen 1</label> <label>Imagen 2</label> <label>Imagen 3</label> </p>
    <br />

    <p><img width="96" height="107" /> <img width="96" height="107" /> <img width="96" height="107" /> <img width="96" height="107" /><br />
    </p>
  </fieldset>
</form>

</body>
</html>
<? //} ?>