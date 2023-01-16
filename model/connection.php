<?php 
require $_SERVER["DOCUMENT_ROOT"] .'/Ticket/config.php';
    class Conexion{
        private $db_name;
        private $db_host;
        private $db_port;
        private $db_user;
        private $db_pass;
        public function __construct()
        {
            $this->db_name =  DB_NAME;
            $this->db_host =  DB_HOST;
            $this->db_port =  DB_PORT;
            $this->db_user =  DB_USER;
            $this->db_pass =  DB_PASSWD;
        }
        public function connect(){
            $co = new PDO("mysql:dbname=".$this->db_name.";host=" .$this->db_host,
                            $this->db_user,
                            $this->db_pass
                         );
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             return $co; 
        }
    }
?>