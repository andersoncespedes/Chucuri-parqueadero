<?php require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Factura.php';
class FacturaController extends Factura{
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
    public function save($param, $id_auto, $id_cliente){
        try{
            $hoy = date("Y-m-d H:i:s");
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(id_auto, fecha, valor) 
            VALUES (?,?,?)");
            $stmt->execute([$id_auto,$hoy, $param['monto_tot']]);
            $stmt->closeCursor();
            $stmt = null;
            $this->close($this->init());
            return true;
        }catch(PDOException $e){
            echo "Error " .$e;
            return false;
        }
        
    }
}
$factura = new FacturaController;
$x = $factura->mostrar();