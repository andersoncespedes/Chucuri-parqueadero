<?php require $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Autos.php';
class AutoController extends Auto{
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
    public function guardar($param){
        try{
            $stmt = $this->init()->prepare("INSERT INTO ".$this->table."(tipo_veh, placa) 
            VALUES ('".$param['tipo']."',  '".strtoupper($param['placa'])."')");
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo "Error" .$e;
            return false;
        }
        
    }

}
$auto = new AutoController;
$x = $auto->mostrar();
if($_POST){
    if($_POST['ingresar']){
        if($auto->guardar($_POST)){
            header('location:../');
        }
        else{
            header('location:../');
        }
    }
}

?>