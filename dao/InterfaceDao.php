<?php
namespace dao;
interface InterfaceDao
{
  public function insert($dato);
  public function getAll();
  public function getOne($dato);
  public function delete($dato);
  public function update($dato);
}
?>
