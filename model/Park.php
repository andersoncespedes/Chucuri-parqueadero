<?php
require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/connection.php';
class Park extends Conexion{
    protected $table;
    public function __construct(){
        parent::__construct();
        $this->table = 'diario_a';
    }
    public function init(){
        return $this->connect();
    }
}
?>