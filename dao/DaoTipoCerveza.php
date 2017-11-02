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
          $class1 = $this->myPdo->prepare("SELECT * FROM tipocerveza");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoTipoCerveza::class);
          $class1->execute();


          while($row = $class1->fetch()){
            //print_r($row);
              $v = new Class1();
              $v->id = $row->id;
              $v->nombre = $row->nombre;
              $v->descripcion = $row->descripcion;
              $v->precio_litro = $row->precio_litro;
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
          $class1 = $this->myPdo->prepare("INSERT into tipocerveza (nombre,descripcion,precio_litro) values ('$class1Object->nombre','$class1Object->descripcion','$class1Object->precio_litro')");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoTipoCerveza::class);
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
          $class1 = $this->myPdo->prepare("SELECT * from tipocerveza where id = $id");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoTipoCerveza::class);
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
          $class1 = $this->myPdo->prepare("DELETE FROM tipocerveza WHERE id = '$class1Object->id' ");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoTipoCerveza::class);
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
            "UPDATE tipocerveza SET
            nombre = '$class1Object->nombre',
            descripcion = '$class1Object->descripcion',
            precio_litro = '$class1Object->precio_litro'
            WHERE id = '$class1Object->id' ");
          $class1->setFetchMode(\PDO::FETCH_CLASS, DaoTipoCerveza::class);
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
