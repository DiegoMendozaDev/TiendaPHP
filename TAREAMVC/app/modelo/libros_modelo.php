<?php
    class libros_modelo{
        protected $db;
        public function __construct() {
            $this->db = DBLibreria::getInstance()->getConnection();
        }
        function getLibros(){
            $result = $this->db->query('SELECT titulo, precio, id, nombre FROM libros, autor WHERE libros.id_autor=autor.id_autor UNION SELECT titulo, precio, id, NULL FROM libros WHERE libros.id_autor IS NULL');
            $libros = [];
            while ( $libro = $result->fetch() ){
                $libros[] = $libro;
            }
            return $libros;
        }
        function getLibro($id) {
                try {
                    $query = 'SELECT * FROM libros WHERE id = :id';
                    $stmt = $this->db->prepare($query);
                    $stmt->execute([':id' => $id]);
                    $libro = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $libro;
                } catch (PDOException $e) {
                    // Manejo de errores de la base de datos
                    echo "Error en la base de datos: " . $e->getMessage();
                    return null;
                }
            
            
        }
        function borrarlibro($id){
            try{
                $query = 'DELETE FROM libros WHERE id=:id';
                $stms = $this->db->prepare($query);
                $stms->execute([':id' => $id]);
            }catch(PDOException $e){
                echo "ERROR: $e";
            }
            
        }
        function editarlibro($titulo, $precio, $id){
            try{
                $query = 'UPDATE libros SET titulo = :titulo, precio = :precio WHERE id = :id';
                $stms = $this->db->prepare($query);
                $stms->execute([':titulo' => $titulo, ':precio' => $precio, ':id' => $id]);
            }catch(PDOException $e){
                echo "ERROR: $e";
            }
        }
        function crearlibro($titulo, $precio){
            try{
                $query = 'INSERT INTO libros (titulo, precio) VALUES(:titulo, :precio)';
                $stms = $this->db->prepare($query);
                $stms->execute([':titulo' => $titulo, ':precio' => $precio]);
            }catch(PDOException $e){
                echo "ERROR: $e";
            }
        }
        function crearautor2($nombre, $nac){
            try{
                $query = "INSERT INTO autor(nombre, nacionalidad) VALUES (:nombre, :nacionalidad)";
                $stms = $this->db->prepare($query);
                $stms->execute([':nombre' => $nombre, ':nacionalidad' => $nac]);
            }catch(PDOException $e){
                echo "ERROR: $e";
            }
        } 
        function getautores(){
            $resultado = $this->db->query('SELECT nombre, nacionalidad, id_autor FROM autor');
            $autores = [];
            while ( $autor = $resultado->fetch() ){
                $autores[] = $autor;
            }
            return $autores;
        }
        function asignar($idlibro, $idautor){
            try{
                $update = "UPDATE libros SET id_autor = :id_autor WHERE id=:id";
                $stms = $this->db->prepare($update);
                $stms->execute([':id' => $idlibro, ':id_autor' => $idautor]);
            }catch(PDOException $e){
                echo "ERROR: $e";
            }
            
        }
        
      
    }
?>