<?php

use FTP\Connection;

class Model 
{
    static $connections = [];

    public $conf = 'default';

    public $table = false;

    public $db;

    public function __construct()
    {
        
        $conf = ConnectionDB::$database[$this->conf];

        if(isset(Model::$connections[$this->conf]))
        {
            $this->db = Model::$connections[$this->conf];
            return true;
        }

        try
        {
            $pdo = new PDO(
                'mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';',
                $conf['login'],
                $conf['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8')
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            Model::$connections[$this->conf]= $pdo;

        } catch (PDOException $e){
            if(ConnectionDB::$debug >= 1)
            {
              die($e->getMessage());  
            }
            else
            {
                die('Impossible de se connecter à la base de données');
            }
            
        }
        // Initialisation de quelques variables pour nos tables
        if($this->table === false)
        {
            // On va prendre les noms de nos class
            $this->table = strtolower(get_class($this)) . 's';

            echo $this->table;

            // Faire une regex permettant de synchoniset notre class avec notre table
        }
       
    }

    public function find($req)
    {
        $sql = 'SELECT * FROM posts';

      
           $sql = 'SELECT * FROM ' . $this->table . 'AS' . get_class($this) . '';
           $pre = $this->db->prepare($sql);
           $pre->execute();

           return $pre->fetchAll(PDO::FETCH_OBJ);
        
    }

}

