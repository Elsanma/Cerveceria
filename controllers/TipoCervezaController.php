<?php
  namespace Controllers;
  use models\classTipoCerveza as Class1;
  use dao\DaoTipoCerveza as MyDao;
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
        $this->view('TipoCerveza/index',['classTipoCerveza' => $class1]);
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
        $this->view('TipoCerveza/create');
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function store($nombre = '', $descripcion = '', $precio_litro = '')
    {
      try
      {
        $v = new Class1();
        if($_POST)
        {
            $v->nombre = $nombre;
            $v->descripcion = $descripcion;
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
        $this->view('TipoCerveza/edit',['TipoCerveza' => $class1]);
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function update( $id = '', $nombre = '',$descripcion = '', $precio_litro = '')
    {
      try
      {
        $class1 = MyDao::getOne($id);
        $class1->id = $id;
        $class1->nombre = $nombre;
        $class1->descripcion = $descripcion;
        $class1->precio_litro = $precio_litro;
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
