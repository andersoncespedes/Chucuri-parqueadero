<?php
require $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/connection.php';
class Auto extends Conexion{
    protected $table;
    public function __construct(){
        parent::__construct();
        $this->table = 'autos';
    }
    public function authentific($param):bool{
        return true;
    }
    public function init(){
        return $this->connect();
    }
}
?>