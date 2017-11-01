<?php
namespace models;

/**
 * @author Agustin Pedrosa
 * @version 1.0
 * @created 17-oct.-2017 09:38:35
 */
class classTipoCerveza
{
	private $id;
	private $nombre;
	private $descripcion;
	private $precio_litro;
/*
	function __construct classTipoCerveza()
	{
		//vacio papu
	}
*/
	public function __construct($id='',$nombre='',$descripcion='', $precio_litro='')
	{
		$this->id = $id;
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

	public function getId()
	{
		return $this->id;
	}

	/**
	 *
	 * @param newVal
	 */
	public function setDescripcion($newVal)
	{
		$this->descripcion = $newVal;
	}

	/**
	 *
	 * @param newVal
	 */
	public function setPrecioLitro($newVal)
	{
		$this->precio_litro = $newVal;
	}

	public function setNombre($newVal)
	{
		$this->nombre = $newVal;
	}

	public function setId($newVal)
	{
		$this->id = $newVal;
	}

}
?>
