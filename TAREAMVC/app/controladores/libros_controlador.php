<?php
class libros_controlador{
        private $view;
        function __construct(){
            //Creamos una instancia de nuestro mini motor de plantillas
            $this->view = new View();
        }
        public function listar(){
            //Incluye el modelo que corresponde
            require '../app/modelo/libros_modelo.php';
            //Creamos una instancia de nuestro "modelo"
            $Libros_model = new libros_modelo();
            //Le pedimos al modelo todos los libros
            $libros = $Libros_model->getLibros();
            //Pasamos a la vista toda la información que se desea representar
            $variables = array();
            $variables['libros'] = $libros;
            //Finalmente presentamos nuestra plantilla
            $this->view->show("../app/vista/libros_listar.php", $variables);
        }
        public function ver ($params){
            print_r($params);
            if ( !isset ( $params[0] )){
                die("No has especificado un identificador de libro.");
            }
            $id = $params[0];
            //Incluimos el modelo correspondiente
            require '../app/modelo/libros_modelo.php';
            //Creamos una instancia de nuestro "modelo"
            $Libros_model = new libros_modelo();
            //Le pide al modelo el libro con id = $id
            $libro = $Libros_model->getLibro($id);
            if ($libro === null){
                die("Identificador de libro incorrecto");
            }
            //Pasamos a la vista toda la información que se desea representar
            $variables = array();
            $variables['libro'] = $libro;
            //Pasamos a la vista la información que se desea presentar
            $this->view->show('../app/vista/libros_ver.php', $variables);
        }
        public function borrar(){
            $id = $_POST["hidden"];
            require '../app/modelo/libros_modelo.php';
            $libros_modelo = new libros_modelo();
            $libros_modelo->borrarlibro($id);
            header("Location: http://localhost/TAREAMVC/public");
            exit();
        }
        public function editarlibro(){
            $this->view->show('../app/vista/libros_editar.php');

        }
        public function editar(){
            $id = $_POST["hidden5"];
            $precio = $_POST["precio"];
            $titulo = $_POST["titulo"];
            require '../app/modelo/libros_modelo.php';
            $libros_modelo = new libros_modelo();
            $libro = $libros_modelo->editarlibro($titulo, $precio, $id);
            header("Location: http://localhost/TAREAMVC/public");
            exit();
        }
        public function crear(){
            $titulo = $_POST["nuevotitulo"];
            $precio = $_POST["nuevoprecio"];
            require '../app/modelo/libros_modelo.php';
            $libros_modelo = new libros_modelo();
            $libro = $libros_modelo->crearlibro($titulo, $precio);
            header("Location: http://localhost/TAREAMVC/public");
            exit();
        }
        public function crearautor(){
            $nombre = $_POST["nuevoautor"];
            $nac = $_POST["nuevanacionalidad"];
            require '../app/modelo/libros_modelo.php';
            $libros_modelo = new libros_modelo();
            $libro = $libros_modelo->crearautor2($nombre, $nac);
            header("Location: http://localhost/TAREAMVC/public");
        }
       
        public function listarautores(){
            //Incluye el modelo que corresponde
            require '../app/modelo/libros_modelo.php';
            //Creamos una instancia de nuestro "modelo"
            $Libros_model = new libros_modelo();
            //Le pedimos al modelo todos los libros
            $autores = $Libros_model->getautores();
            //Pasamos a la vista toda la información que se desea representar
            $variables = array();
            $variables['autores'] = $autores;
            //Finalmente presentamos nuestra plantilla
            $this->view->show("../app/vista/libros_asignar.php", $variables);
        }
        public function asignar2(){
            $idlibro = $_POST["hiddenlibro"];
            $idautor = $_POST["eleccion"];
            require '../app/modelo/libros_modelo.php';
            $libros_modelo = new libros_modelo();
            $libro = $libros_modelo->asignar($idlibro, $idautor);
            header("Location: http://localhost/TAREAMVC/public");
            
        }
      
    
}
?>

