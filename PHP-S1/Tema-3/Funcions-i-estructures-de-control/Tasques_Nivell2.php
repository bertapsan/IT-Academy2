<?php 

// NIVELL 2

// Nivell 2 -  Exercici 1 
echo '<b>'."Funcions i Estructures de Control".'</b>'.'</br>';
echo '<b>'."NIVELL 2 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  Ens han demanat un llistat de tots els anys on es van produir jocs olímpics desde 1960 inclós fins al 2016. Programa un bucle que calculi i mostri per pantalla els anys olímpics dins de l'interval esmentat. ".'</b>'.'</br>';

echo "<p>Anys olímpics</p>\n";
function Olimpic () {
    for ($i = 1960; $i < 2017; $i = $i + 4) {
        echo $i. '<br />';
    }
}

//Crido la funció
Olimpic();


// Nivell 2 -  Exercici 2 
echo '<b>'.'</br>&nbsp</br>&nbsp<br>'."Exercici 2 ".'</b>'.'</br>';
echo "Repte:  Escriu una funció que determini la quantitat total a pagar per una trucada telefònica d'acord a les següents premisses:
<br>
Tota crida que duri menys de 3 minuts té un cost de 10 cèntims.
Cada minut addicional a partir dels 3 primers és un pas de comptador i costa 5 cèntims. ".'</b>'.'</br>&nbsp<br>';

?>

<!--Por defecto los formularios tienen método GET, veremos el valor de lo que se introduce en el formulario reflejado en la URL, nosotros ponemos POST -->
<form action="" method="POST"> 
    <span>Quants minuts has estat parlant? </span><input type="number" name="ex2" value="0">
    <input type="submit" value="Consultar Tarifa">
</form>

<?php 

//A la variable minutes le asigno lo que devuelve el formulario
$minutes = $_POST["ex2"];  

//Funció per determinar si la variable minutes és menor o igual a 3, le paso la variable minutes con valor 0 por defecto por si me envían el formulario vacío
function Tarifa ($minutes = 0) {
    $tarifaExtra = 5;
//Condicional
    if ($minutes <= 3) {
        echo "La teva trucada ha durat $minutes minuts i el seu cost és de 10 cèntims</br>&nbsp<br>";
    }
    else {
        echo "La teva trucada ha durat $minutes minuts i el seu cost és de " . 10 + ($minutes - 3) * $tarifaExtra  . " cèntims</br>&nbsp<br>";
    }
}
//Crido la funció
Tarifa($minutes);


// Nivell 2 -  Exercici 3
echo '<b>'.'</br>&nbsp</br>&nbsp<br>'."Exercici 3 ".'</b>'.'</br>';
echo "Repte:  Imagina que som a una botiga on es ven
<br>
Xocolata: 1 euro
Xiclets: 0.50 euros
Carmels: 1.50 euros
Implementa un programa que permeti afegir càlculs a un total de compres d'aquest tipus. Per exemple, que si comprem:
<br>
2 xocolates, 1 de xiclets i 1 de carmels, tinguem un programa que permeti anar afegint els subtotals a un total, tal que així:
<br>
funció(2 xocolates) + funció(1 de xiclets) + funció(1 de carmels) = 2 + 0.5 + 1.5
<br>
Sent per tant el total, 4. ".'</b>'.'</br>';

?>
<!--Por defecto los formularios tienen método GET, veremos el valor de lo que se introduce en el formulario reflejado en la URL, nosotros ponemos POST -->
<br>
<form action="" method="POST"> 
    <span>Unitats de Xocolata </span><input type="number" name="xoco" value="0"><br>
    <span>Unitats de Xiclets </span><input type="number" name="gum" value="0"><br>
    <span>Unitats de Carmels </span><input type="number" name="candy" value="0"><br>
    <input type="submit" value="Calculadora">
</form>

<?php 

//A las variables xocolata, xiclets y caramels les asigno lo que devuelve el formulario
$xocolata = $_POST["xoco"];  
$xiclets = $_POST["gum"];  
$carmels = $_POST["candy"];  

//Función para determinar el ticket, le paso las variables con valor 0 por defecto por si me envían el formulario vacío
function Tickets ($xocolata=0, $xiclets=0, $carmels=0) {
    $tarifaXocolata = 1;
    $tarifaXiclets = 0.5;
    $tarifaCarmels = 1.5;
//Condicional
        echo "El teu compte és de " . $xocolata * $tarifaXocolata + $xiclets * $tarifaXiclets + $carmels * $tarifaCarmels. " euros</br>&nbsp<br>";
    }
//LLamo a la función
Tickets($xocolata, $xiclets, $carmels);



?>




 