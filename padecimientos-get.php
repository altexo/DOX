<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Request-Method: *');
    header('Access-Control-Allow-Headers: x-requested-with');
    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	    header("HTTP/1.1 200 OK");
	    return;
    }

 header('Content-type: text/json');
   

$especialidad = $_GET['especialidad'];





switch($especialidad)
			{
				case 0: //No escogió ninguna
				$esp="todas";
	$motivos = array(
    	"Seguimiento", 
		"Malestar", 
		"Interpretación de Análisis/Estudios", 
		"Examen Pre Operatorio", 
		"Otro"
    
);
				
				break;
				case 1: //Alergología
				$esp="Alergología";
					$motivos = array(
    	"Consulta por alergia", 
		"Consulta de seguimiento", 
		"Falta de Respiración por alergia", 
		"Tos por alergia", 
		"Problema en ojos por alergia", 
		"Alergia a medicamento", 
		"Alergia a alimento", 
		"Fiebre Estacional por alergia", 
		"Envenenamiento", 
		"Rash", 
		"Fiebre por alergia", 
		"Otro", 
	);
					
					
				
					break;
					
				case 5: //Cardiología
				$esp="Cardiología";
	$motivos = array(
    	"Consulta cardiología", 
		"Consulta de seguimiento", 
		"Estudio Electrocardiograma", 
		"Estudio Doppler", 
		"Interpretación de resultados", 
		"Angiografía Coronaria", 
		"Ecocardiograma", 
		"Mareos/Desvanecimiento", 
		"Estudio Holter", 
		"Prueba de estrés", 
		"Cateterismo", 
		"Seguimiento cateterismo", 
		"Prueba de Esfuerzo", 
		"Otro", 
	);
				
				
				
					break;
				
				case 9: //Cirujano Plástico
				$esp="Cirujano Plástico";
		
				$motivos = array(
    	"Tratamiento Anti-edad", 
		"Botox", 
		"Implantes de senos (aumento)", 
		"Reducción medida seno", 
		"Prótesis", 
		"Peeling", 
		"Mentón", 
		"Otoplastía (cirugía orejas)", 
		"Cirugía de párpados", 
		"Cirugía estética", 
		"Depilación láser", 
		"Tratamiento láser en piel", 
		"Liposucción", 
		"Rinoplastía (cirugía nariz)", 
		"Cirugía estética", 
		"Consulta de revisión", 
		"Seguimiento consulta de revisión", 
		"Cirugía estética de abdomen", 
		"Cirugía reconstructiva", 
		"Otro", 
	);
				
	break;
			
					
				case 11: //Dermatología
				$esp="Dermatología";
				$motivos = array(
    	"Acné", 
		"Consulta dermatológica", 
		"Tratamiento anti-edad", 
		"Botox tratamiento", 
		"Consulta de seguimiento", 
		"Caída de cabello", 
		"Psoriasis", 
		"Rash", 
		"Picazón", 
		"Manchas en la piel", 
		"Quemaduras", 
		"Otro", 
	
	);
				
					
					
					break; 
					
				case 12: //Endocrinologia
					$esp="Endocrinologia";
	$motivos = array(
    	"Problema metabólico", 
		"Diabetes", 
		"Seguimiento diabetes", 
		"Consulta endocrinología", 
		"Bocio", 
		"Infertilidad", 
		"Tiroides", 
		"Otro", 
	);
				
					break; 
					
				case 13: //Gastroenterología
				$esp="Gastroenterología";
			$motivos = array(
    	"Reflujo", 
		"Problemas digestivos", 
		"Heces color negro", 
		"Sangre en heces fecales", 
		"Estudio de colon", 
		"Colonoscopía", 
		"Diarrea", 
		"Consulta general", 
		"Seguimiento consulta general", 
		"Gastroscopia", 
		"Colitis", 
		"Páncreas", 
		"Dolor de estómago", 
		"Úlceras", 
		"Vómitos", 
		"Otro", 
	);
				
					
					
					break;
					
				case 16: //Ginecología-Obstetricia
				$esp="Ginecología-Obstetricia";
				$motivos = array(
    	"Disfunsión sexual", 
		"Métodos anticonceptivos", 
		"Menopausia", 
		"Seguimiento menopausia", 
		"Consulta ginecológica", 
		"Seguimiento consulta ginecológica", 
		"Evaluación de osteoporosis", 
		"Papanicolaus", 
		"Control de embarazo", 
		"Seguimiento control de embarazo", 
		"Ultrasonido", 
		"Infección vaginal", 
		"Otro", 
	);
				
					break; 
					
				case 17: //Hematología
				$esp="Hematología";
					$motivos = array(
    	"Anemia", 
		"Heces color negro", 
		"Trastorno de coagulación", 
		"Adelgazamiento de sangre", 
		"Consulta transfusión de sangre", 
		"Transplante médula ósea", 
		"Quimioterapia", 
		"Revisión Colesterol/Triglicéridos", 
		"Consulta general", 
		"Seguimiento consulta general", 
	 	"Problemas de bazo", 
		"Otro", 

	);
				
					
					break; 
				
				case 18: //Infectología
				$esp="Infectología";
				$motivos = array(
    	"SIDA", 
		"ETS", 
		"Seguimiento SIDA", 
		"Seguimiento ETS", 
		"Consulta general", 
		"Seguimiento consulta general", 
		"Otro", 


	);
				
		
					break; 
					
				case 21: //Neumología
				$esp="Neumología";
				$motivos = array(
    	"Asma", 
		"Bronquitis", 
		"Broncoscopía", 
		"Fibrosis quística", 
		"Enfisema", 
		"Estudio cáncer de pulmón", 
		"Neumonía", 
		"Prueba de función pulmonar", 
		"Consulta neumología", 
		"Consulta de seguimiento", 
		"Problemas de sueño", 
		"Toracoscopía", 
		"Otro", 

	);
				
				
				
					break;
					
				case 22: //Neurología
				
				$esp="Neurología";
				$motivos = array(
    	"Cuestiones cognitivas", 
		"Demencia", 
		"Electroencefalograma", 
		"Dolor de cabeza", 
		"Migraña", 
		"Cuestiones de movimiento", 
		"Esclerosis múltiple", 
		"Consulta neurología", 
		"Consulta de seguimiento", 
		"Parkinson", 
		"Epilepsia", 
		"Eventos cerebrovasculares", 
		"Hormigueos/Debilidad/Fatiga", 
		"Otro", 

	);
				
					
					break;
				//AQuI VOY
				case 23: //Nutrición
					$esp="Nutrición";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break; 
					
				case 24: //Pediatría
					$esp="Pediatría";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break;
					
				case 25: //Psiquiatría
					$esp="Psiquiatría";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break;
				
				case 25: //Psicología
					$esp="Psicología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break;
					
				case 26: //Radiología
					$esp="Radiología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break; 
			
				case 27: //Reumatología
					$esp="Reumatología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break;
			
				case 30: //Urología
					$esp="Urología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break;
				
				
				//Especialidades aún no agregadas a la base de datos.
				//31
				case "Dentista":
					$esp="Dentista";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break; 
					//32
				case "Odontopediatría": 
					$esp="Odontopediatría";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break; 
					//33
				case "Otorrinolaringología":
						$esp="Otorrinolaringología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break; 
					//34
				case "Oftalmología":
					$esp="Oftalmología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);
					break;
			//35
				case "Nefrología":
					$esp="Nefrología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);			
					break;
					//36
				case "Ortodoncia":
					$esp="Ortodoncia";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);			
					break; 
					//37
				case "Podología":
					$esp="Podología";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);			
					break;
					//38
				case "Medicina del sueño":
					$esp="Medicina del sueño";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);			
					break; 
					//39
				case "Medicina del deporte":
					$esp="Medicina del deporte";
				$motivos = array(
    	"Consulta General", 
		"Otro", 

	);			
						break; 
				
				default: echo "Nada"; break;
			}
			
echo json_encode(array("motivos" => $motivos, "especialidad" => $esp));
			
			?>
    
    


