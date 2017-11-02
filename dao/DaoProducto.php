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
          $class1 = $this->myPdo->prepare("SELECT * FROM productos");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoProducto::class);
          $class1->execute();


          while($row = $class1->fetch()){
            //print_r($row);
              $v = new Class1();
              $v->id = $row->id;
              $v->nombre = $row->nombre;
              $v->capacidad = $row->capacidad;
              $class1Array[] = $v;
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
          Connection::Conectar();
          $class1 = $this->myPdo->prepare("INSERT into productos (nombre,capacidad) values ('$class1Object->nombre','$class1Object->capacidad')");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoProducto::class);
          if($class1->execute()){
              echo 'Agregado a la base de datos';
          };
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
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoProducto::class);
          $class1->execute();
          $class1 = $class1->fetch();
          return $class1;
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
          $class1 = $this->myPdo->prepare("DELETE FROM productos WHERE id = '$class1Object->id' ");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoProducto::class);
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
          $class1 = $this->myPdo->prepare(
            "UPDATE productos SET
            nombre = '$class1Object->nombre',
            capacidad = '$class1Object->capacidad'
            WHERE id = '$class1Object->id' ");           
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoProducto::class);
          var_dump($class1);
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
