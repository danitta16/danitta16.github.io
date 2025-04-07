<?php

require_once('../modelo/database.php');
class Usuario
{
    public $pdo;
    public $id_usuario;
    public $nombre_usuario;
    public $no_DocUsuario;
    public $apellido_usuario;
    public $correo_Usuario;
    public $telefono_Usuario;
    public $direccion_usuario;
    public $password_usuario;
    public $estado_usuario;
    public $idRolusuarioFK;

    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp(); // Asegúrate de tener la clase Database con el método StartUp
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function login(){
        // CONSULTA ENPHP CON MYSQL
        $consulta=$this->pdo->prepare("SELECT * FROM usuario WHERE correo_Usuario = :Usuario and password_usuario = :Clave");
        $consulta->bindParam(':Usuario',$this->correo_Usuario);
        $consulta->bindParam(':Clave',$this->password_usuario);
    $consulta->execute();

    if ($consulta->rowCount()==1) {
            return true;
        }else{
            return false;
        }

    }

    public function consultaRol()
    {
        try {
            $stm = $this->pdo->prepare("SELECT idRolusuarioFK FROM usuario WHERE correo_Usuario = ?");
            $stm->execute(array($this->correo_Usuario));
            
            // Obtener el resultado de la consulta
            $result = $stm->fetchColumn();
    
            // Verificar si el resultado es 1
            if($result == 1){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultaEstado()
    {
        try {
            $stm = $this->pdo->prepare("SELECT estado_usuario FROM usuario WHERE correo_Usuario = ?");
            $stm->execute(array($this->correo_Usuario));
            
            // Obtener el resultado de la consulta
            $result = $stm->fetchColumn();
    
            // Verificar si el resultado es 1
            if($result == 'Activo'){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultaIdPorEmail()
    {
        try {
            $stm = $this->pdo->prepare("SELECT id_usuario FROM usuario WHERE correo_Usuario = ?");
            $stm->execute(array($this->correo_Usuario));
            $result = $stm->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT id_usuario, nombre_usuario, apellido_usuario, no_DocUsuario,
            correo_usuario, telefono_Usuario, direccion_usuario, estado_usuario, idRolusuarioFK  FROM usuario");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
            $stm->execute(array($id_usuario));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");
            $stm->execute(array($id_usuario));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE usuario SET 
            nombre_usuario = ?, 
            apellido_usuario = ?, 
            no_DocUsuario = ?,
            correo_Usuario = ?, 
            telefono_Usuario = ?, 
            direccion_usuario = ?, 
            password_usuario = ?, 
            estado_usuario = ?,
            idRolusuarioFK = ?
            WHERE id_usuario = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre_usuario,
                        $data->apellido_usuario,
                        $data->no_DocUsuario,
                        $data->correo_Usuario,
                        $data->telefono_Usuario,
                        $data->direccion_usuario,
                        $data->password_usuario,
                        $data->estado_usuario,
                        $data->idRolusuarioFK,
                        $data->id_usuario
                    )
                );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Usuario $data)
    {
        try {
            $sql = "INSERT INTO usuario (nombre_usuario, apellido_usuario, no_DocUsuario,
                    correo_Usuario, telefono_Usuario, direccion_usuario, 
                    password_usuario, estado_usuario, idRolusuarioFK) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre_usuario,
                        $data->apellido_usuario,
                        $data->no_DocUsuario,
                        $data->correo_Usuario,
                        $data->telefono_Usuario,
                        $data->direccion_usuario,
                        $data->password_usuario,
                        $data->estado_usuario,
                        $data->idRolusuarioFK
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>