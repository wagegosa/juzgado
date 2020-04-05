 <?php

class Usuario extends DataBase
{
	public $idtbp_perfil;
  public $nombre;
	public $activo;

  public function listarUsuario(){
    try
    {
      parent::Conexion();
      $sql = "SELECT A.idUsuario, B.nombre AS perfil, A.usuario, A.pass, A.nom_comple, DATE(A.fec_creaci) AS fec_creaci, 
                     A.fec_modifi, A.activo 
                FROM usuario A
          INNER JOIN juzgado.perfil B ON (A.perfil = B.idperfil )
            ORDER BY nom_comple ASC";
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
  public function listarUsuarioActi()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM gloriadiaz.tba_usuario where activo = 'Y' and perfil = 1";
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
