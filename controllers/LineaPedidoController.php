<?php
  namespace Controllers;
  use models\ClassLineaPedido as Class1;
  use dao\DaoLineaPedido as MyDao;
  use dao\Connection as Connection;
  use Controllers\Controller as Controller;
  use Config\Request as Request;

  class LineaPedidoController extends Controller {
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
        $this->view('LineaPedido/index',['ClassLineaPedido' => $class1]);
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
        $this->view('LineaPedido/create');
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function store($nombre = '',$cantidad = '', $importe = '')
    {
      try
      {
        $v = new Class1();
        if($_POST)
        {
            $v->setNombre($nombre);
            $v->cantidad = $cantidad;
            $v->importe = $importe;
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
        $this->view('LineaPedido/edit',['LineaPedido' => $class1]);
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function update( $id = '', $nombre = '', $cantidad = '',$importe = '')
    {
      try
      {
        $class1 = MyDao::getOne($id);
        $class1->id = $id;
        $class1->nombre = $nombre;
        $class1->cantidad = $cantidad;
        $class1->importe = $importe;
        
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