<?php
  namespace Controllers;
  use models\Class1Class as Class1;
  use dao\DaoClass1 as MyDao;
  use dao\Connection as Connection;
  use Controllers\Controller as Controller;
  use Config\Request as Request;

  class Class1Controller extends Controller {
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
        $this->view('class1/index',['class1' => $class1]);
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
        $this->view('class1/create');
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function store($columnaA = '', $columnaB = '', $columnaC = '')
    {
      try
      {
        $v = new Class1();
        if($_POST)
        {
            $v->columnaA = $columnaA;
            $v->columnaB = $columnaB;
            $v->columnaC = $columnaC;
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
        $this->view('class1/edit',['class1' => $class1]);
      }
      catch (Exception $ex)
      {
        echo $ex->getMessage();
        die;
      }
    }
    public function update( $id = '', $columnaA = '',$columnaB = '', $columnaC = '')
    {
      try
      {
        $class1 = MyDao::getOne($id);
        $class1->id = $id;
        $class1->columnaA = $columnaA;
        $class1->columnaB = $columnaB;
        $class1->columnaC = $columnaC;
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
