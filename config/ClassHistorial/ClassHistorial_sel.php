 <?php
  date_default_timezone_set('America/Bogota');

class Historial extends DataBase
{
	public $naturaleza;
  public $consecutivo;
  public $demandante;
  public $demandado;
  public $fe_reparto;
  public $fe_terminacion;
	public $Novedad;
  public $archivo;
  public function listarHistorial(){
    $hoy = date('Y-m-d');
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM vs_historial; ";
      // echo "<pre>";
      // print_r($sql);
      // echo "</pre>";
      // die();
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
