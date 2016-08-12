<?php

     class connect
     {
         var $db = null;
         
         public function __construct()
         {
             $dsn = 'mysql:host=localhost;dbname=csdl';
             $username = 'root';
             $passwd = '';
             
             $this->db = new PDO($dsn, $username, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         }
         
         public function exec($query)
         {
             $result = $this->db->exec($query);
             return $result;
         }
         
          public function getCGs($query)
         {
             $result = $this->db->query($query);
             return $result;
         }
         
          public function getCG($query)
         {
              $results = $this->db->query($query);
              $result = $results->fetch();
              return $result;
         }
         
         
        
         
     }
     
?>

