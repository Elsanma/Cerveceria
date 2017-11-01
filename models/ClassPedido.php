<?php
  namespace models;
  class ClassPedido {
      public $estado;
      public $fecha;
      public $lineaPedido=array();

     public function __construct($e='',$f='')
      {
          $this->estado = $e;
          $this->fecha = $f;
      }
      public function getEstado(){
          return $this->estado;
      }
      public function setEstado($estado)
      {
          $this->estado = $estado;
      }
      public function getFecha(){
          return $this->fecha;
      }
      public function setFecha($fecha)
      {
          $this->fecha = $fecha;
      }
      public function getLinea(){
          return $this->lineaPedido;
      }
      public function setLinea($lineaPedido)
      {
          $this->lineaPedido = $lineaPedido;
      }

    public function agregarLinea($dato)
    {
      $this->$lineaPedido=$dato;
    }

    public function borrarLinea($dato)
    {
      foreach ($lineaPedido as $i => $value)
      {
        unset($lineaPedido[$i]);
      }
    }

  }
?>