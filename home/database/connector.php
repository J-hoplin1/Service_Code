<?php

class OracleConnector{

    protected $db;
    protected $connect;

    // constructor
    public function __construct()
    {
        $config = parse_ini_file(dirname(__FILE__)."/../assets/config/config.ini");
        $this->db = '
        (DESCRIPTION= 
            (ADDRESS_LIST= 
                (ADDRESS = 
                    (PROTOCOL ='.$config['protocol'].')
                    (HOST = '.$config['host'].')
                    (PORT = '.$config['port'].')
                )
            ) 
            (CONNECT_DATA = 
                (SID = orcl)
            )
        )';
        $this->connect = oci_connect($config['username'],$config['password'],$this->db);
        if(!$this->connect){
            $e=oci_error();
            trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
        }
    }
}


$t = new OracleConnector();

?>