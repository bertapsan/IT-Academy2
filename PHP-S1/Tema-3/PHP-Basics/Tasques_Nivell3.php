<?php 


// NIVELL 3

// Nivell 3 -  Exercici 1 
echo '<b>'."NIVELL 3 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  convertir una cadena (phrase) en un array (retallant cada caràcter i eliminant les línies buides). ".'</b>'.'</br>&nbsp<br>';

$phrase = "Hello world";
//Elimino l'espai en blanc de l string i verifico
echo "Elimino els espais en blanc mitjançant str_replace i després ho imprimeix-ho per verificar. ".'</b>'.'</br>';
echo "<pre>";
$string_no_space = str_replace(' ', '', $phrase);
print_r($string_no_space);

//Paso l string a array
echo '</br>&nbsp<br>'."Passo l'string obtingut a array mitjanánt str_split ".'</b>'.'</br>';
$array = str_split($string_no_space);
echo "<pre>";
print_r($array);


// Nivell 3 - Exercici 2
echo '<b>'.'</br>&nbsp<br>'."Exercici 2 ".'</b>'.'</br>';
echo '</br>&nbsp<br>'."Repte: Escriu un programa en PHP que compti el nombre total de vegades que un valor existeix en l'array. ".'</b>'.'</br>';

echo '</br>&nbsp<br>'."Aquesta és l'array de dades inicial ".'</br>';
$data = ["a","b","c","a","r","t","d","e","a"];
echo "<pre>";
print_r($data);


$quest = 'a'; //Variable que enmagatzemarà el valor que estic buscant
$times = 0 ; // Aquesta seria la variable per enmagatzemar les vegades que hi ha un valor a l'array, el seu valor inicial és zero
foreach ($data as $valor) {
if ($valor === $quest) {
    $times = $times + 1;
}
}

echo $times. ' és el nombre de vegades que he trobat el valor '. $quest. '</br>&nbsp<br>';


// Nivell 3 - Exercici 3
echo '<b>'.'</br>&nbsp<br>'."Exercici 3 ".'</b>'.'</br>';
echo '</br>&nbsp<br>'."Repte: Elimina un element de l’array i després d'eliminar l'element, les claus senceres han de ser normalitzades. ".'</b>'.'</br>';

echo '<br>'."Aquesta és l'array de dades inicial ".'</br>';
$X = array (10, 20, 30, 40, 50);
echo "<pre>";
print_r($X);

array_splice($X, 1, 1);
echo '<br>'."Aquesta és l'array de dades quan li extraiem un element ".'</br>';
echo "<pre>";
print_r($X);
?>





 