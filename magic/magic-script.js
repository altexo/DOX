/*
function iniciar_mapa()
{
	var latlng = new google.maps.LatLng(24.80305524434207,-107.40250000009563);
	var myLatLng1 = new google.maps.LatLng(24.80097424414207,-107.41308331489563);
	var myLatLng2 = new google.maps.LatLng(24.80397424434207,-107.41308331489563);
	var myLatLng3 = new google.maps.LatLng(24.80397424434207,-107.40008331489563);
	var myLatLng4 = new google.maps.LatLng(24.80607524434207,-107.40100000009563);
	
	var myLatLng5 = new google.maps.LatLng(24.80305524434207,-107.40100000009563);
	var myLatLng6 = new google.maps.LatLng(24.80305524434207,-107.40250000009563);
	var myLatLng7 = new google.maps.LatLng(24.80385524434207,-107.40250000009563);
	var myLatLng8 = new google.maps.LatLng(24.81389924434207,-107.40250000009563);
	
	

	var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
	
  
  var marcador1 = new google.maps.Marker({
      position: myLatLng1,
      map: map,
	  title:"Doctor 1"
  });
  
 var marcador2 = new google.maps.Marker({
      position: myLatLng2,
      map: map,
	  title:"Doctor 2"
  });
	
	var marcador3 = new google.maps.Marker({
      position: myLatLng3,
      map: map,
	  title:"Doctor 3"
  });
	
	var marcador4 = new google.maps.Marker({
      position: myLatLng4,
      map: map,
	  title:"Doctor 4"
  });
	
	var marcador5 = new google.maps.Marker({
      position: myLatLng5,
      map: map,
	  title:"Doctor 5"
  });
	var marcador6 = new google.maps.Marker({
      position: myLatLng6,
      map: map,
	  title:"Doctor 6"
  });
	var marcador7 = new google.maps.Marker({
      position: myLatLng7,
      map: map,
	  title:"Doctor 7"
  });
	var marcador8 = new google.maps.Marker({
      position: myLatLng8,
      map: map,
	  title:"Doctor 8"
  });
	
 
	
	
	
} */

function placeholder_in(texto,id){
  
  if(document.getElementById(id).value == texto){
              
            document.getElementById(id).value = '';

          }
}


function placeholder_out(texto,id){
  
  if(document.getElementById(id).value ==''){
        
          document.getElementById(id).value  = texto;
      }

}



function login_paciente(){
  
 if(document.getElementById("nombre_registrado").value == "Nombre" || document.getElementById("contra_registrado").value == "Contraseña")
  {
    return false;
  } 
      
}



function registro_paciente(){
var telefono = validate_phone();
if(document.getElementById("nombre_registro").value == "Nombre" ||
document.getElementById("contra_registro").value == "Contraseña" ||
telefono == false)
{return false;}

}

function validate_phone(){
  
  if(isNaN(document.getElementById("cel_registro").value))
  {
    return false;
  }

}


function fechas_busquedas(){
  var fecha = new Date();
  var fecha_automatica = new Array;
  fecha_automatica.dia = fecha.getDate()-1;
  fecha_automatica.mes = obtener_mes(fecha.getMonth()+1).num;
  fecha_automatica.ano = fecha.getFullYear();

  var fechas_movimiento = new Array();

  for(var i = 1;i<=7;i++)
  { 
  
  var fecha_actual = fecha_automatica.mes+"/"+fecha_automatica.dia+"/"+fecha_automatica.ano;
  hoy = new Date(fecha_actual);
  var incremento = i;
  hoy.setTime(hoy.getTime()+incremento*24*60*60*1000);   
  var mes = hoy.getMonth()+1; 
  if(mes<=9) mes='0'+mes; 
  var fecha_temp = hoy.getDate()+"/"+mes+"/"+hoy.getFullYear(); 
  var fecha_estelar = fecha_temp.split("/");
  
  document.getElementById("diab"+i).innerHTML = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
  fechas_movimiento[i] = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
  }
}
  

function obtener_mes(m){

  var meses = new Array();

  switch(m)
  {
    case 1:
    meses.es = "Enero";
    meses.esmin = "Ene";
    meses.num = 1;
    
    break;
    
    case 2:
    meses.es = "Febrero";
    meses.esmin = "Feb";
    meses.num = 2;
    
    break;
    
    case 3:
    meses.es = "Marzo";
    meses.esmin = "Mar";
    meses.num = 3;
    
    break;

    case 4:
    meses.es = "Abril";
    meses.esmin = "Abr";
    meses.num = 4;
    
    break;
    
    case 5:
    meses.es = "Mayo";
    meses.esmin = "May";
    meses.num = 5;
    
    break;
    
    case 6:
    meses.es = "Junio";
    meses.esmin = "Jun";
    meses.num = 6;
    
    break;
    
    case 7:
    meses.es = "Julio";
    meses.esmin = "Jul";
    meses.num = 7;
    
    break;
    
    case 8:
    meses.es = "Agosto";
    meses.esmin = "Ago";
    meses.num = 8;
    
    break;
    
    case 9:
    meses.es = "Septiembre";
    meses.esmin = "Sep";
    meses.num = 9;
    
    break;
    
    case 10:
    meses.es = "Octubre";
    meses.esmin = "Oct";
    meses.num = 10;
    
    break;
    
    case 11:
    meses.es = "Noviembre";
    meses.esmin = "Nov";
    meses.num = 11;
    
    break;
    
    case 12:
    meses.es = "Diciembre";
    meses.esmin = "Dic";
    meses.num = 12;
    
    break;
    
    
  }

  return meses;
  
}