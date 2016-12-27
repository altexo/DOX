<html>
	<head>
	
		<title>Consulta fecha</title>
		
		<script type="text/javascript" src="date.js"></script>
		
		
<style>
	body{margin:0 auto;text-align:center;}
	#contenedor{margin:0 auto;width:700px;height:100px;margin-top:50px;}
	#dia1,#dia2,#dia3,#dia4,#dia5,#dia6,#dia7{font-weight:bold;color:#626262;font-size:12px;float:left;width:100px;text-align:center;font-family:Lucida Sans Unicode,arial,ubuntu;}
	#hora1,#hora2,#hora3,#hora4,#hora5,#hora6,#hora7{font-size:12px;float:left;width:100px;text-align:center;font-family:Lucida Sans Unicode,arial,ubuntu;height:20px;}
	#sumar,#restar,#hoy{cursor:pointer;font-family:Lucida Sans Unicode,arial,ubuntu;font-weight:bold;background:#90BFB3;padding:5px;color:#fff;}
	#cabecera{font-weight:bold;font-family:Lucida Sans Unicode,ubuntu;text-align:left;margin-bottom:60px;border-bottom:dashed 1px #626262;}
	#titulo{font-size:40px;}
	#test{font-size:20px;}
	#horas_consulta{width:705px;border:1px #dcdcdc solid;height:200px;}
</style>
		
		
		
	</head>
	
<body>
	<div id="contenedor">
	
	<div id="cabecera">
		<div id="titulo">Calendar</div>
		<div id="test">Test</div>
	</div>
	
	<br><br>
	
	<span  id="sumar">sumar</span>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
	<span id="restar">restar</span>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<span id="hoy">Hoy</span>
		
	<br><br>
	
	
	
	<span id="dia1"></span>
	<span id="dia2"></span>
	<span id="dia3"></span>
	<span id="dia4"></span>
	<span id="dia5"></span>
	<span id="dia6"></span>
	<span id="dia7"></span>
	

	<div style="clear:both;"></div>
	
	<br><br>
	
	
		<div id="horas_consulta"></div>	<!--- Aqui es donde se insertara la informacion de las horas por medio de ajax ----->
	
	
		
	</div>

</body>



</html>