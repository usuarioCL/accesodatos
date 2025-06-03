<?php
require_once __DIR__ . '/../config/Database.php';

/**
 * Esta clse contiene la logica para interactuar con la base de datos
 * para las operaciones CRUD de la entidad Mascota.
 */
class Propietario
{
  private $pdo = null;
  public function __construct()
  {
    $this->pdo = Database::getConexion();
  }
/**
 * Crea un nuevo propietario en la base de datos.
 * @param array $params Arreglo que contiene los campos requeridos (nombres, apellidos, etc.)
 * @return int ID del propietario creado o 0 si falla
 */
public function create($params)
{
    $sql = "
    INSERT INTO propietarios (nombres, apellidos)
    VALUES (?, ?)
    ";
    
    try {
        $this->pdo->beginTransaction();
        
        $query = $this->pdo->prepare($sql);
        $query->execute([
            $params['nombres'],
            $params['apellidos'],
        ]);
        
        $idPropietario = $this->pdo->lastInsertId();
        
        $this->pdo->commit();
        return $idPropietario;
    } catch (PDOException $e) {
        $this->pdo->rollBack();
        return 0;
    }
}
/**
 * Obtiene todos los propietarios de la base de datos.
 * @return array Lista de todos los propietarios
 */
public function getAll(): array
{
    $sql = "SELECT * FROM propietarios";
    
    try {
        $query = $this->pdo->prepare($sql);
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}
  
  public function getById($id): array
  {
    return [];
  }

  public function delete($id)
  {
    return 0;
  }

  /**
   * Actualiza los datos de la mascota en la base de datos.
   * @param mixed $params Arreglo que contiene los campos requeridos 
   * @return int Numero de filas afectadas por la actualización.
   */
public function update($params)
{
    $sql = "
    UPDATE propietarios 
    SET nombres = ?, apellidos = ?
    WHERE id = ?
    ";
    
    try {
        $this->pdo->beginTransaction();
        
        $query = $this->pdo->prepare($sql);
        $result = $query->execute([
            $params['nombres'],
            $params['apellidos'],
            $params['id']
        ]);
        
        $this->pdo->commit();
        return $query->rowCount();
    } catch (PDOException $e) {
        $this->pdo->rollBack();
        return 0;
    }
}
}
