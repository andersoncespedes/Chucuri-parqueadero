<?php require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Park.php';
class ParkController extends Park{
    public function __construct(){
        parent::__construct();
    }
    public function save($param, $id){
       include_once "FacturaController.php";

        if($param['tip_parq'] == 'Mensual'){
            $this->table = 'mensual_a';
        }
        else if($param['tip_parq'] == 'Fijo'){
            $this->table = 'temp_a';
        }
        try{
            $hoy = date("Y-m-d H:i:s");
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(id_auto, entrada) 
            VALUES (?,?)");
            $factura = new FacturaController;
            if($stmt->execute([$id, $hoy])){
                $factura->save($param, $id);
            }
            $stmt->closeCursor();
            $stmt = null;
            return true;
        }catch(PDOException $e){
            echo "Error " .$e;
            return false;
        }
        
    }
    
}