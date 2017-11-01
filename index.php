<?php
  require('config/Config.php');

  if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "")
  {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
   // error_reporting(E_ALL);

    require('config/Autoload.php');
    require('controllers/Controller.php');
    Config\Autoload::iniciar();
    if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") { session\Functions::redirect("class1"); }
    require(HOST_URL_THEME);
    config\Router::direccionar(new config\Request());
  }
  else
  {?>

<html>
  <!-- Aca empieza el encabezado de la pagina -->
  <head>
    <title>Cerveceria</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
  </head>
  <!-- Aca termina el encabezado de la pagina -->


  <!-- Aca empieza el cuerpo. Desde aca se ve el contenido de la pagina-->
  <body>


    <!-- Aca empieza la barra superior -->
    <nav class="navbar navbar-default navbar-inverse" style=" margin-bottom: -0px; border-radius: 0px;min-height:0px;">
      <ul class="nav nav-tabs nav-justified">
        <li class="nav-item nav-pills nav-fill   text-center">
          <a href="#" class="fx">INICIO</a>
        </li>
        <li class="nav-item nav-pills nav-fill   text-center">
          <a href="#ingredientes" class="fx">INGREDIENTES</a>
        </li>
        <li class="nav-item nav-pills nav-fill   text-center">
          <a href="#Cliente" class="fx">CLIENTE</a>
        </li>
        <li class="nav-item nav-pills nav-fill   text-center fx">
          <a href="#Cerveza" class="fx">CERVEZA</a>
        </li>
      </ul>
    </nav>
    
    <!-- Aca termina la barra superior -->


    <!-- Aca empieza el encabezado con la imagen de fondo -->
    <header class="container-fluid img-fondo"  id="home">
      <div class="row">
        <div class="col-md-6" style="padding-top: 50px;">
          <section class="col-md-4" style="background: black; border-radius: 15px 15px 50px 15px; padding-top: 15px;">
            <form class="" name="contact_form" id="contact_form" method="post" action="">
              <input type="hidden" name="mode" value="login">
              <fieldset >
                <input type="text" placeholder="Nombre de usuario" id="username" name="username" required="">
                <br>
                <input type="password" placeholder="Contraseña" id="user_password" name="user_password" required="">
                <br>
                <button type="submit">Ingresar</button>
                <!-- Datos de acceso: admin / admin -->
              </fieldset>
            </form>
          </section>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-offset-6 col-md-6 ">
          <h1 style="font-size: 80px;color: #605F5F;">Nombre cerveceria</h1>
          <h2 class="text-center " style="font-size: 46px;color: #9B9898;">Eslogan</h2>
        
        </div>
      </div>
    </header>
    <!-- Aca termina el encabezado con la imagen de fondo -->


    <!-- Aca empieza la seccion Ingredientes -->

    <section class="container-fluid" id="ingredientes" style="min-height: 60%; background-color: lightgrey;">
      <div class="row">
        <h3 class="text-center"><span class="">INGREDIENTES</span></h5>
        <p class="text-center">
          Agua decolorada: 30 litros<br>
          Malta de cebada: 4.5 Kilogramos<br>
          Lúpulo: 25 gramos<br>
          Levadura: un sobre<br>
          Azúcar: una cucharada<br>
        </p>
      </div>
    </section>
    <!-- Aca termina la seccion Ingredientes -->

    <!-- Aca empieza la seccion Clientes -->
    <div class="row" id="Cliente" style="">
      <div class="" style="">
        <h3 class="text-center"><span class="">CLIENTE</span></h5>

      </div>
    </div>
    <!-- Aca empieza la seccion Ingredientes -->
    <div class="row" id="Cerveza" >
      <div class="" >
        <h3 class="text-center"><span class="">CERVEZA</span></h3>
      </div>
    </div>
    <!-- Aca comienza el pie de pagina -->
    <footer class="row text-center">
        Esta aplicación ha sido desarrollada y probada en PHP v5.6.25.<br>
        Se recomienda su uso a fin de evitar errores.<br>
        Tanto la versión de PHP como la base de datos utilizada se encuentran en la carpeta raiz de la aplicación.
    </footer>
    <!-- Aca termina el pie de pagina -->


    <!-- Aca empieza el codigo JavaScript -->
    <script src="js/script.js"></script>
    <script>
      window.onload = function(){
        play();
      }
    </script>
    <!-- Aca termina el codigo JavaScript -->
  </body>
   <!--Aca termina el cuerpo de la pagina -->
</html>

<?php
$mode = $_REQUEST["mode"];
if ($mode == "login") {
    $username = trim($_POST['username']);
    $pass = trim($_POST['user_password']);
    if ($username == "" || $pass == "") {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "";
    } else {
        $sql = "SELECT * FROM system_users WHERE u_username = :uname AND u_password = :upass ";
        try {
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":uname", $username);
            $stmt->bindValue(":upass", $pass);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if (count($results) > 0) {
                $_SESSION["errorType"] = "success";
                $_SESSION["errorMsg"] = "";
                $_SESSION["user_id"] = $results[0]["u_userid"];
                $_SESSION["rolecode"] = $results[0]["u_rolecode"];
                $_SESSION["username"] = $results[0]["u_username"];
                session\Functions::redirect("class1");
                exit;
            } else {
                $_SESSION["errorType"] = "info";
                $_SESSION["errorMsg"] = "Usuario o contraseña incorrectos.";
            }
        } catch (Exception $ex) {

            $_SESSION["errorType"] = "danger";
            $_SESSION["errorMsg"] = $ex->getMessage();
        }
    }
    session\Functions::redirect("index.php");
  }
}
