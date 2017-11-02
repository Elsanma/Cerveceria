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
        $this->view('Producto/index',['classProducto' => $class1]);
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
        $this->view('Producto/create');
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
            $v->nombre = $nombre;
            $v->capacidad = $capacidad;
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
        $this->view('Producto/edit',['Producto' => $class1]);
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
        $class1->id = $id;
        $class1->nombre = $nombre;
        $class1->capacidad = $capacidad;
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
