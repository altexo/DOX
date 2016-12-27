  /**
 * @author Ivan
 */
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function editor2()
{
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		editor_selector : "mceEditor", 
		editor_deselector : "mceNoEditor", 
		extended_valid_elements : "iframe[src|width|height|name|align]",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : 
"bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontsizeselect",
		theme_advanced_buttons2 : "bullist,numlist,|,image",
		theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		cleanup_on_startup : true,
		cleanup: true,


		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
}

function mostrar_art()
{
	divResult2 = document.getElementById('iframe');
	art=document.getElementById('art').value;
	divResult2.innerHTML =''; //Muestra algo mientras se carga la página, en este caso nada.
	ajax=objetoAjax();
	
		ajax.open("POST", "noticia_mod.php", true); 
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
			editor2()
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("art="+art)
}


function alinear(a, t, letra, pag)
{
	//star=document.getElementById("star3").value;
	divResult2 = document.getElementById('cuerpo');
	
     if(a=='asc')
	 {
		 a2='desc';
	 }
	 else
	 {
		 a2='asc';
	 }
	
	
	//instanciamos el objetoAjax
		ajax=objetoAjax();
		//usamos el medoto POST
		//archivo que realizará la operacion
		//datoscliente.php
		ajax.open("POST","noticias_tabla.php" ,true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResult2.innerHTML = ajax.responseText
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		//enviando los valores
		ajax.send("a2="+a2+"&t="+t+"&let="+letra+"&pag="+pag)
		
}

function alinear2(a, t, letra, pag)
{
	//star=document.getElementById("star3").value;
	divResult2 = document.getElementById('cuerpo');
	
     if(a=='asc')
	 {
		 a2='desc';
	 }
	 else
	 {
		 a2='asc';
	 }
	
	
	//instanciamos el objetoAjax
		ajax=objetoAjax();
		//usamos el medoto POST
		//archivo que realizará la operacion
		//datoscliente.php
		ajax.open("POST","noticias_tabla.php" ,true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResult2.innerHTML = ajax.responseText
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		//enviando los valores
		ajax.send("a2="+a2+"&t="+t+"&let="+letra+"&pag="+pag)
		
}
function alinear4(a, t, letra, pag)
{
	//star=document.getElementById("star3").value;
	divResult2 = document.getElementById('cuerpo');
	
     if(a=='asc')
	 {
		 a2='desc';
	 }
	 else
	 {
		 a2='asc';
	 }
	
	
	//instanciamos el objetoAjax
		ajax=objetoAjax();
		//usamos el medoto POST
		//archivo que realizará la operacion
		//datoscliente.php
		ajax.open("POST","noticias_tabla.php" ,true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResult2.innerHTML = ajax.responseText
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		//enviando los valores
		ajax.send("a2="+a2+"&t="+t+"&let="+letra+"&pag="+pag)
		
}


function pag_let(letra)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
//		let=document.getElementById('letra').value;		
	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("let="+letra)
	
}

function pag_let2(letra)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
//		let=document.getElementById('letra').value;		
	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("let="+letra)
	
}

function pag_let4(letra)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
//		let=document.getElementById('letra').value;		
	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("let="+letra)
	
}

function numer(letr)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
		pag=document.getElementById('pg').value;		
	divResult2.innerHTML ="<img src='img/orange.gif' alt='Cargando...'>";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("pag="+pag+"&let="+letr)
	
}

function numer2(letr)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
		pag=document.getElementById('pg').value;		
	divResult2.innerHTML ="<img src='img/orange.gif' alt='Cargando...'>";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("pag="+pag+"&let="+letr)
	
}
function numer4(letr)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
		pag=document.getElementById('pg').value;		
	divResult2.innerHTML ="<img src='img/orange.gif' alt='Cargando...'>";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("pag="+pag+"&let="+letr)
	
}


function borr(id)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
		
	if(confirm("¿Está seguro de Borrar el producto?"))	
	{
	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("borrar="+id)
	}
}

function borr2(id)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
		
	if(confirm("¿Está seguro de Borrar al Cliente?"))	
	{
	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("borrar="+id)
	msj_borr_clien();
	}
}

function borr4(id)//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('cuerpo');
		
	if(confirm("¿Está seguro de Borrar al Cliente?"))	
	{
	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "noticias_tabla.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("borrar="+id)
	msj_borr_clien();
	}
}

function ChequearTodos(chkbox) 
{ 
for (var i=0;i < document.forms["form1"].elements.length;i++) 
{ 
var elemento = document.forms[0].elements[i]; 
if (elemento.type == "checkbox") 
{ 
elemento.checked = chkbox.checked 
} 
} 
} 

function cmp(id)//muestra combobox donde se ponen todas las peliculas

{
	if(id=='cmp1')
	{
		v1=document.getElementById('v1').value;
		v1_b=document.getElementById('v1_b').value;
		
	document.getElementById(id).style.display=v1;
	document.getElementById(id).style.visibility=v1_b;
	
	if(v1=='block')
	{
	document.getElementById('v1').value='none';
	document.getElementById('v1_b').value='hidden';
	}
	else
	{
	document.getElementById('v1').value='block';
	document.getElementById('v1_b').value='visible';
		}
	}

	if(id=='cmp2')
	{
		v2=document.getElementById('v2').value;
		v2_b=document.getElementById('v2_b').value;
		
	document.getElementById(id).style.display=v2;
	document.getElementById(id).style.visibility=v2_b;
	
	if(v2=='block')
	{
	document.getElementById('v2').value='none';
	document.getElementById('v2_b').value='hidden';
	}
	else
	{
	document.getElementById('v2').value='block';
	document.getElementById('v2_b').value='visible';
		}
	}

	if(id=='cmp3')
	{
		v3=document.getElementById('v3').value;
		v3_b=document.getElementById('v3_b').value;
		
	document.getElementById(id).style.display=v3;
	document.getElementById(id).style.visibility=v3_b;
	
	if(v3=='block')
	{
	document.getElementById('v3').value='none';
	document.getElementById('v3_b').value='hidden';
	}
	else
	{
	document.getElementById('v3').value='block';
	document.getElementById('v3_b').value='visible';
		}
	}


	}

function subcat()//muestra combobox donde se ponen todas las peliculas

{
	
	divResult2 = document.getElementById('sc');
	cat = document.getElementById('id_cat').value;
		

	divResult2.innerHTML ="";
//instanciamos el objetoAjax
	var ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "index_s3_productos_nuevo_cambios.php",true);
		ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("cat="+cat)
	}

function msj_Exito()
{
	alert("Su producto fue guardado");
}

function msj_NoExito()
{
	alert("Su producto no fue guardado");
}
function msj_Exito2()
{
	alert("La información Institucional fue guardada exitosamente");
}

function msj_NoExito2()
{
	alert("La información Institucional no fue guardada exitosamente");
}

function msj_borr_clien()
{
	alert("Su Cliente fue Borrado");
}



 function pdesc()//para poder modificar la contraseña del sinapsis 
{ 
	
v1=document.getElementById("precioReal").value;
divprecioTienda = document.getElementById('precioTienda');
divDescuento = document.getElementById('Descuento');
divprecioEnlinea = document.getElementById('precioEnlinea');
v2=document.getElementById("descuentoPrec").value;

	divprecioTienda.innerHTML ="$"+v1;
	
	tot= (Math.floor(v1)*Math.floor(v2))/100;
	
	divDescuento.innerHTML ="$"+tot;
	
	tot2=Math.floor(v1)-tot;
	
	divprecioEnlinea.innerHTML ="$"+tot2;

	
//document.getElementById("precioMG").value=tot2;
} 

function env(id)//muestra combobox donde se ponen todas las peliculas

{ 
		v1=document.getElementById('en1').value;
		v1_b=document.getElementById('en2').value;
		
	document.getElementById(id).style.display=v1;
	document.getElementById(id).style.visibility=v1_b;
	
	if(v1=='block')
	{
	document.getElementById('v1').value='none';
	document.getElementById('v1_b').value='hidden';
	}
	else
	{
	document.getElementById('v1').value='block';
	document.getElementById('v1_b').value='visible';
		}
	}

	
function DatoRadio(activo) //esta funcion la copie en otro sitio
{
    for(i=0;i<activo.length;i++)
        if(activo[i].checked) return activo[i].value;
}

	function inventarioFisico()//muestra combobox donde se ponen todas las peliculas

{ 
	cmp1=DatoRadio(document.form1.ubicacionProd);
		alert(cmp1)
if(cmp1=='En Inventario Físico')
{
	document.getElementById('almacen').value='none';
	document.getElementById('almacen').value='hidden';
}
else
{
	document.getElementById('almacen').value='block';
	document.getElementById('almacen').value='visible';
	}
	}

	

	function vnt(id)//muestra combobox donde se ponen todas las peliculas

{
	if(id=='ven1')
	{
		v1=document.getElementById('v1').value;
		v1_b=document.getElementById('v1_b').value;
		
	document.getElementById(id).style.display=v1;
	document.getElementById(id).style.visibility=v1_b;
	
	if(v1=='block')
	{
	document.getElementById('v1').value='none';
	document.getElementById('v1_b').value='hidden';
	}
	else
	{
	document.getElementById('v1').value='block';
	document.getElementById('v1_b').value='visible';
		}
	}

	if(id=='ven2')
	{
		v2=document.getElementById('v2').value;
		v2_b=document.getElementById('v2_b').value;
		
	document.getElementById(id).style.display=v2;
	document.getElementById(id).style.visibility=v2_b;
	
	if(v2=='block')
	{
	document.getElementById('v2').value='none';
	document.getElementById('v2_b').value='hidden';
	}
	else
	{
	document.getElementById('v2').value='block';
	document.getElementById('v2_b').value='visible';
		}
	}

	if(id=='ven3')
	{
		v3=document.getElementById('v3').value;
		v3_b=document.getElementById('v3_b').value;
		
	document.getElementById(id).style.display=v3;
	document.getElementById(id).style.visibility=v3_b;
	
	if(v3=='block')
	{
	document.getElementById('v3').value='none';
	document.getElementById('v3_b').value='hidden';
	}
	else
	{
	document.getElementById('v3').value='block';
	document.getElementById('v3_b').value='visible';
		}
	}
	if(id=='regis')
	{
		v3=document.getElementById('r').value;
		v3_b=document.getElementById('r_b').value;
		
	document.getElementById(id).style.display=v3;
	document.getElementById(id).style.visibility=v3_b;
	
	if(v3=='block')
	{
	document.getElementById('r').value='none';
	document.getElementById('r_b').value='hidden';
	}
	else
	{
	document.getElementById('r').value='block';
	document.getElementById('r_b').value='visible';
		}
	}


	}
