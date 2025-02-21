<?php
class FrontController{
    static function main(){
        //Incluimos algunas clases:
        require '../app/core/Config.php'; //de configuración
        require '../app/core/DBLibreria.php';
        require '../app/core/view.php';
        //PDO con singleton
        //Mini motor de plantillas
        require '../app/config/config2.php'; //Archivo con configuraciones.
        //Con el objetivo de no repetir nombre de clases
        //nuestros controladores terminaran todos en _Controller.
        //Por ej, la clase controladora Libros, será Libros_Controller
        //Formamos el nombre del Controlador o en su defecto
        // tomamos que es el de Libros_Controller
        // Recuperamos el parámetro url introducido por .htaccess
        $url = isset($_GET['url']) ? $_GET['url'] : "/";
        // Dividimos la URL en partes.
        $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        // Asignamos el controlador y la acción a partir de la URL, o tomamos valores predeterminados.
        $controller = !empty($url[0]) ? $url[0] : $config->get('DEFAULT_CONTROLLER');;
        $controller = ucfirst($controller);
        $action = !empty($url[1]) ? $url[1] : $config->get('DEFAULT_ACTION');;
        // Añadimos soporte para parámetros adicionales.
        $params = array_slice($url, 2);
        $controller .= "_controlador";
        $controller_path = $config->get('CONTROLLERS_FOLDER') .
        $controller . '.php';
        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if (!is_file($controller_path)){
            throw new Exception('El controlador no existe ' .
            $controller_path . ' - 404 not found');
        }
        require $controller_path;
        //Si no existe la clase que buscamos y su método
        // mostramos un error
        if (!method_exists($controller, $action))
        throw new Exception($controller . '->' . $action . ' no existe');
        //Si todo está bien, creamos una instancia del controlador
        //y llamamos a la acción
        $controller = new $controller();
        $controller->$action(count($params) ? $params : "");
    }
}
