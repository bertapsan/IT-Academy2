<?php 


// NIVELL 2
// ------- Variables -------

// Nivell 2 -  Exercici 1
 $first_number= 3;
 $second_number = 3;
 $sum = $first_number + $second_number;
 $result = ""; 

if ($first_number === $second_number) {
    $result = 2 * $sum;
    
}
else {
    $result = $sum;
    
}
echo '<b>'."NIVELL 1 ".'</b>'.'</br>';
echo "Repte: Quan el valor de la variable first_number i la variable second_number siguin exactament iguals, el resultat de la suma, d'ambdues variables es mutiplicarà per 2; si no son exactament iguals, el resultat reflexarà únicament el valor de la suma de les variables ".'</b>'.'</br>';
echo 'Aquest és el valor de la primera variable - '.$first_number.'</br>';
echo 'Aquest és el valor de la segona variable - '.$second_number.'</br>';
echo 'Aquest és el resultat - '.$result.'</br>&nbsp<br>';


// Nivell 2 -  Exercici 2
echo '<b>'."NIVELL 2 ".'</b>'.'</br>';
$letters = ["w", "x", "y", "z"];
echo 'Aquesta és la impressió de l array letters original'.'</br>';
echo "<pre>";
print_r($letters).'</br>';

//Extreus el primer element de l array letters
$first_element = array_shift($letters);

// Extreus el darrer element de l array letters
$last_element = array_pop($letters);


// Col.loques last_element en la primera posició
array_unshift($letters, $last_element);

// Col.loques first_element en la darrera posició
array_push($letters, $first_element);

echo '<br>'.'Aquest és el resultat de cambiar les posicions del primer element de letters pel que ocupa la darrera posició '.'</br>';
echo "<pre>";
print_r($letters);

  ?>

 