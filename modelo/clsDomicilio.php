<?php
require_once("conexion.php");

class Domicilio extends Conexion {
    public $pdo;
    public $idDomicilio;
    public $horaDomicilio;
    public $estadoDomicilio;
    public $idpedidoFK;
    public $idDomicilioFK;

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

            $stm = $this->pdo->prepare("SELECT * FROM domicilio");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($idDomicilio) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM domicilio WHERE idDomicilio = ?");
            $stm->execute(array($idDomicilio));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($idDomicilio) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM domicilio WHERE idDomicilio = ?");
            $stm->execute(array($idDomicilio));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE domicilio SET 
                        horaDomicilio = ?, 
                        estadoDomicilio = ?,
                        idpedidoFK = ?,
                        idDomicilioFK = ?
                    WHERE idDomicilio = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->horaDomicilio,
                        $data->estadoDomicilio,
                        $data->idpedidoFK,
                        $data->idDomicilioFK,
                        $data->idDomicilio
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Domicilio $data) {
        try {
            $sql = "INSERT INTO domicilio (horaDomicilio, estadoDomicilio, idpedidoFK, idDomicilioFK) 
                    VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->horaDomicilio,
                        $data->estadoDomicilio,
                        $data->idpedidoFK,
                        $data->idDomicilioFK
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}