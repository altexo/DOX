<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php  
   
     $the_char = array(   
     "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"  
     );   
	 
     $the_char2 = array(   
     "1","2","3","4","5","6","7","8","9","0"  
     ); 

     $max_elements = count($the_char) - 1;   
	 $max_elements2 = count($the_char2) - 1;  
     mt_srand(time());    

     $c1 = $the_char[mt_rand(0,$max_elements)];    
     $c2 = $the_char[mt_rand(0,$max_elements)];    
     $c3 = $the_char2[mt_rand(0,$max_elements2)];    
     $c4 = $the_char2[mt_rand(0,$max_elements2)];    
     $c5 = $the_char2[mt_rand(0,$max_elements2)];    
       

     echo "$c1$c2$c3$c4$c5";   

    

?>
</body>
</html>