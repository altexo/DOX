function raiz(id,start,end,title,status,sql)
{
	var mes_inicio = new Array();
	var mes_final = new Array();
	
	var hora_inicio = obtener_hora(start.substring(16,24));
	var hora_final = obtener_hora(end.substring(16,24));
			
	mes_inicio = obtener_mes(start.substring(4,7));
	mes_final = obtener_mes(end.substring(4,7));
	
	var objeto_final = new Array();
	
	objeto_final.id = id;
	objeto_final.inicio = start.substring(11,15)+"/"+mes_inicio.num+"/"+start.substring(8,10);
	objeto_final.fin = 	end.substring(11,15)+"/"+mes_final.num+"/"+end.substring(8,10);
	objeto_final.hinicio = hora_inicio;
	objeto_final.hfinal = hora_final;
	objeto_final.titulo = title;
	objeto_final.status = status;
	objeto_final.sql = sql; 
	
	consulta_ajax(objeto_final.id,objeto_final.inicio,objeto_final.fin,objeto_final.hinicio,objeto_final.hfinal,objeto_final.titulo,objeto_final.status,objeto_final.sql);
}

function obtener_mes(m){
	// en esta funcion se recibe el mes en ingles y letra... y se regresa un array con los distintos formatos de mes
	var meses = new Array();

	switch(m)
	{
		case "Jan":
		meses.es = "Enero";
		meses.esmin = "Ene";
		meses.num = 1;
		
		break;
		
		case "Feb":
		meses.es = "Febrero";
		meses.esmin = "Feb";
		meses.num = 2;
		
		break;
		
		case "Mar":
		meses.es = "Marzo";
		meses.esmin = "Mar";
		meses.num = 3;
		
		break;

		case "Apr":
		meses.es = "Abril";
		meses.esmin = "Abr";
		meses.num = 4;
		
		break;
		
		case "May":
		meses.es = "Mayo";
		meses.esmin = "May";
		meses.num = 5;
		
		break;
		
		case "Jun":
		meses.es = "Junio";
		meses.esmin = "Jun";
		meses.num = 6;
		
		break;
		
		case "Jul":
		meses.es = "Julio";
		meses.esmin = "Jul";
		meses.num = 7;
		
		break;
		
		case "Aug":
		meses.es = "Agosto";
		meses.esmin = "Ago";
		meses.num = 8;
		
		break;
		
		case "Sep":
		meses.es = "Septiembre";
		meses.esmin = "Sep";
		meses.num = 9;
		
		break;
		
		case "Oct":
		meses.es = "Octubre";
		meses.esmin = "Oct";
		meses.num = 10;
		
		break;
		
		case "Nov":
		meses.es = "Noviembre";
		meses.esmin = "Nov";
		meses.num = 11;
		
		break;
		
		case "Dec":
		meses.es = "Diciembre";
		meses.esmin = "Dic";
		meses.num = 12;
		
		break;
		
		
	}

	return meses;
	
}

function obtener_dia(d)
{
	// aqui se recibe el dia en ingles y de tres letras y se regresa un array con los distintos formatos de dia.
	var dias = new Array();

	switch(d)
	{
		case "Mon":
		dias.es = "Lunes";
		dias.esmin = "Lun";
		dias.num = 1;
		
		break;
	
		case "Tue":
		dias.es = "Martes";
		dias.esmin = "Mar";
		dias.num = 2;
	
		break;
		
		case "Wed":
		dias.es = "Miercoles";
		dias.esmin = "Mie";
		dias.num  = 3;
		
		break;
		
		case "Thu":
		dias.es = "Jueves";
		dias.esmin = "Jue";
		dias.num = 4;
		
		break;
		
		
		case "Fri":
		dias.es = "Viernes";
		dias.esmin = "Vie";
		dias.num = 5;
		
		break;
		
		case "Sat":
		dias.es = "Sabado";
		dias.esmin = "Sab";
		dias.num = 6;
		
		break;
		
		case "Sun":
		dias.es = "Domingo";
		dias.esmin = "Dom";
		dias.num = 7;
		
		break;
		
	}
	
	return dias;
}


function obtener_hora(h)
{
	var horas = new Array();
	var horas = h.split(":");
	var hora_final = horas[0]+":"+horas[1];
	return hora_final;	
}

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

function consulta_ajax(a,s,d,f,g,h,j,k)
{
	// Aqui se hace la consulta AJAX
	
	var url = 'consulta.php?id='+a+'&inicio='+s+'&final='+d+'&hinicio='+f+'&hfinal='+g+'&titulo='+h+'&status='+j+'&sql='+k;
	ajax  =  objetoAjax();
	ajax.open("GET",url,true);
	ajax.onreadystatechange=function() {
	
			if(ajax.readyState==4){
			
				
			
			}
	}

	ajax.send(null)
	
}

function consulta_ajax_eliminar(d)
{
	//Aqui se hace la funcion ajax para cuando se va a eliminar
	var url = 'eliminar.php?id='+d;
	ajax = objetoAjax();
	ajax.open("GET",url,true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
		
		
		}
		
		
	}
	
	ajax.send(null);

}


