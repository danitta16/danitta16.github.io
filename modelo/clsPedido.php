<?php
require_once("conexion.php");

class Pedido extends Conexion {
    public $pdo;
    public $idpedido;
    public $fechapedido;
    public $horapedido;
    public $totalpedido;
    public $estadopedido;
    public $pedidoadomicilio;
    public $idusuarioFK;
    public $idProductoFK;

    public function __construct() {
        try {
            $this->pdo = Database::StartUp();     
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM pedido");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarPorId($idUsuario)
    {
        try {
            $result = array();

            // Modifica la consulta para incluir la condición del usuario
            $stm = $this->pdo->prepare("SELECT idpedido, fechapedido, horapedido, totalpedido, estadopedido, pedidoadomicilio, idusuarioFK, idProductoFK FROM pedido WHERE idusuarioFK = ?");
            $stm->execute(array($idUsuario));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($idpedido) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM pedido WHERE idpedido = ?");
            $stm->execute(array($idpedido));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($idpedido) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM pedido WHERE idpedido = ?");
            $stm->execute(array($idpedido));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE pedido SET 
                        fechapedido = ?, 
                        horapedido = ?,
                        totalpedido = ?,
                        estadopedido = ?,
                        pedidoadomicilio = ?,
                        idusuarioFK = ?,
                        idProductoFK = ?
                    WHERE idpedido = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->fechapedido,
                        $data->horapedido,
                        $data->totalpedido,
                        $data->estadopedido,
                        $data->pedidoadomicilio,
                        $data->idusuarioFK,
                        $data->idProductoFK,
                        $data->idpedido
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Pedido $data) {
        try {
            $sql = "INSERT INTO pedido (fechapedido, horapedido, totalpedido, estadopedido, pedidoadomicilio, idusuarioFK, idProductoFK) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->fechapedido,
                        $data->horapedido,
                        $data->totalpedido,
                        $data->estadopedido,
                        $data->pedidoadomicilio,
                        $data->idusuarioFK,
                        $data->idProductoFK
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
