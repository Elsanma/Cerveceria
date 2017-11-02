<?php
namespace Views;
$template = new Template();
class Template
{
	public function __construct() {
		$url = HOST_URL;
		echo
		'
		<!DOCTYPE html>
		<html>
		  <head>
		    <title></title>
		    <meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<link rel="stylesheet" type=text/css href="css/bootstrap.min.css">
    		<link rel="stylesheet" type=text/css href="css/style.css">
    		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
		    <style>
					body {
						overflow: hidden;
					}
					aside {
						float: left;
						width: 20%;
						height: 100vh;

						box-sizing: border-box;
						padding: 25px;
					}
					section {
						float: left;
						width: 80%;
						box-sizing: border-box;
						padding: 25px;
					}
					th, td {
				    border: 1px solid #333;
				    margin: 0;
				    padding: 10px;
					}
					button {
				    float: left;
				    margin-right: 5px;
					}
					.bottom {
					    position: absolute;
					    bottom: 300px;
					}
		    </style>
		  </head>
		  <body>
		  <header class="imagen-fondo2 container escala-grises-50" id="home">
				<aside>
	        <a class="boton bloque color-negro"  href="'.HOST_URL.'class1">
	          <span>Clase 1</span>
	        </a>
					<br>
					<a class="boton bloque color-negro" href="'.HOST_URL.'TipoCerveza">
	          <span>Tipo de Cerveza</span>
	        </a>
					<br>

					<a  class="boton bloque color-negro" href="'.HOST_URL.'Producto">
	          <span>Producto</span>
	        </a>
					<br>
					<div class="bottom">
						<a href="'.HOST_URL.'config/logout.php">
							<span class="hidden-xs boton bloque color-negro"><i class="fa fa-sign-out"></i> Cerrar Sesión</span>
						</a>
					</div>
				</aside>
				<section>
			</header>
			';
	}
	public function __destruct(){
		echo '</section></body></html>';
	}
}
?>