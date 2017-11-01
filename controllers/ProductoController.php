<?php
  namespace Controllers;
  use models\classProducto as Class1;
  use dao\DaoProducto as MyDao;
  use dao\Connection as Connection;
  use Controllers\Controller as Controller;
  use Config\Request as Request;

  class ProductoController extends Controller {
    protected $class1;

    public function __construct()
    {
        $this->class1 = new Class1();
    }
    public function index()
    {
      try
      {
        $class1 = MyDao::getAll();
        require_once "views/Producto/index.php";
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function create()
    {
      try
      {
        require_once "views/Producto/create.php";
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function store($nombre = '', $capacidad = '')
    {
      try
      {
        $v = new Class1();
        if($_POST)
        {
            $v->setNombre($nombre);
            $v->setCapacidad($capacidad);
            MyDao::insert($v);
         }
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function edit($id)
    {
      try
      {
        $class1 = MyDao::getOne($id);
        require_once "views/Producto/edit.php";
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function update( $id = '', $nombre = '',$capacidad = '')
    {
      try
      {
        $class1 = MyDao::getOne($id);
        $class1->setId($id);
        $class1->setNombre($nombre);
        $class1->setCapacidad($capacidad);
        MyDao::update($class1);
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }

    public function delete($id)
    {
      try
      {
        $class1 = MyDao::getOne($id);
        MyDao::delete($class1);
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
 }
?>
