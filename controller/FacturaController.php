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
            }
            else{
                $hoy = date("Y-m-d H:i:s");
            }
            
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(id_auto, fecha,valor,tipo_fact) 
            VALUES (?,?,?,?)");
            $stmt->execute([$id_auto,$hoy,$param['monto'], $param['tip_parq']]);
            $stmt->closeCursor();
            $stmt = null;
            
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