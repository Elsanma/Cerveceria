<?php

namespace config;
class Request {
    private $controlador;
    private $metodo;
    private $parametros;

    public function __construct() {
      $metodoRequest = $this->getMetodoRequest();
      $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); //Esta función se utiliza para validar las variables de fuentes inseguras, como la entrada de un usuario.
      $urlToArray = explode("/", $url);
      $ArregloUrl = array_filter($urlToArray);

      if(empty($ArregloUrl)) {
           // Si Arreglo Url esta vacio, cargo el controlador por defecto
           $this->controlador = 'class1';
      } else {
           // Quito el primer elemento del array y lo uso como controlador
           $this->controlador = ucwords(array_shift($ArregloUrl));
      }
      if(empty($ArregloUrl)) {
           // Si Arreglo Url esta vacio, cargo el index por defecto
           $this->metodo = 'index';
      } else {
           // Quito el primer elemento del array y lo uso como metodo
           $this->metodo = array_shift($ArregloUrl);
      }
      if($metodoRequest == 'GET') {
           if(!empty($ArregloUrl)) {
                $this->parametros = $ArregloUrl;
           }
      } else {
           $this->parametros = $_POST;
      }
 }

    /**
    * @return String
    */
    public static function getMetodoRequest()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    /**
    * @return String
    */
    public function getControlador() {
        return $this->controlador;
    }
    /**
    * @return String
    */
    public function getMetodo() {
        return $this->metodo;
    }
    /**
    * @return Array
    */
    public function getParametros() {
        return $this->parametros;
    }
}
