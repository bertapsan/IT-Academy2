<?php 

// NIVELL 1

// Nivell 1 -  Exercici 1 
echo '<b>'."PHP i Objects".'</b>'.'</br>';
echo '<b>'."NIVELL 1 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  Crea una classe Employee defineix com a atributs el seu nom i sou. Definir un mètode initialize que rebi com a paràmetres el nom i sou. Plantejar un segon mètode print que imprimeixi el nom i un missatge si ha o no pagar impostos (si el sou supera 6000 paga impostos). ".'</b>'.'</br>';

class employee {
    //definim els atributs/variables
    public $nombre = "";
    public $sueldo = "";

    //definim un mètode/funció
    public function initialize ($sou,$nom) {
        $this->nombre = $nom; // de esta forma asigno el valor de sou y nom a un atributo propio de esta clase que son sueldo y nombre respectivamente. De esta forma el segundo método, print, puede "saber" el valor que se han pasado por parámetros
        $this->sueldo = $sou;
    }
    public function print(){
        if ($this->sueldo > 6000) {
            return  $this->nombre. " ha de pagar impostos";
        } else {
            return $this->nombre. " no ha de pagar impostos";
        }
    }
}
//termina la clase employee
//instanciamos o declaramos el objeto miObjeto
$miObjeto= new employee(); // el valor de $nombre es "", y el de $sueldo es ""
$miObjeto->initialize(7000,"pepe"); // cuando ejecutas el método necesitas pasarle dos parámetros, pq en la función dentro de la clase(linea 18) te dice que necesita dos parámetros que son $sou y $nom. $sou y $nom pertenecen al método initialize NO a la clase=> solo se podrán usar dentro de ese método. Si quisiera utilizar $sou y $nom fuera del método initialize, debería guardar esos valores en un atributo de la clase.
//Los atributos son como "zonas comunes" para todos los métodos de una clase.
echo $miObjeto->print(); //esto imprimirá lp que retorna print



// Nivell 1 -  Exercici 2 
echo '<b>'.'</br>&nbsp</br>&nbsp<br>'."Exercici 2 ".'</b>'.'</br>';
echo "Repte:  Escriu un programa que defineixi una classe Shape amb un constructor que rebi com a paràmetres l'ample i alt. Defineix dues subclasses; Triangle i Rectangle que heretin de Shape i que calculin respectivament l'àrea de la forma area().
<br>
A l'arxiu main defineix dos objectes, un triangle i un rectangle i truca al mètode area de cadascun.
 ".'</b>'.'</br>&nbsp<br>';

 class shape{

    //definim els atributs
    public $ancho="";
    public $alto="";

    //definim un mètode
    public function __construct ($ample,$alt) {
        $this->ancho = $ample;
        $this->alto = $alt;
        echo "Esto es el constructor de la clase shape"; 
        //usamos un echo pq es un método constructor
    }
 }

    // con extends generamos una "subclase" que hereda o recibe los atributos de su "padre" en este caso la clase shape
 class triangle extends shape {
     //definim un mètode
     public function area () {
         return "Aquesta és l'àrea del triangle " .($this->ancho * $this->alto)/2; 
     }
 }

 class rectangle extends shape {
     //definim un mètode
     public function area () {
        return "<br> Aquesta és l'àrea del rectangle " .($this->ancho * $this->alto); 
    }
 }
  
    //instanciamos o declaramos el objeto miObjeto de triangle
    $miObjetoTriangle= new triangle(5,2);
    echo $miObjetoTriangle->area();
    
    //instanciamos o declaramos el objeto miObjeto de rectangle
    $miObjetoRectangle= new rectangle(7,9);
    echo $miObjetoRectangle->area();

?>




 