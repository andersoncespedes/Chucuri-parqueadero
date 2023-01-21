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
        require_once 'FacturaController.php';
        try{
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(nombres, apellidos, id_auto) 
            VALUES ('".$param['nombre']."',  '".$param['apellido']."', '".$id."')");
            if($stmt->execute()){
                $rs = $this->init()->prepare("SELECT MAX(id_cliente) AS id FROM " .$this->table);
                $rs->execute();
                $rs->setFetchMode(PDO::FETCH_ASSOC);
                $id_cliente = $rs->fetch()['id'];
                $factura = new FacturaController;
                $factura->save($param, $id, $id_cliente);
            }
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