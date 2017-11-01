<?php
    namespace config;
    class Router {
        public static function direccionar(Request $request) {
            $controlador = $request->getControlador() . 'Controller';
            $ruta = $_SESSION["ROOT_DIR"] . 'controllers' . DS . $controlador . '.php';
            $metodo = $request->getMetodo();
            if($metodo == 'index.php'){
                $metodo = 'index.php';
            }
            $parametros = $request->getParametros();
            if(is_readable($ruta)){
                require_once($ruta);
                $mostrar = "controllers\\" . $controlador;
                $controlador = new $mostrar;
                if(!isset($parametros)) {
                    $datos = call_user_func(array($controlador, $metodo));
                } else {
                    $datos = call_user_func_array(array($controlador, $metodo), $parametros);
                }
            }
            $ruta = $_SESSION["ROOT_DIR"] . "views" . DS . $request->getControlador() . DS . $request->getMetodo() . ".php";
            if(is_readable($ruta)){
                require_once($ruta);
            }

        }
    }

?>
