<?php
require $_SERVER["DOCUMENT_ROOT"] .'/Ticket/model/connection.php';
class Cliente extends Conexion{
    protected $table;
    public function __construct(){
        parent::__construct();
        $this->table = 'cliente';
    }
    public function init(){
        return $this->connect();
    }
}
?>