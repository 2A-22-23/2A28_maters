<?php
include '../config.php';
include '../Model/livreur.php';

class livreurC
{
    public function listlivreur()
    {
        $sql = "SELECT * FROM livreur";
        $db = Aconfig::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletelivreur($id)
    {
        $sql = "DELETE FROM livreur WHERE id = :id";
        $db = Aconfig::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addlivreur($livreur)
{
    $sql = "INSERT INTO livreur (id,first_name,disponibilite,postal_code) VALUES (:tn,:ln, :fn, :ad)";
    $db = Aconfig::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'tn' => intval($livreur->getid()), // cast to integer
            'ln' => $livreur->getfirst_name(),
            'fn' => $livreur->getdispo(),
            'ad' => $livreur->getpostal_code()
        ]);
       
    } catch (PDOException $e) {
          $e->getMessage();
    }
}
    
    
    
    

    function updatelivreur($livreur, $id)
    {
        try {
            $db = Aconfig::getConnexion();
            $query = $db->prepare(
                'UPDATE livreur SET 
                    first_name = :first_name, 
                    disponibilite = :disponibilite, 
                    postal_code = :postal_code 
                    
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'first_name' => $livreur->getfirst_name(),
                'disponibilite' => $livreur->getdispo(),
                'postal_code' => $livreur->getpostal_code()
           
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showlivreur($id)
    {
        $sql = "SELECT * from livreur where id = $id";
        $db = Aconfig::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $livreur = $query->fetch();
            return $livreur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
