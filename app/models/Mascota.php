<?php
require_once '../config/Database.php';
require_once '../entities/Mascota.entidad.php';

/**
 * Esta clse contiene la logica para interactuar con la base de datos
 * para las operaciones CRUD de la entidad Mascota.
 */
class Mascota{
  private $pdo = null;
  public function __construct(){
    $this->pdo = Database::getConexion();
  }  public function create(MascotaEntidad $entidad): int{
    $sql = "INSERT INTO mascotas (idpropietario, tipo, nombre, color, genero) VALUES (?, ?, ?, ?, ?)";
    $query = $this->pdo->prepare($sql);
    $query->execute([
      $entidad->__GET('idpropietario'),
      $entidad->__GET('tipo'),
      $entidad->__GET('nombre'),
      $entidad->__GET('color'),
      $entidad->__GET('genero')
    ]);
    return $this->pdo->lastInsertId();
  }
  public function getAll(): array {
    $sql= "
    SELECT 
      MA.idmascota,
      MA.tipo,
      MA.nombre,
      MA.color,
      MA.genero,
      CONCAT(PR.apellidos,' ',PR.nombres) AS propietario
      FROM mascotas MA
      INNER JOIN propietarios PR ON MA.idpropietario = PR.idpropietario
      ORDER BY MA.nombre
    ";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    //FETCH_ASSOC devuelve un arreglo asociativo
    //FETCH_OBJ devuelve un objeto
    //FETCH_BOTH devuelve un arreglo asociativo y un arreglo numerico
    //FETCH_CLASS devuelve un objeto de una clase especifica
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById($id): array{
    return [];
  }

  public function delete($id){
    return 0;
  }

  /**
   * Actualiza los datos de la mascota en la base de datos.
   * @param mixed $params Arreglo que contiene los campos requeridos 
   * @return int Numero de filas afectadas por la actualización.
   */
  public function update($params){
    $sql = "
    UPDATE mascotas SET
    idpropietario = ?,
    tipo = ?,
    nombre = ?,
    color = ?,
    genero = ?
    WHERE idmascota = ?;
    ";
    $query = $this->pdo->prepare($sql);
    $query->execute([
      $params['idpropietario'],
      $params['tipo'],
      $params['nombre'],
      $params['color'],
      $params['genero'],
      $params['idmascota']
    ]);

    return $query->rowCount();
  }
}

