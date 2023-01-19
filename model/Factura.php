<?php
require_once $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/connection.php';
class Factura extends Conexion{
    protected $table;
    public function __construct(){
        parent::__construct();
        $this->table = 'factura';
    }
    public function init(){
        return $this->connect();
    }
}
?>