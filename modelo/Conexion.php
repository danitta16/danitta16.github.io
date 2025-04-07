<?php
class conexion {
    private $server = 'localhost';
    private $user = 'root';
    private $password = '1234';
    private $database = 'belleza';

    private $db; // Agrega una propiedad para almacenar la conexión PDO

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=" . $this->server . ";dbname= belleza" . $this->database, $this->user, $this->password);
        
            echo "Conexión exitosa";
        } catch (PDOException $error) {
            die("Error al conectarse: " . $error->getMessage());
        }
    }
}
?>