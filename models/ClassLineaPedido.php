<?php
  namespace models;
  class ClassLineaPedido {
      public $nombre;
      public $cantidad;
      public $importe;
      

     public function __construct($nombre='',$cantidad='',$importe='')
      {
          $this->nombre = $nombre;
          $this->cantidad = $cantidad;
          $this->importe = $importe;
      }
      public function getNombre(){
          return $this->nombre;
      }
      public function setNombre($nombre)
      {
          $this->nombre = $nombre;
      }
      public function getCantidad(){
          return $this->cantidad;
      }
      public function setCantidad($cantidad)
      {
          $this->cantidad = $cantidad;
      }
      public function getImporte(){
          return $this->importe;
      }
      public function setImporte($importe)
      {
          $this->importe = $importe;
      }
  }
?>