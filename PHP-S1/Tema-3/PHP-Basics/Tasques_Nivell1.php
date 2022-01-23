<?php 

// NIVELL 1

// Nivell 1 - Exercici 1
$age = 45;
 $weight = 47.5;
 $name ="berta";
 $alive = true;
 echo '<b>'."NIVELL 1 ".'</b>'.'</br>';
 echo '<b>'."Exercici 1 ".'</b>'.'</br>';
 echo "age té valor $age i és una variable de tipus ", gettype($age).'</br>';
 echo "weight té valor $weight i és una variable de tipus ", gettype($weight).'</br>';
 echo "name té valor $name i és una variable de tipus ", gettype($name).'</br>';
 echo "alive té valor $alive i és una variable de tipus ", gettype($alive).'</br>&nbsp<br>';

 // Nivell 1 - Exercici 2
 $hello ="Hello, World!";
 $hello_uppercase = strtoupper($hello);
 $course ="Aquest és el curs de PHP";
 echo '<b>'."Exercici 2 ".'</b>'.'</br>';
 echo $hello.'</br>';
 echo $hello_uppercase.'</br>';
 echo "La mida o longitud de la variable hello es ", strlen($hello). '</br>';
 echo "Aquesta és la variable hello impresa en ordre invers ", strrev($hello). '</br>';
 echo "Aquesta és la concatenació de la variable hello - " . $hello . " - i la variable course - " .$course . " - i el resultat és -->  $hello  $course ".'</br>&nbsp<br>';

 // Nivell 1 - Exercici 3
// Declaración de una constante, NO se podrá modificar
define ("my_name","Berta");
 $html ="
    <html>  
    <head>  
        <h1><strong>" . my_name . "</strong></h1> 
        
        <!-- Para imprimir una constante NO se usa el símbolo $ -->
    
        </head>
    </html>";
 echo '<b>'."Exercici 3 ".'</b>'.'</br>';
 echo $html.'</br>';


 // Nivell 1 - Exercici 4
 $X = 10;
 $Y = 4;
 $N = 1.3;
 $M = 9.4;
 echo '<b>'."Exercici 4 ".'</b>'.'</br>';
 echo "El valor de la variable X es $X".'</br>';
 echo "El valor de la variable Y es $Y".'</br>';
 echo "El valor de la suma de les variables X i Y es ". $X + $Y.'</br>';
 echo "El valor de la resta de les variables X i Y es ". $X - $Y.'</br>';
 echo "El valor del producte de les variables X i Y es ". $X * $Y.'</br>';
 echo "El valor del mòdul de les variables X i Y es ". $X % $Y.'</br>';
 echo "El valor de la variable N es $N".'</br>';
 echo "El valor de la variable M es $M".'</br>';
 echo "El valor de la suma de les variables N i M es ". $N + $M.'</br>';
 echo "El valor de la resta de les variables N i M es ". $N - $M.'</br>';
 echo "El valor del producte de les variables N i M es ". $N * $M.'</br>';
 echo "El valor del mòdul de les variables N i M es ". $N % $M.'</br>';
 echo "El valor doble de la variable X es ". 2 * $X.'</br>';
 echo "El valor doble de la variable Y es ". 2 * $Y.'</br>';
 echo "El valor doble de la variable N es ". 2 * $N.'</br>';
 echo "El valor doble de la variable M es ". 2 * $M.'</br>';
 echo "El valor de la suma de totes les variables, (X, Y, N, M) es ". $X + $Y + $N + $M.'</br>';
 echo "El valor del producte de totes les variables, (X, Y, N, M) es ". $X * $Y * $N * $M.'</br>&nbsp<br>';


// Nivell 1 - Exercici 5
$primera_array = [2, 8, 9, 1, 4];
 $segona_array = [5, 6, 11];
 echo '<b>'."Exercici 5 ".'</b>'.'</br>';
 echo "Aquesta és l'impressió de l'array de tres valors";
 echo "<pre>";
 var_dump($segona_array).'</br>';
 echo '<br>'."Aquesta és l'impressió de l'array de tres valors, afegint un nou valor";
 $segona_array[]=45;
 echo "<pre>";
 var_dump($segona_array).'</br>';
 echo '<br>'."Aquesta és l'impressió, mitjançant var_dump, de mesclar els dos arrays, dona 9 valors perquè a l'array inicial de 3 valors l'hi hem afegit un valor en el pas anterior";
 $array_mix= array_merge($primera_array, $segona_array);
 echo "<pre>";
 var_dump($array_mix). '</br>';
 echo '<br>'."Aquesta és l'impressió, mitjançant print_r, de mesclar els dos arrays, dona 9 valors perquè a l'array inicial de 3 valors l'hi hem afegit un valor en el pas anterior";
 print_r($array_mix). '</br>';
 echo '<br>'."Aquesta és l'impressió de la quantitat de valors que composa el nou array ";
 echo count($array_mix);
?>
