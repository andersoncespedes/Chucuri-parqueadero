<?php require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Autos.php';
class AutoController extends Auto{
    public function __construct(){
        parent::__construct();
    }
    public function buscar($param){
            $stmt = $this->init()->prepare("SELECT * FROM ".$this->table." WHERE placa= '".$param['placa']."'" );
            if($stmt->execute()){
                $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                 return $stmt->fetch()['id_auto'];
            }
            else{
                return false;
            }
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
    public function guardar($param){
        
       include_once "ParkController.php";
       if(!$this->authentific($param)){
        return false;
       }
        try{
            if(!$this->buscar($param)){
                 $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(tipo_veh, placa) 
                 VALUES (?,?)");
                $stmt->execute([$param['tipo'], strtoupper($param['placa'])]);
                $stmt->closeCursor();
                $stmt = null;
                $rs = $this->init()->prepare("SELECT MAX(id_auto) AS id FROM " .$this->table);
                $rs->execute();
                $rs->setFetchMode(PDO::FETCH_ASSOC);
                $id = $rs->fetch()['id'];
                $m = true;
            }
            else{
                $id = $this->buscar($param);
            }
            $Park = new ParkController;
            if($Park->save($param, $id)){
                if($m){
                    $rs->closeCursor();
                    $rs = null;
                }
                $id = null;
            }
            $this->close($this->init());
            return true;
        }catch(PDOException $e){
            echo "Error " .$e;
            return false;
        }
        
    }
}
$auto = new AutoController;
$x = $auto->mostrar();
if($_POST){
    if($_POST['ingresar']){
        if($auto->guardar($_POST)){
            header('location: ../vistas/rec_entrada.php?tipo='.$_POST['tipo'].'&placa='.$_POST['placa'].'&monto='.$_POST['monto']);
        }
        else{
           ?> 
                <script>
                    window.close();
                </script>
           <?php
        }
    }
}

?>