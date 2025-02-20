<?php
    class singleton{
        private static $instancia;
        private $db;
        private function __construct(){}
        public static function getInstance(){
            if(!self::$instancia instanceof self){
                self::$instancia = new self();
            }
            return self::$instancia;
        }
        public function connect(){
            if(is_null($this->db)){
                try{
                    $dsn = "mysql:host=localhost;dbname=usuarios2";
                    $user = "root";
                    $pwd = "";
                    $this->db = new PDO($dsn, $user, $pwd);
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "conexion correcta";
                }catch(PDOException $e){
                    echo "ERROR".$e;
                }
            }
            return $this->db;
        }
        

     
    }
    $conexion = singleton::getInstance()->connect();
    $conexion2 = singleton::getInstance()->connect();
    
    
?>
