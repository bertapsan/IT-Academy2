<?php 


// NIVELL 1

// Nivell 1 -  Exercici 1 
echo '<b>'."Funcions i Estructures de Control".'</b>'.'</br>';
echo '<b>'."NIVELL 1 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  Programa una funció que, donat un número qualsevol(per exemple,la teva edat) ens digui si és parell o imparell mitjançant un missatge per pantalla. ".'</b>'.'</br>&nbsp<br>';

?>
<!--Por defecto los formularios tienen método GET, veremos el valor de lo que se introduce en el formulario reflejado en la URL, nosotros ponemos POST -->
<form action="" method="POST"> 
    <input type="number" name="ex1" value="0">
    <input type="submit" value="consultar">
</form>

<?php 

//A la variable age le asigno lo que devuelve el formulario
$age = $_POST["ex1"];  

//Funció per determinar si la variable age és parell o imparell, le paso la variable age con valor 0 por defecto por si me envían el formulario vacío
function ParellImparell ($age = 0) {
//Condicional
    if ($age%2===0) {
        echo "El número $age és parell</br>&nbsp<br>";
    }
    else {
        echo "El número  $age és imparell</br>&nbsp<br>";
}
}
//Crido la funció
ParellImparell($age);



// Nivell 1 -  Exercici 2 
echo '<b>'.'</br>&nbsp<br>'."Exercici 2 ".'</b>'.'</br>';
echo "Repte:  Per jugar a  l'amagatall se'ns ha demanat un programa que compti fins a 10. Però la persona que comptarà és una mica tramposa i ho farà comptant de dos en dos. Crea una funció que compti fins a 10, de 2 en 2, mostrant cada número del compte per pantalla. ".'</b>'.'</br>&nbsp<br>';

echo 'Amb for fem el recorregut, amb if posem la condició, que no siguin nombres parells %2==0 , i fent servir continue podem aconseguir "saltar" les posicions que no acompleixin la condició per seguir "imprimint" resultats'.'</br>'.'&nbsp<br>';

function Amagatall () {
    for($i=1; $i < 11; $i++){
        if($i % 2 == 0){
           continue;
        }
        echo $i . '<br />';
     }

}

//Crido la funció
Amagatall();



// Nivell 1 -  Exercici 3
echo '<b>'.'</br>&nbsp<br>'."Exercici 3 ".'</b>'.'</br>';
echo "Repte:  Imagina't que volem que compti fins a un nombre diferent de 10. Programa la funció perquè el final del compte estigui parametritzat. ".'</b>'.'</br>&nbsp<br>';

echo 'Fem el mateix però el nombre fins el que volem que imprimeixi li pasem com a variable, jo he escollit el nom request per a la variable'.'</br>'.'&nbsp<br>';


$request=20;

function DifferentMax ($request) {
    for($i=1; $i < $request; $i++){
        if($i % 2 == 0){
           continue;
        }
        echo $i . '<br />';
     }
}
//Crido la funció
DifferentMax($request); 


// Nivell 1 -  Exercici 4
echo '<b>'.'</br>&nbsp<br>'."Exercici 4 ".'</b>'.'</br>';
echo "Repte:  Per prevenir oblits a l'utilitzar la nostra meravellosa opció amagatall establirem un paràmetre per defecte igual a 10 a la funció que s'encarrega de fer aquest compte. ".'</b>'.'</br>&nbsp<br>';

$request=30;

//Asignándole a request de la función el valor igual a 10 me aseguro que si no se pasa un valor tomará 10 por defecto.
function DifferentMaxSave ($request=10) {
    for($i=1; $i < $request; $i++){
        if($i % 2 == 0){
           continue;
        }
        echo $i . '<br />';
     }
}
//Crido la funció
DifferentMaxSave($request); 



// Nivell 1 -  Exercici 5
echo '<b>'.'</br>&nbsp<br>'."Exercici 5 ".'</b>'.'</br>';
echo "Repte:  Escriure una funciò per verificar el grau de un estudiant en d'acord a la nota. ".'</b>'.'</br>&nbsp<br>';

//1r paso Tengo un array inicial 
$alumnes_array = ['Sergi'=>25, 'Maria'=>79, 'Carla'=>46, 'Berta'=>30, 'Marc'=>86];
echo "Aquesta és l'impressió de l'array dels alumnes i les seves calificacions";
echo "<pre>";
print_r($alumnes_array).'</br>';


// 2o paso - Con foreach recorro el array y "extraigo" dos variables el índice (al que llamo nombre) y el valor (al que llamo puntuacion)
foreach ($alumnes_array as $nombre => $puntuacion) {

    //3r - Cada vez que recorro el array (iteración) llamo a la función checknote y le paso el índice (nombre) y el valor (puntuación), para que pueda "trabajar" con dichas variables. En este ejemplo se llamará 5 veces a la función checkNote
    checkNote ($nombre, $puntuacion);
}

//4o paso - Genero/Declaro la función checknote y le indico que va a recibir dos parámetros, que pueden llamarse de cualquier forma, en este ejemplo le he llamado alumne y nota
function checkNote ($alumne, $nota) {
// 5o paso - Pongo las condiciones bajo las que una nota obtiene o no una evaluación
if ($nota < 33) {
    echo "La/el alumna/e $alumne amb una nota de $nota està suspès".'</br>&nbsp<br>';
} elseif ($nota >=33 && $nota <=44) {
    echo "La/el alumna/e $alumne amb  una nota de $nota està a Tercera Divisió".'</br>&nbsp<br>';
} elseif ($nota >=45 && $nota <=59) {
    echo "La/el alumna/e $alumne amb  una nota de $nota està a Segona Divisió".'</br>&nbsp<br>';
}
else {
    echo "La/el alumna/e $alumne amb  una nota de $nota està a Primera divisió".'</br>&nbsp<br>';
}
};




// Nivell 1 -  Exercici 6
echo '<b>'.'</br>&nbsp<br>'."Exercici 6 ".'</b>'.'</br>';
echo "Repte:  Charlie et mossegarà el dit exactament el 50% del temps.
<br>Escriu La funció isBitten () que retorna TRUE amb un 50% de probabilitat i FALSE en cas contrari. ".'</b>'.'</br>&nbsp<br>';

function isBitten () {
    $aleatorio = rand(1, 2);
    if ($aleatorio == 1) {
        echo "True";
    } else {
        echo "False";
    }
    echo "\n";
}

for ($i=0; $i<20; $i++)
isBitten();

?>




 