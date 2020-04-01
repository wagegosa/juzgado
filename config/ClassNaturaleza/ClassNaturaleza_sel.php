 <?php

class Naturaleza extends DataBase
{
	public $id_naturaleza;
  public $nombre;
  public $activo;

  public function listarNaturaleza(){
    try
    {
      parent::Conexion();
      $sql = "SELECT id_naturaleza, nombre 
                FROM naturaleza 
               WHERE activo = 'Y'
            ORDER BY nombre ASC";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
  public function listarNaturalezaActi()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM naturaleza where activo = 'Y'";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
}

?>
