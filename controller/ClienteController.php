<?php require $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/Cliente.php';
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
}
$cliente = new ClienteController;
$x = $cliente->mostrar();
?>