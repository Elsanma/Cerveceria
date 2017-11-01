<?php
  namespace config;
  class Autoload
  {
      public static function iniciar()
      {
          spl_autoload_register(function($classPath)
          {
      			$class = str_replace("\\", "/", $classPath)  . ".php";
      			include_once($class);
          });
      }
  }
?>
