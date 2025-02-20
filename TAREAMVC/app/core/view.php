<?php
    class view{
        public function show($name, $vars = array()){
            //$name - nombre de nuestra plantilla, por ej, listar.php
            //$vars - contenedor de variables,
            // es un array del tipo clave => valor (opcional).
            //Cogemos una instancia de nuestra clase de configuración.
            $config = Config::getInstance();
            //Creamos la ruta real a la plantilla
            $path = $config->get('../app/vista') . $name;
            
            //Si no existe el fichero en cuestión, lanzamos una excepción
            if(file_exists($path) == false){
                throw new Exception ('La plantilla ' . $path . ' no existe');
            }
            //Si hay variables para asignar, las pasamos una a una.
            if(is_array($vars)){
                foreach ($vars as $key => $value){
                    $$key = $value;
                }
            }
            //Finalmente, incluimos la plantilla.
            include($path);
        }
    }
/*
El uso es bastante sencillo:
$vista = new View();
$vista->show('listar.php', array("nombre" => "Juan"));
*/
?>
