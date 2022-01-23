<?php 


// NIVELL 3

// Nivell 3 -  Exercici 1 
echo '<b>'."NIVELL 3 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  convertir una cadena (phrase) en un array (retallant cada caràcter i eliminant les línies buides). ".'</b>'.'</br>&nbsp<br>';

$phrase = "Hello world";
//Elimino l'espai en blanc de l string i verifico
echo "Elimino els espais en blanc mitjançant str_replace i després ho imprimeix-ho per verificar. ".'</b>'.'</br>';

$string_no_space = str_replace(' ', '', $phrase);
echo "<pre>";// esto es para darle un formato específico y debe cerrarse
print_r($string_no_space);
echo "</pre>";

//Paso l string a array
echo '</br>&nbsp<br>'."Passo l'string obtingut a array mitjanánt str_split ".'</b>'.'</br>';
$array = str_split($string_no_space);
echo "<pre>";
print_r($array);
echo "</pre>";

// Nivell 3 - Exercici 2
echo '<b>'.'</br>&nbsp<br>'."Exercici 2 ".'</b>'.'</br>';
echo '</br>&nbsp<br>'."Repte: Escriu un programa en PHP que compti el nombre total de vegades que un valor existeix en l'array. ".'</b>'.'</br>';

echo '</br>&nbsp<br>'."Aquesta és l'array de dades inicial ".'</br>';
$data = ["a","b","c","a","r","t","d","e","a"];
echo "<pre>";
print_r($data);
echo "</pre>";

$quest = 'a'; //Variable que enmagatzemarà el valor que estic buscant
$times = 0 ; // Aquesta seria la variable per enmagatzemar les vegades que hi ha un valor a l'array, el seu valor inicial és zero
foreach ($data as $valor) { //recorre data y te devuelve el valor de cada elemento "almacenado" en la variable $valor
if ($valor === $quest) {
    $times++; //esto es igual a esto $times =$times + 1;
}
}

echo $times. ' és el nombre de vegades que he trobat el valor '. $quest. '</br>&nbsp<br>';


// Nivell 3 - Exercici 3
echo '<b>'.'</br>&nbsp<br>'."Exercici 3 ".'</b>'.'</br>';
echo '</br>&nbsp<br>'."Repte: Elimina un element de l’array i després d'eliminar l'element, les claus senceres han de ser normalitzades. ".'</b>'.'</br>';

echo '<br>'."Aquesta és l'array de dades inicial ".'</br>';
$X = array (10, 20, 30, 40, 50); // esto sería igual a $X = [10, 20, 30, 40, 50]
echo "<pre>";
print_r($X);
echo "</pre>";

array_splice($X, 1, 2); // con esta función especificamos qué array queremos modificar ($X), qué posición es en la que queremos empezar a eliminar elementos (posición 1), y quantos elementos (a partir de esa posición), deben ser eliminados (2 elementos)
echo '<br>'."Aquesta és l'array de dades quan li extraiem un element ".'</br>';
echo "<pre>";
print_r($X); // me mostrará la array inicial sin los elementos eliminados

//ATENCIÓN: si quisiera obtener los elementos "eliminados" debería declarar una nueva variable $Y = array_splice($X, 1, 2);
?>





 