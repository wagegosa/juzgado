 <?php

class Novedad extends DataBase
{
	public $id_novedad;
  public $nombre;
	public $activo;

  public function listarNovedad(){
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM novedad ORDER BY nombre ASC";
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
  public function ListarNovedadAct(){
    try{
      parrent::Conexion();
      $sql = "SELECT * FROM novedad  WHERE activo = 'Y' ORDER BY nombre ASC";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute;
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
