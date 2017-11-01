<?php
namespace models;

/**
 * @author Agustin Zubiaurre
 * @version 1.0
 * @created 17-oct.-2017 09:38:35
 */
class classProducto
{
	private $id;
	private $nombre;
	private $capacidad;
/*
	function __construct classTipoCerveza()
	{
		//vacio papu
	}
*/
	public function __construct($id='',$nombre='',$capacidad='')
	{
		$this->id = $id;
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

	public function getId()
	{
		return $this->id;
	}


	/**
	 *
	 * @param newVal
	 */
	public function setCapacidad($newVal)
	{
		$this->capacidad = $newVal;
	}

	/**
	 *
	 * @param newVal
	 */

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
