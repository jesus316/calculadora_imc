<?php
 
 $resultado="";
 $color="";


if (isset($_POST["peso"]) && isset($_POST["altura"]) && is_numeric($_POST["peso"]) && is_numeric($_POST["altura"]) ) {
    $peso = $_POST["peso"];
    $altura = $_POST["altura" ];

    $imc = $peso / ($altura * $altura);

    $imc = round($imc,1); 
         
    
     if($imc<18.5){
         $resultado= "Peso  es inferior al normal";
         $color="orange";
     }

     if ($imc >= 18.5 && $imc< 24.9){

        $resultado= "Peso  es  normal";
        $color="green";
     }

     if ($imc >= 24.9 && $imc< 29.9){

        $resultado= "Peso superior al   normal";
        $color="yellow";
     }


     if ($imc >=30 ){

        $resultado= "Obesidad";
        $color="orange ";
     }
     
}




/*echo "<pre>";
print_r($_POST);
echo"</pre>";esto es una arai*/
/*el siguente codigo fue el  que me traje de calculadora.html*/

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

<meta charset =  "utf-8">

<title>Calculadra</title>
</head>
<body>
<h2> Calculadora IMC</h2>
<h3> No es Belleza , es Salud </h3>

<br>

<form class="" action="calculadora_imc.php" method="POST">
Peso (kg) <br> <input type="number" step="0.01" name="peso" value="" placeholder=" tu peso en kilogramos"required ><br><br>
Altura(m)<br>  <input type="number" step="0.01" name="altura" value="" placeholder=" tu altura en metros" required ><br><br>
<input type="submit" name="" value="CALCULAR">
</form> <br> 


   
    <?php echo "Tu I.M.C es de ->".$imc; ?>

    <br>
    <div style=" color:<?php echo $color;?>" >Resultado:<?PHP  echo $resultado;?> </div>
    
 

</body>
</html>

