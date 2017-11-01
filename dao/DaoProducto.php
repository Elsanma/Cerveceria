<?php
    namespace dao;
    use dao\InterfaceDao as IDao;
    use dao\SingletonAbstractDao as Singleton;
    use dao\Connection as Connection;
    use models\classProducto as Class1;

    class DaoProducto extends Singleton implements IDao
    {
      protected $myPdo;
      public function getAll()
      {
        try
        {
          $class1Array = array();
          Connection::Conectar();

          $query=$this->myPdo->prepare("SELECT * FROM productos");
          $query->execute();
          $result = $query->fetchAll();

          foreach ($result as $a) {

            $class1Array[]= new Class1($a['id'],$a['nombre'],$a['capacidad']);
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
          $capacidad=$class1Object->getCapacidad();
          Connection::Conectar();
          $query = $this->myPdo->prepare("INSERT into productos (nombre,capacidad) values ('$nombre','$capacidad') ");
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
          $class1 = $this->myPdo->prepare("SELECT * from productos where id = $id");
          $class1->execute();
          $class1 = $class1->fetch();

          $retorno= new Class1($class1['id'],$class1['nombre'],$class1['capacidad']);

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
          $class1 = $this->myPdo->prepare("DELETE FROM productos WHERE id = '$id' ");
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
          $capacidad=$class1Object->getCapacidad();
          $id=$class1Object->getId();
          $query = $this->myPdo->prepare(
            "UPDATE productos SET
            nombre = '$nombre',
            capacidad = '$capacidad'
            WHERE id = '$id' ");
          if($query->execute()){
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
