<?php
class view
{
    public function mostrar($name, $vars = [])
    {
        //$name - nombre de nuestra plantilla, por ej, listar.php
        //$vars - contenedor de variables,
        // es un array del tipo clave => valor (opcional).
        //Cogemos una instancia de nuestra clase de configuración.
        $config = Config::getInstance();

        //Creamos la ruta real a la plantilla
        $path = $config->get('VIEWS_FOLDER') . $name;

        //Creamos la ruta real a la plantilla
        if (!file_exists($path)) {
            throw new Exception('La plantilla ' . $path . ' no existe');
        }

        //Si no existe el fichero en cuestión, lanzamos una excepción
        if (is_array($vars)) {
            foreach ($vars as $key => $value) {
                $$key = $value;
            }
        }

        include($path);
    }
    /**
     * Uso:
     * vista = new View();
     * vista->mostrat('libros_view',$libros);
     */
}
