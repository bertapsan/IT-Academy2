<?php 

// NIVELL 2

// Nivell 2 -  Exercici 1 
echo '<b>'."PHP i Objects".'</b>'.'</br>';
echo '<b>'."NIVELL 2 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  Crea la classe PokerDice. Les cares d'un dau de pòquer tenen les següents figures: As, K, Q, J, 7 i 8.
<br>
Crea el mètode throw que no fa altra cosa que tirar el dau, és a dir, genera un valor aleatori per a l'objecte a què se li aplica el mètode.
<br>
Crea també el mètode shapeName, que digui quina és la figura que ha sortit en l'última tirada de el dau en qüestió.
<br>
Realitza una aplicació que permeti tirar cinc daus de pòquer alhora.
<br>
A més, programa el mètode getTotalThrows que ha de mostrar el nombre total de tirades entre tots els daus ".'</b>'.'</br>';


class PokerDice{

    //definim els atributs
    private $faces = ["As", "K", "Q", "J", "7", "8"];
    //definimos una variable donde almacenaremos el valor que se genere con el método throwDice
    private $throwValue = 0;

    //definim un mètode throwDice - No l'anomenen únicament throw pq aquesta és una paraula reservada!
    //este método "genera" el valor de forma aleatoria con la función rand, que necesita se indique el valor mínimo y máximo del array (array de 6 elementos => índice inicial/min = 0, índice final/max = 5)
    //També indiquem que cada cop que tiri el dau aumenti un el totalThrows
    public function throwDice () { 
        $this->throwValue = rand( 0, 5 );
    }

    //definim un mètode shapeName
    // este método "recupera" el valor aleatorio que se ha generado en el método throwDice, y se utiliza como índice del array faces, para devolver la cara del dado que corresponda a dicha posición en el array.   
    public function shapeName () { 
        return $this->faces[$this->throwValue]; 
    }

}
$totalThrowDices = 0;

//utilizamos un for para "iterar" las 5 tiradas solicitadas
for($i=0; $i<5; $i++) {
//instanciamos o declaramos el objeto miDado
$miDado = new PokerDice();

//"lanzamos el dado" - Ejecuta el método del objeto
$miDado->throwDice();
$totalThrowDices++;

//Para visualizar de qué dado se trata (el 1, el 2...)
$numDado=$i+1;

//"recuperas" el valor con el método shapeName para mostrar el valor
echo  "El valor del dado {$numDado} es " .$miDado->shapeName() ."<br>";
}

getTotalThrows($totalThrowDices);

//$total es una "copia" de $totalThrowDices, de esta forma conseguimos "pasar" el dato, que está fuera de la función/método getTotalThrows, dentro de dicha función/método
function getTotalThrows($total) {
    echo "Este es el número total de tiradas " .$total;
}
    



