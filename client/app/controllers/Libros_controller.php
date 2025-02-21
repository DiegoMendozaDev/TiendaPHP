<?php
class Libros_controller
{
    private $view;

    function __construct()
    {
        $this->view = new View();
    }

    public function verLibros()
    {
        require '../app/models/Libros_model.php';

        $libros_model = new Libros_model();

        $libros = $libros_model->getLibros();

        $variables = [];

        $variables['libros'] = $libros;

        $this->view->mostrar('libros_view.php', $variables);
    }
    public function verLibroId($params)
    {
        if (!isset($params[0])) {
            die("No has especificado un identificador de libro.");
        }

        $id = $params[0];
        //Incluimos el modelo correspondiente
        require '../app/models/Libros_model.php';
        //Creamos una instancia de nuestro "modelo"
        $Libros_model = new Libros_Model();
        //Le pide al modelo el libro con id = $id
        $libro = $Libros_model->getLibro($id);
        if ($libro === null) {
            die("Identificador de libro incorrecto");
        }

        //Pasamos a la vista toda la información que se desea representar
        $variables = array();
        $variables['libro'] = $libro;
        //Pasamos a la vista la información que se desea presentar
        $this->view->mostrar('libro_id_view.php', $variables);
    }
    public function eliminarLibro($params)
    {
        if (empty($params[0])) {
            die('No has especificado un indentificador del libro');
        }

        $id = $params[0];

        require "../app/models/Libros_model.php";

        $libros_model = new Libros_model();
        $libros_model->eliminarLibro($id);

        header('Location: http://localhost/MVC-copia(2)/public');
        exit;
    }
    public function editar($params){
        if(empty($params[0])){
            die('No has especificado un identificador del libro');
        }

        $id = $params[0];
        require '../app/models/Libros_model.php';
        require '../app/models/Autores_model.php';

        $autores_model = new Autores_model();
        $libros_model = new Libros_Model();
        $autores = $autores_model->getAutores();
        $libro = $libros_model->getLibro($id);
        if(!$libro){
            die('identificador incorrecto');
        }
        $vars = array();
        $vars['libro'] = $libro;
        $vars['autores'] = $autores;

        $this->view->mostrar('libro_editar.php', $vars);
    }
    public function editarLibro($params){

        if(empty($params['nombre'])){
            die('No has especificado un nombre');
        }elseif (empty($params['precio'])){
            die('No has especificado el precio');
        }elseif(empty($params['autor'])){
            die('No has especificado autor');
        }elseif(empty($params['id'])){
            die('No has especificado id del libro');
        }
        $nombre = $params['nombre'];
        $precio = $params['precio'];
        $autor = $params['autor'];
        $id = $params['id'];
        require '../app/models/Libros_model.php';
        $libros_model = new Libros_Model();
        $libros_model->editarLibro($id,$nombre,$precio,$autor);
        header('Location: http://localhost/MVC-copia(2)/public');
        exit;
    }
}