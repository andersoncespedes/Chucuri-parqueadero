<?php require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Factura.php';
class FacturaController extends Factura{
    public function __construct(){
        parent::__construct();
    }
    public function save($param, $id){
        try{
            $hoy = date("Y-m-d H:i:s");
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(id_auto, entrada) 
            VALUES (?,?)");
            $stmt->execute([$id, $hoy]);
            $stmt->closeCursor();
            $stmt = null;
            return true;
        }catch(PDOException $e){
            echo "Error " .$e;
            return false;
        }
        
    }
}