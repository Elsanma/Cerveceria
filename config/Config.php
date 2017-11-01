<?php

    // Session config start
    error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
    ob_start();
    session_start();

    // Constantes Server
    define('DS', DIRECTORY_SEPARATOR);

    $_SESSION["ROOT_DIR"] = ($_SERVER['DOCUMENT_ROOT']).dirname($_SERVER['PHP_SELF'])."/";
    define('HOST_URL_THEME',  $_SESSION["ROOT_DIR"] . 'views' . DS . 'template.php');
    define('HOST_URL', '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/");
    //$_SESSION["ROOT_DIR"] = '/opt/lampp/htdocs/2017/utn/';
    //define('HOST_URL', '/2017/utn/');

    if( $_SERVER['SERVER_NAME'] == "localhost")
    {
      define('DB_DRIVER', 'mysql');
      define("DB_NAME", "utn");
      define("DB_USER", "root");
      define("DB_PASS", "");
      define("DB_HOST", "localhost");
    }
    else {
      define('DB_DRIVER', 'mysql');
      define("DB_NAME", "ev000166_utn");
      define("DB_USER", "ev000166_utn");
      define("DB_PASS", "foSOvi12ti");
      define("DB_HOST", "localhost");
    }

    // Session config start
    $dboptions = array(
      PDO::ATTR_PERSISTENT => FALSE,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    try {
      $DB = new PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS , $dboptions);
    } catch (Exception $ex) {
      echo $ex->getMessage();
      die;
    }

    require_once 'functions.php';

    if ($_SESSION["errorType"] != "" && $_SESSION["errorMsg"] != "" ) {
        $ERROR_TYPE = $_SESSION["errorType"];
        $ERROR_MSG = $_SESSION["errorMsg"];
        $_SESSION["errorType"] = "";
        $_SESSION["errorMsg"] = "";
    }
    // Session config end

    //PUBLIC
    define("URL_PUBLIC_CSS", 'public' . DS . "css"); //direccion de la carpeta css
    define("URL_PUBLIC_JS", 'public' . DS . "js"); //direccion de la carpeta js
    define("URL_PUBLIC_IMG", 'public' . DS . "img"); //direccion de la carpeta imagenes

    // THEME
    define('THEME_NAME', 'templates.v1'); //nombre del theme
    define("URL_THEME", 'views' . DS . THEME_NAME . DS); //direccion del theme
    define("URL_CSS",  URL_THEME . "css"); //direccion de la carpeta css
    define("URL_JS", URL_THEME . "js"); //direccion de la carpeta js
    define("URL_IMG", URL_THEME . "img"); //direccion de la carpeta imagenes
?>
