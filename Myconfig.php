<?php
  class Myconfig {
    private static $pdo = null;
    
    public static function getConnexion(){
        if(!isset(self::$pdo)){
            try{
                self::$pdo = new PDO('mysql:host=localhost;dbname=reverso2a28', 'root', '');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                die('Erreur:'.$e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
