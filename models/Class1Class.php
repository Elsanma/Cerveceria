<?php
  namespace models;
  class Class1Class {
      private $columna1;
      private $columna2;
      private $columna3;

     public function __construct($columna1='',$columna2='',$columna3='')
      {
          $this->columna1 = $columna1;
          $this->columna2 = $columna2;
          $this->columna3 = $columna3;
      }
      public function getColumna1(){
          return $this->columna1;
      }
      public function setColumna1($columna1)
      {
          $this->columna1 = $columna1;
      }
      public function getColumna2(){
          return $this->columna2;
      }
      public function setColumna2($columna2)
      {
          $this->columna2 = $columna2;
      }
      public function getColumna3(){
          return $this->columna3;
      }
      public function setColumna3($columna3)
      {
          $this->columna3 = $columna3;
      }
  }
?>
