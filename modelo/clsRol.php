<?php
class Rol 
{   
    public $pdo;
    public $idRolusuario;
    public $descripRolusuario;
    public $estadoRolusuario;

    public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM rol_usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
   
    public function Obtener($idRolusuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM rol_usuario WHERE idRolusuario = ?");
			          

			$stm->execute(array($idRolusuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idRolusuario)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM rol_usuario WHERE idRolusuario = ?");			          

			$stm->execute(array($idRolusuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
 

    public function Actualizar($data)
    {
    try 
    {
        $sql = "UPDATE rol_usuario SET 
                    descripRolusuario = ?, 
                    estadoRolusuario = ?
                WHERE idRolusuario = ?";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->descripRolusuario,
                    $data->estadoRolusuario,
                    $data->idRolusuario 
                )
            );
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
    }

    public function Registrar(Rol $data)
    {
        try 
        {
            $sql = "INSERT INTO rol_usuario ( descripRolusuario, estadoRolusuario) 
                    VALUES (?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->descripRolusuario,
                        $data->estadoRolusuario
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>