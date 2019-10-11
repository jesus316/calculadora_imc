


<?php


$mysqli= mysqli_connect("localhost", "root",  "","imc" );

if($mysqli==false){
  echo "Hubo problema de conexion";
  die();
}
//consulta para traer los promedios, peso maximo  y la cuenta
 $consulta = "SELECT AVG(`datos_imc`) AS 'imc_promedio', AVG(`datos_peso`) AS 'peso_promedio' , AVG(`datos_altura`) AS 'altura_promedio',MAX(`datos_peso`) AS 'peso_maximo' , COUNT(*) AS 'cantidad' FROM `datos` WHERE 1";
 
 $resultado = $mysqli->query($consulta);
 $fila = $resultado->fetch_assoc(); 

$imc_promedio = $fila['imc_promedio'];
$peso_promedio = $fila['peso_promedio'];
$altura_promedio = $fila['altura_promedio'];
$peso_maximo = $fila['peso_maximo'];
$cantidad = $fila['cantidad'];


 $imc="";
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
        $color="blue";
     }


     if ($imc >=30 ){

        $resultado= "Obesidad";
        $color="orange ";
     }

     $mysqli->query("INSERT INTO `datos` ( `datos_altura`, `datos_peso`, `datos_imc`) VALUES ( '".$altura."', '".$peso."', '".$imc."');");
     
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Calculadora IMC </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">CALCULADORA IMC </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contactemos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Bienvenisdos a Calculadora IMC </h1>
      <p class="lead"> No es Belleza , Es Salud! </p>
      </div>

     

  </header>


  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="csrd mb-4">
            <img class="card-img-top" src="IMAGENES/BUENA SALUD.jpg" alt="Card image cap">
            <div class="card-body">
                <h2 class ="cardd-title" >Calcula Tu IMC </h2>
                <p class="card-tet">No es Belleza, es Salud!</p> 
                <div class="row">
                  <div clas="col-lg-6">
                      <form class="" action="index.php" method="POST">
                      Peso (kg) <br> <input type="number" step="0.01" name="peso" value="" placeholder=" tu peso en kilogramos"required ><br><br>
                      Altura(m)<br>  <input type="number" step="0.01" name="altura" value="" placeholder=" tu altura en metros" required ><br><br>
                      <input type="submit" class="btn btn-primary" name="" value="CALCULAR">
                      </form> <br>
                    </div> 
                  <div class="col-lg-6">

                    <?php echo "Tu I.M.C es de ->".$imc; ?>
                    <br>
                    <div style =" color:<?php echo $color;?>" >Resultado --> <?PHP  echo $resultado;?> </div>
                  </div>
                </div>
            <div class="card-footer text-muted">
              Consulta más información
              <a href="#">Clinica De Salud</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>



  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>
               Estadisticas</h2>

        <div class ""> 
         <b>IMC PROMEDIO:</b> <?=$imc_promedio; ?> </br>
         <b>PESO PROMEDIO:</b><?=$peso_promedio; ?></br>
         <b>ALTURA PROMEDIO:</b><?=$altura_promedio; ?></br>
         <b>PESO MAXIMO :</b><?=$peso_maximo; ?></br>
         <b>CANTIDAD:</b> <?=$cantidad; ?></br>
        </div>
      </div>
      </div>
    </div>
  </section>


  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>
               Servicios que ofrecemos</h2>
          <p class="lead">Desde 1950, cada 7 de abril se celebra el Día Mundial de la Salud, precisamente para conmemorar la fundación de la Organización Mundial de la Salud (OMS). A tan solo unos días de celebrarlo, es importante mirar a nuestro alrededor y concientizarnos acerca de los problemas que están afectando nuestra salud, tal como la obesidad y el sobrepeso. La Organización Mundial de la Salud (OMS) define la salud como un estado completo de bienestar físico, mental y social, y no solamente la ausencia de afecciones o enfermedades. Es decir, la salud es una condición de bienestar que va más allá de la ausencia de enfermedad. <br> En nuestra clinica Nutricional ofrecemos diferentes servicios que lograra un mejor funcionamiento de tu cuerpo y mente por los mejores mèdicos nutricionistas que te guiaran con una dieta balanceada acompañada con una instruccion de  los ejercicios adecuados de acuerdo a su condiciòn fisica  que te ayudaran a estar en el peso ideal y  a su masa corporal  correspondiente.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contactenos </h2>
          <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">  ¡Mantengámonos en contacto!         </h2>
                        
          <hr class="divider my-4">
          <p class="text-muted mb-5">Llámenos o envíenos un correo electrónico y nos pondremos en contacto con usted lo antes posible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>  Telefono: 3017129529<br> Telefono : 3164390454
           </div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">dinabosa7@bmail.com <br> jesus3007654372@gmail.com</a>
        </div>
      </div>
    </div>
  </section>


          </div>
      </div>
    </div>
  </section>

  

  <!-- Footer -->S
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">dinabosa@gmail.com <br>Su Sitio Web Calculador de I.M.C  2019 <br> Telefono : 3017129529 - 3164390454<br> </br> Elaborado por: Dina luz Bossa  y Jesus Gonzalez</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
