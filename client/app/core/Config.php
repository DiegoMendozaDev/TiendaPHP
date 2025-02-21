<?php
class Config
{

    private $vars;
    private static $instance;

    private function __construct()
    {
        $this->vars = [];
    }

    public function set($name, $value)
    {
        if (!isset($this->vars[$name])) {
            $this->vars[$name] = $value;
        }
    }
    public function get($name)
    {
        if (isset($this->vars[$name])) {
            return $this->vars[$name];
        }
    }
    public static function getInstance()
    {
        /**
         * Otra forma de hacerlo
         *  if(!isset(self::$instance)){
         *      $class = __CLASS__; 
         *      self::$instance = new $class();  
         *  }
         */
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
/**
 * uso:
 * $instancia = Config::getInstance();
 * $instancia->setValue('host','localhost');
 * echo $instacia->get('host'); //'localhost'
 */
