<?php 

// NIVELL 3

// Nivell 3 -  Exercici 1 
echo '<b>'."Funcions i Estructures de Control".'</b>'.'</br>';
echo '<b>'."NIVELL 3 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  La criba d'Eratóstenes és un algoritme pensat per a trobar nombres primers dins d'un interval donat. Basats en l'informació de l'enllaç adjunt, implementa la criba d'Eratóstenes dins d'una funció, de tal forma que poguem invocar la funció per a un número concret. ".'</b>'.'</br>';


//Obtener las lista de números a evaluar
$limite=120;
for($i=1;$i<$limite;$i++)
{
  $numeros[$i]=true; //Inicializa la array $numeros, con todos los valores hasta el $limite (yo he puesto 120) y les asigna valor true por defecto a todos.
}

//Recorremos el array $numeros pero empezamos en el 2 (ver motivo más adelante)
for ($n=2;$n<$limite;$n++)
{
  //La condición tiene como finalidad que los primos sean "true" y los no primos sean "False". Si es primo recorre sus múltiplos y los marca como no primo (False). Este es el motivo por el que hacemos del número dos nuestro primer número primo, si hiciéramos al 1 nuestro primer número "marcaría como no primos" todos los números, pues todos los números son múltiplos de 1.
  
  if ($numeros[$n]==true) //esto verifica si se cumple la condición que el índice de $numeros sea true, por ejemplo: los valores 4, 6, 8... serían false y ya no entrarían, pues el recrrido del valor 2 ya los habría "catalogado" como false. 
  {
    for ($i=$n*$n;$i<$limite;$i+=$n)  //Esta condición lo que hace es marcar como False todos los múltiplos de $n. Por ejemplo: empezando con el número 2 -> $i=2*2 (empieza a marcar el 4 como False, como está dentro del límite, "salta" a revisar el siguiente múltiplo de 2)
    {
       $numeros[$i] = false;
    }
  }
}

//Muestro la lista de los primos 
echo "Primos:  "; //Le añado manualmente el 1
for ($n = 1; $n < $limite; $n++) //Recorre y verifica la posición $n de $numeros
{
  if ($numeros[$n]==true)
  {
    echo $n." ";
  }
}

 //-------------------------- 2a opción ------------------

$limite=1200;
$primos = []; //Array vacía donde vamos a meter todos los primos
$primos[]=1; //Fuerzo que el valor 1 ya esté dentro (ver motivo más adelante)
for($i=1;$i<$limite;$i++)
{
  $numeros[$i]=true; //Inicializa la array $numeros, con todos los valores hasta el $limite (yo he puesto 120) y les asigna valor true por defecto a todos.
}

//Recorremos el array $numeros pero empezamos en el 2 (ver motivo más adelante)
for ($n=2;$n<$limite;$n++)
{
  //La condición tiene como finalidad que los primos sean "true" y los no primos sean "False". Si es primo recorre sus múltiplos y los marca como no primo (False). Este es el motivo por el que hacemos del número dos nuestro primer número primo, si hiciéramos al 1 nuestro primer número "marcaría como no primos" todos los números, pues todos los números son múltiplos de 1.
  
  if ($numeros[$n]==true) //esto verifica si se cumple la condición que el índice de $numeros sea true, por ejemplo: los valores 4, 6, 8... serían false y ya no entrarían, pues el recrrido del valor 2 ya los habría "catalogado" como false. 
  {
    $primos[] = $n;// Aquí metes $n (solo un valor, por ejemplo el 2) en el array de $primos
    for ($i=$n*$n;$i<$limite;$i+=$n)  //Esta condición lo que hace es marcar como False todos los múltiplos de $n. Por ejemplo: empezando con el número 2 -> $i=2*2 (empieza a marcar el 4 como False, como está dentro del límite, "salta" a revisar el siguiente múltiplo de 2)
    {
       $numeros[$i] = false;
    }
  }
}

//Muestro la lista de los primos 
echo "Primos: "; //Le añado manualmente el 1

for ($n = 0; $n < count($primos); $n++) {
  echo $primos[$n] . ", "; //Con esto . ", " consigo que se impriman los números con una coma y un espacio
}
echo "\n". count($primos); //Contabiliza cuantos primos tengo
?>