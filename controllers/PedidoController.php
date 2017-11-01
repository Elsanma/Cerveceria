<?php
  namespace Controllers;
  use models\ClassPedido as Class1;
  use dao\DaoPedido as MyDao;
  use dao\Connection as Connection;
  use Controllers\Controller as Controller;
  use Config\Request as Request;

  class TipoCervezaController extends Controller {
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
        $this->view('Pedido/index',['ClassPedido' => $class1]);
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
        $this->view('Pedido/create');
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function store($estado = '', $fecha = '')
    {
      try
      {
        $v = new Class1();
        if($_POST)
        {
            $v->estado = $estado;
            $v->fecha = $fecha;
            $v->precio_litro = $precio_litro;
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
        $this->view('Pedido/edit',['Pedido' => $class1]);
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function update( $id = '', $estado = '',$fecha = '')
    {
      try
      {
        $class1 = MyDao::getOne($id);
        $class1->id = $id;
        $class1->estado = $estado;
        $class1->fecha = $fecha;
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