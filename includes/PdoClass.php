<?php
/**
 * PHP 5.1
 */ 

/**
 * PdoClass 
 * 
 * @version 1.00
 * @license free,  Noncommercial — You may not use this work for commercial purposes. 
 * @author Adam Berger <ber34@o2.pl>
 * @Site www.joomla-cms.com.pl 
 */ 

class DBBER extends PDO
{
          private $engine = 'mysql';
          private $host = 'localhost';
          private $port = 3306;
          private $database = 'encrypter';
          private $user = 'user';
          private $pass = 'password'; // password
          private $dns;
          private $DbPrefix = '';
          
          
   
  public function __construct()
    {		
     try{   
              if(!empty($this->database))
                 { 
                  $this->dns = $this->engine.':host='.$this->host.';port='.$this->port.';dbname='.$this->database.';';
                  parent::__construct($this->dns, $this->user, $this->pass, 
				  array(
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, 
                            \PDO::ATTR_PERSISTENT => false, 
                            \PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8mb4'
                        ));
				  //array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
                 }
 
          }catch(PDOException $e){
                echo 'The connection could not be established.<br />'.$e->getMessage().'<br />'.strval($e->getCode()).'<br />'.$e->getFile().'<br />'.
                        $e->getTrace().'<br />'.strval($e->getLine()).'<br />'.$e->getPrevious();
          }
    }
 
  public function dbprefix()
    {  
       return $this->DbPrefix;
    }     
}

 $db      = new DBBER();  // Connect to the database.
 //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt = $db->prepare('SELECT id FROM `'.$db->dbprefix().'ninja_messages` ORDER BY `id` ASC');
       $stmt->execute();