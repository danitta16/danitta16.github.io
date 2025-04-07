<?php
require_once("conexion.php");

class Producto extends Conexion {
    public $pdo;
    public $idproducto;
    public $descripProducto;
    public $precioproducto;
    public $categoriaproducto;
    public $estadoproducto;

    public function __construct() {
        try
        {
            $this->pdo = Database::StartUp();     
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM producto");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($idproducto) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM producto WHERE idproducto = ?");
            $stm->execute(array($idproducto));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($idproducto) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM producto WHERE idproducto = ?");
            $stm->execute(array($idproducto));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE producto SET 
                        descripProducto = ?, 
                        precioproducto = ?,
                        categoriaproducto = ?,
                        estadoproducto = ?
                    WHERE idproducto = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->descripProducto,
                        $data->precioproducto,
                        $data->categoriaproducto,
                        $data->estadoproducto,
                        $data->idproducto
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Producto $data) {
        try {
            $sql = "INSERT INTO producto (descripProducto, precioproducto, categoriaproducto, estadoproducto) 
                    VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->descripProducto,
                        $data->precioproducto,
                        $data->categoriaproducto,
                        $data->estadoproducto
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>