<?php

use Dompdf\Dompdf;

 require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Factura.php';
class FacturaController extends Factura{
    public function __construct(){
        parent::__construct();
    }
    public function generarFactura($html = null){
        include_once "./vendor/autoload.php";
        $dompdf = new Dompdf();
        $dompdf->setPaper('b7', 'portrait');
        $dompdf->loadHtml($html);
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        echo $dompdf->output();
    }

    public function mostrarAct(){
        try{
            $stmt = $this->init()->prepare("SELECT * FROM " .$this->table ." a INNER JOIN autos b ON a.id_auto = b.id_auto WHERE estado = 'activo'");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            return $stmt;
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
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
    public function mostrarInact(){
        try{
            $stmt = $this->init()->prepare("SELECT * FROM " .$this->table ." a INNER JOIN autos b ON a.id_auto = b.id_auto WHERE estado = 'inactivo'");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt;
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
    }
    public function facturaById($param){
        try{
            $stmt = $this->init()->prepare("SELECT * FROM " .$this->table ." a INNER JOIN autos b ON a.id_auto = b.id_auto WHERE id_factura = '".$param."' ");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            return $stmt->fetch();
        }catch(PDOException $e){
            echo "Error" .$e;
        }
        
    }
    public function save($param, $id_auto){
        try{
            if(isset($param['entrada'])){
                $hoy = str_replace("T", " ", $param['entrada']);
            
                printf($hoy);
            }
            else{
                $hoy = date("Y-m-d H:i:s");
            }
            
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(id_auto, fecha,valor,tipo_fact) 
            VALUES (?,?,?,?)");
            $stmt->execute([$id_auto,$hoy,$param['monto'], $param['tip_parq']]);
            $stmt->closeCursor();
            $stmt = null;
            $this->close($this->init());
            return true;
        }catch(PDOException $e){
            echo "Error " .$e;
            return false;
        }
    }
    public function inactivarFact($param, $salida, $calc){
        try{
            $stmt = $this->init()->prepare("UPDATE ".$this->table."
            SET estado = 'inactivo', salida = '".$salida."', monto_tot = '".$calc."'
            WHERE id_factura = '".$param."'");
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            return true;
        }catch(PDOException $e){
            print_r($e);
            return false;
        }
    }
    public function eliminarById($id){
        try{
           $stmt = $this->init()->prepare("DELETE FROM ".$this->table." WHERE id_factura = '".$id."'");
           $stmt->execute();
           $stmt->closeCursor();
           $stmt = null;
            return true;
        }catch(PDOException $e){
            return $e;
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
        $i = 0;
        return ["factura" => $numF, "auto" => $numA, "facturaAct" => $this->estAct(), "facturaInact" => $this->estInact()];
    }
}
$factura = new FacturaController;
if(isset($_GET['imprimir'])){
    $datos = $factura->facturaById($_GET['id']);
    include_once '../vistas/factura_final.php';
    $factura->generarFactura($html);
    $factura->inactivarFact($_GET['id'], date("Y-m-d H:i:s"), $calc);
}
if(isset($_GET['eliminar'])){
    $datos = $factura->eliminarById($_GET['id']);
    if($datos){
        header('location: ../vistas/factura.php');
    }
}