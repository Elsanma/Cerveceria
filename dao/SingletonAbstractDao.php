<?php
namespace dao;
class SingletonAbstractDao
{
    private static $instance;
    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function __clone()
    {
        trigger_error("Operación Invalida: No puedes clonar una instancia de ". get_class($this) ." class.", E_USER_ERROR );
    }
    public function __wakeup()
    {
        trigger_error("No puedes deserializar una instancia de ". get_class($this) ." class.");
    }
}
?>
