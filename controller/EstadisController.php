<?php
require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Factura.php';
class EstadisController extends Factura{
    public $tablaSup;
    public function __construct(){
        $this->tablaSup = 'autos';
        parent::__construct();
    }
    public function gainsByDay(){
        try{
            $stmt = $this->init()->prepare("SELECT SUM(monto_tot) as total FROM factura
            WHERE salida BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d H:i:s")."' ");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $r = $stmt->fetch()['total'];
            $stmt->closeCursor();
            return $r;
        }catch(PDOException $err){
            return $err;
        }
    }
    public function gainsByMonth(){
        try{
            $x = date("Y-m-01 00:00:00");
            $stmt = $this->init()->prepare("SELECT SUM(monto_tot) as total FROM factura
            WHERE salida BETWEEN '".$x."' AND '".date("Y-m-d H:i:s")."' ");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $r = $stmt->fetch()['total'];
            $stmt->closeCursor();
            return $r;
        }catch(PDOException $err){
            return $err;
        }
    }
    public function gainsByYear(){
        try{
            $x = date("Y-01-01 00:00:00");
            $stmt = $this->init()->prepare("SELECT SUM(monto_tot) as total FROM factura
            WHERE salida BETWEEN '".$x."' AND '".date("Y-m-d H:i:s")."' ");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $r = $stmt->fetch()['total'];
            $stmt->closeCursor();
            return $r;
        }catch(PDOException $err){
            return $err;
        }
    }
    public function gainsGeneral(){
        try{
            $stmt = $this->init()->prepare("SELECT SUM(monto_tot) as total FROM factura");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $r = $stmt->fetch()['total'];
            $stmt->closeCursor();
            return $r;
        }catch(PDOException $err){
            return $err;
        }
    }
    public function estAct(){
        try{
            $stmt = $this->init()->prepare("SELECT count(valor) as num FROM " .$this->table. " WHERE estado = 'activo'");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $a = $stmt->fetch()['num'];
            $stmt->closeCursor();
            $stmt = null;
            return $a;
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
    }
    public function estInact(){
        try{
            $stmt = $this->init()->prepare("SELECT count(valor) as num FROM " .$this->table. " WHERE estado = 'inactivo'");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $a = $stmt->fetch()['num'];
            $stmt->closeCursor();
            $stmt = null;
            return $a;
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
    }
    public function tipoVeh(){
        try{
            $stmt = $this->init()->prepare("SELECT COUNT(tipo_veh) as tipo, tipo_veh  FROM " .$this->tablaSup." GROUP BY tipo_veh");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            
            return $stmt;
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
    }
    public function stats(){
        $factura = $this->init()->prepare("SELECT count(fecha) as num FROM factura ");
        $factura->execute();
        $factura->setFetchMode(PDO::FETCH_ASSOC);

        $auto = $this->init()->prepare("SELECT count(placa) as num FROM autos");
        $auto->execute();
        $auto->setFetchMode(PDO::FETCH_ASSOC);

        $numF = $factura->fetch()['num'];
        $numA = $auto->fetch()['num'];

        $factura->closeCursor();
        $factura = null;
        $i = 0;
        return [
            "factura" => $numF, 
            "auto" => $numA, 
            "facturaAct" => $this->estAct(), 
            "facturaInact" => $this->estInact(),
            "dia" => number_format($this->gainsByDay(), 2, ',', '.'),
            "mes" => number_format($this->gainsByMonth(), 2, ',', '.'),
            "year" => number_format($this->gainsByYear(), 2, ',', '.'),
            "general" => number_format($this->gainsGeneral(),2,'.',',')
        ];
    }
}
$factura = new EstadisController;

?>