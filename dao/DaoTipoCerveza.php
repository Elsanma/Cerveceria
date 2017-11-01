<?php
    namespace dao;
    use dao\InterfaceDao as IDao;
    use dao\SingletonAbstractDao as Singleton;
    use dao\Connection as Connection;
    use models\classTipoCerveza as Class1;

    class DaoTipoCerveza extends Singleton implements IDao
    {
      protected $myPdo;
      public function getAll()
      {
        try
        {
          $class1Array = array();
          Connection::Conectar();

          $query=$this->myPdo->prepare("SELECT * FROM tipocerveza");
          $query->execute();
          $result = $query->fetchAll();

          foreach ($result as $a) {

            $class1Array[]= new Class1($a['id'],$a['nombre'],$a['descripcion'],$a['precio_litro']);
          }

          $conexion = null;

          return $class1Array;

        }
        catch (Exception $ex)
        {
          echo $ex->getMessage();
          die;
        }
      }
      public function insert($class1Object)
      {
        try
        {
          $nombre=$class1Object->getNombre();
          $descripcion=$class1Object->getDescripcion();
          $precio=$class1Object->getPrecioLitro();
          Connection::Conectar();
          $query = $this->myPdo->prepare("INSERT into tipocerveza (nombre,descripcion,precio_litro) values ('$nombre','$descripcion','$precio') ");
          $query->execute();
          $query->fetchAll();
          echo 'Agregado a la base de datos';

        }
        catch (Exception $ex)
        {
          echo $ex->getMessage();
          die;
        }
      }
      public function getOne($id)
      {
        try
        {
          Connection::Conectar();
          $class1 = $this->myPdo->prepare("SELECT * from tipocerveza where id = $id");
          $class1->execute();
          $class1 = $class1->fetch();

          $retorno= new Class1($class1['id'],$class1['nombre'],$class1['descripcion'],$class1['precio_litro']);

          return $retorno;
        }
        catch (Exception $ex)
        {
          echo $ex->getMessage();
          die;
        }
      }
      public function delete($class1Object)
      {
        try
        {
          Connection::Conectar();
          $id=$class1Object->getId();
          $class1 = $this->myPdo->prepare("DELETE FROM tipocerveza WHERE id = '$id' ");
          if($class1->execute()){
              echo 'Eliminado de la base de datos';
          };
        }
        catch (Exception $ex)
        {
          echo $ex->getMessage();
          die;
        }
      }
      public function update($class1Object)
      {
        try
        {
          Connection::Conectar();
          $nombre=$class1Object->getNombre();
          $descripcion=$class1Object->getDescripcion();
          $precio=$class1Object->getPrecioLitro();
          $id=$class1Object->getId();
          $class1 = $this->myPdo->prepare(
            "UPDATE tipocerveza SET
            nombre = '$nombre',
            descripcion = '$descripcion',
            precio_litro = '$precio'
            WHERE id = '$id' ");
          if($class1->execute()){
              echo 'Actualizado en la base de datos';
          };
        }
        catch (Exception $ex)
        {
          echo $ex->getMessage();
          die;
        }
      }
    }
?>
