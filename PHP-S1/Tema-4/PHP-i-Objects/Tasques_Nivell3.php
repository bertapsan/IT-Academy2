<?php 

// NIVELL 3

// Nivell 3 -  Exercici 1 
echo '<b>'."PHP i Objects".'</b>'.'</br>';
echo '<b>'."NIVELL 3 ".'</b>'.'</br>';
echo '<b>'.'</br>&nbsp<br>'."Exercici 1 ".'</b>'.'</br>';
echo "Repte:  Crea un projecte Bancs, afegeix a el projecte una classe Account amb atributs per número de compte, nom i cognoms de el client i el saldo actual. Defineix en la classe els següents mètodes:
<br>
Constructor que inicialitzi els atributs.<br>
Crea el mètode deposit (amount) que permet ingressar una quantitat al compte.<br>
Crea el mètode withdraw (amount) que permet retirar una quantitat del compte sempre que hi hagi saldo, si no n'hi ha el mètode haurà de retornar un missatge d'error.<br>
Getters i Setters.
<br>
Crea una petita interfície amb ajuda d'HTML I CSS que permeti ingressar una quantitat i dipositar o retirar el saldo del compte.
<br>
Fes les validacions pertinents per assegurar que la quantitat ingressada per l'usuari és correcta".'</b>'.'</br>';


//definim una class Account
class Account {

    //creem les propietats (atributs)
    public $compte= "";
    public $nom ="";
    public $cognoms = "";
    public $saldo = 0;

    //declarem el método constructor (no necessita ser cridat, doncs s'executa automàticament), s'utilitza quan tens una classe que necessites inicialitzar amb uns valors "CONCRETS" de les seves propietats
    public function __construct($compteClient, $nomClient, $cognomsClient, $saldoClient) {
        //inicializamos o asignamos las propiedades (atributos)
        $this->compte = $compteClient;
        $this->nom = $nomClient;
        $this->cognoms = $cognomsClient;
        $this->saldo = $saldoClient;
    }

    //creamos el método deposit, mitjançant amount podem "introduïr un valor dins d'aquest mètode
    function deposit ($amount) {
    $this->saldo += $amount; //esto es lo mismo que  $this->saldo = $this->saldo + $amount;
    }

    //creamos el método withdraw, mitjançant amount podem "introduïr un valor dins d'aquest mètode
    function withdraw ($amount) {
        if ($amount > $this->saldo) {
            echo "Missatge d'error, el saldo és inferior a la quantitat que es vol treure";
            return;
        }
        $this->saldo -= $amount; //esto es lo mismo que  $this->saldo = $this->saldo - $amount;
    }

    function getSaldo () {
        return $this->saldo;
    }


}
$miObjetoCuenta = new Account("ES34567855100100", "Berta", "Pluma", 2500);


var_dump($_POST);//array que almacena los datos que se han enviado por el formulario
if (isset($_POST["ingreso"])){ //con esto verificamos que exista algo en el campo ingreso del formulario, si así puede ejecutar, de lo contrario no (así evitamos error en caso de no tener un valor especificado) 
    $ingreso = floatval($_POST["ingreso"]); //con floatval convierto el valor a numérico decimal
    $miObjetoCuenta->deposit($ingreso);
}
if (isset($_POST["reintegro"])){ //con esto verificamos que exista algo en el campo ingreso del formulario, si así puede ejecutar, de lo contrario no (así evitamos error en caso de no tener un valor especificado) 
    $reintegro = floatval($_POST["reintegro"]); //con floatval convierto el valor a numérico decimal
    $miObjetoCuenta->withdraw($reintegro);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banc</title>
</head>
<body>
    <h2>Operativa bancaria</h2>
    <form action="" method="post">
            <input type="text" name="ingreso" value="0">
            <input type="submit" value="ingresar">
    </form>
    <form action="" method="post">
            <input type="text" name="reintegro" value="0">
            <input type="submit" value="retirar">
    </form>
    <div>Saldo actual: <?php echo $miObjetoCuenta->getSaldo(); ?> €</div>
</body>
</html>