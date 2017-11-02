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
    <nav class="navbar navbar-default navbar-inverse no-radius" style="margin-bottom: 0px; min-height:0px;">
      <ul class="nav nav-tabs nav-justified">
        <li class="nav-item nav-pills nav-fill   text-center">
          <a href="#" class="fx">INICIO</a>
        </li>
        <li class="nav-item nav-pills nav-fill   text-center">
          <a href="#ingredientes" class="fx">INGREDIENTES</a>
        </li>
        <li class="nav-item nav-pills nav-fill   text-center">
          <a href="#Cliente" class="fx">MAPA</a>
        </li>
        <li class="nav-item nav-pills nav-fill   text-center fx">
          <a href="#Cerveza" class="fx">CERVEZAS</a>
        </li>
      </ul>
    </nav>
    
    <!-- Aca termina la barra superior -->


    <!-- Aca empieza el encabezado con la imagen de fondo -->
    <header class="container-fluid img-fondo"  id="home">
      <div class="row" style="margin-bottom: 200px;">
        <div class="col-md-6" style="padding-top: 50px;">
          <div class="row">
            <div class="col col-md-4 col-md-offset-1 radius bg-negro " >
              <form class="" name="contact_form" id="contact_form" method="post" action="">
                <input type="hidden" name="mode" value="login">
                  <input type="text" placeholder="Nombre de usuario" id="username" name="username" required="">
                  <br>
                  <input type="password" placeholder="Contraseña" id="user_password" name="user_password" required="">
                  <br>
                  <button type="submit">Ingresar</button>
                  <!-- Datos de acceso: admin / admin -->
              </form>
            </div>
          </div>
        </div>
          <div class="col col-md-6 col-md-offset-5">
            <h1>Nombre cerveceria</h1>
            <h2 class="text-center">Eslogan</h2>
          </div>
      </div>
    </header>
    <!-- Aca termina el encabezado con la imagen de fondo -->


    <!-- Aca empieza la seccion Ingredientes -->

    <div class="container-fluid img-fondo5" id="ingredientes">
      <div class="row" style="margin-bottom: 200px;">
        <div class="col col-md-2 col-md-offset-5">
          <fieldset class="no-radius">
            <h3 class="text-center"><span class="tag blanco">INGREDIENTES</span></h3>
          </fieldset>
          <fieldset class="radius bg-negro opacidad">
            <p class="text-center blanco" >
              Agua decolorada: 30 litros<br>
              Malta de cebada: 4.5 Kilogramos<br>
              Lúpulo: 25 gramos<br>
              Levadura: un sobre<br>
              Azúcar: una cucharada<br>
            </p>
          </fieldset>
        </div>
        <div class="col-md-6 col-md-offset-3">
          <video class="greys" style="width:100%;" style="background:black" src="videos/inicio.mp4" id="myvideo" controls ></video>
        </div>
      </div>
    </div>
    <!-- Aca termina la seccion Ingredientes -->
  <div class="bg-gradient">
    <!-- Aca empieza la seccion Mapa -->
    <div class="row" id="Cliente" style="">
      <div class="col col-md-2 col-md-offset-5">
        <fieldset class="no-radius">
            <h3 class="text-center"><span class="tag blanco">MAPA</span></h3>
        </fieldset>
      </div>
    </div>
    <!-- Aca empieza la seccion Ingredientes -->
    <div class="row" id="Cerveza" >
      <div class="col col-md-2 col-md-offset-5">
        <fieldset class="no-radius" style="margin-top: 5px;">
            <h3 class="text-center"><span class="tag blanco">CERVEZAS</span></h3>
        </fieldset>
      </div>
    </div>

    <!-- Aca comienza el pie de pagina -->
    <footer class="row">
      <div class="col col-md-8 col-md-offset-2">
        <p class="text-center">
          Esta aplicación ha sido desarrollada y probada en PHP v5.6.25.<br>
          Se recomienda su uso a fin de evitar errores.<br>
          Tanto la versión de PHP como la base de datos utilizada se encuentran en la carpeta raiz de la aplicación.
        </p>
      </div>
    </footer>
    <!-- Aca termina el pie de pagina -->
</div>

    <!-- Aca empieza el codigo JavaScript -->
    <script src="js/script.js"></script>
    <script>
      window.onload = function(){
        play();
        macerar();
        hervir();
        enfriar();
        fermentar();
        madurar();
        embotellar();
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
