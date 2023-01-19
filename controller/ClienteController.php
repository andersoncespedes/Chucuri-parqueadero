<?php require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Cliente.php';
class ClienteController extends Cliente{
    public function __construct(){
        parent::__construct();
    }
    public function mostrar(){
        try{
            $stmt = $this->init()->prepare("SELECT * FROM " .$this->table);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt;
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
    }
    public function save($param,$id){
        try{
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(nombres, apellidos, cedula,id_auto, direccion) 
            VALUES ('".$param['nombre']."',  '".$param['apellido']."',  '".$param['cedula']."', '".$id."', '".$param['direccion']."')");
            $stmt->execute();
            $stmt->closeCursor();
            $this->close($this->init());
            $stmt = null;
            return true;
        }catch(PDOException $e){
            echo "Error" .$e;
            return false;
        }
        
    }
}
$cliente = new ClienteController;
$x = $cliente->mostrar();
?>