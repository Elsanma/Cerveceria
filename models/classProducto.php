<?php
namespace models;

/**
 * @author Agustin Zubiaurre
 * @version 1.0
 * @created 17-oct.-2017 09:38:35
 */
class classProducto
{
	public $nombre;
	public $capacidad;
/*
	function __construct classTipoCerveza()
	{
		//vacio papu
	}
*/
	public function __construct($nombre='',$capacidad='')
	{
		$this->nombre = $nombre;
		$this->capacidad = $capacidad;
	}

	public function getCapacidad()
	{
		return $this->capacidad;
	}

	public function getNombre()
	{
		return $this->nombre;
	}
	/**
	 *
	 * @param newVal
	 */
	public function setCapacidad(String $newVal)
	{
		$this->capacidad = $newVal;
	}

	/**
	 *
	 * @param newVal
	 */

	public function setNombre(String $newVal)
	{
		$this->nombre = $newVal;
	}

}
?>
