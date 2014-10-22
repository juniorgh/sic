<?php
    class conexao extends PDO{
       
 
        private static $instancia;
     
        public function Conexao($dsn, $username = "", $password = "") {
            // O construtro abaixo � o do PDO
            parent::__construct($dsn, $username, $password);
        }
     
        public static function getInstance() {
            // Se o a instancia n�o existe eu fa�o uma
            if(!isset( self::$instancia )){
                try {
                    self::$instancia = new Conexao("mysql:host=localhost;dbname=sic", "root", "");
                    self::$instancia("SET CHARACTER SET utf8");
                } catch ( Exception $e ) {
                    echo 'Erro ao conectar';
                    exit ();
                }
            }
            // Se j� existe instancia na mem�ria eu retorno ela
            return self::$instancia;
        }
        
         
        /*private $usuario_banco = "root";
         private $senha_banco = "";
          private $servidores_banco = "localhost";
           private $base_banco = "dblogin";*/
    }
?>