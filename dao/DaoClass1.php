<?php
    namespace dao;
    use dao\InterfaceDao as IDao;
    use dao\SingletonAbstractDao as Singleton;
    use dao\Connection as Connection;
    use models\Class1Class as Class1;

    class DaoClass1 extends Singleton implements IDao
    {
      protected $myPdo;
      public function getAll()
      {
        try
        {
          $class1Array = array();
          Connection::Conectar();
          $class1 = $this->myPdo->prepare("SELECT * FROM class1");
          $class1->setFetchMode(\PDO::FETCH_CLASS, Class1::class);
          $class1->execute();

          while($row = $class1->fetch()){
              var_dump($row);
              $v = new Class1();
              $v->id = $row->id;
              $v->columnaA = $row->columnaA;
              $v->columnaB = $row->columnaB;
              $v->columnaC = $row->columnaC;
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
          $class1 = $this->myPdo->prepare("INSERT into Class1 (columnaA,columnaB,columnaC) values ('$class1Object->columnaA','$class1Object->columnaB','$class1Object->columnaC')");
          $class1->setFetchMode(\PDO::FETCH_CLASS, Class1::class);
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
          $class1 = $this->myPdo->prepare("SELECT * from Class1 where id = $id");
          $class1->setFetchMode(\PDO::FETCH_CLASS, Class1::class);
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
          $class1 = $this->myPdo->prepare("DELETE FROM Class1 WHERE id = '$class1Object->id' ");
          $class1->setFetchMode(\PDO::FETCH_CLASS, Class1::class);
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
            "UPDATE Class1 SET
            columnaA = '$class1Object->columnaA',
            columnaB = '$class1Object->columnaB',
            columnaC = '$class1Object->columnaC'
            WHERE id = '$class1Object->id' ");
          $class1->setFetchMode(\PDO::FETCH_CLASS, Class1::class);
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
