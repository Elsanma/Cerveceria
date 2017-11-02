<?php
namespace models;

/**
 * @author Agustin Pedrosa
 * @version 1.0
 * @created 17-oct.-2017 09:38:35
 */
class classTipoCerveza
{
	public $nombre;
	public $descripcion;
	public $precio_litro;
/*
	function __construct classTipoCerveza()
	{
		//vacio papu
	}
*/
	public function __construct($nombre='',$descripcion='', $precio_litro='')
	{
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio_litro = $precio_litro;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function getPrecioLitro()
	{
		return $this->precio_litro;
	}

	public function getNombre()
	{
		return $this->nombre;
	}
	/**
	 *
	 * @param newVal
	 */
	public function setDescripcion(String $newVal)
	{
		$this->descripcion = $newVal;
	}

	/**
	 *
	 * @param newVal
	 */
	public function setPrecioLitro(int $newVal)
	{
		$this->precio_litro = $newVal;
	}

	public function setNombre(String $newVal)
	{
		$this->nombre = $newVal;
	}

}
?>
