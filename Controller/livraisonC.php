<?php
include '../config.php';
include '../Model/livraison.php';

class livraisonC
{
    public function listlivraisons()
    {
        $sql = "SELECT * FROM livraison";
        $db = Aconfig::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletelivraison($id)
    {
        $sql = "DELETE FROM livraison WHERE id = :id";
        $db = Aconfig::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addlivraison($livraison)
{
    $sql = "INSERT INTO livraison (id,first_name,phone_number,postal_code) VALUES (:tn,:ln,:ad, :email)";
    $db = Aconfig::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'tn' => intval($livraison->getid()), // cast to integer
            'ln' => $livraison->getfirst_name(),
            'ad' => $livraison->getphone_number(),
            'email' => $livraison->getpostal_code()
        ]);
       
    } catch (PDOException $e) {
          $e->getMessage();
    }
}
    
    
    
    

    function updatelivraison($livraison, $id)
    {
        try {
            $db = Aconfig::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET 
                    first_name = :first_name, 
                    phone_number = :phone_number, 
                    postal_code = :postal_code 
                    
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'first_name' => $livraison->getfirst_name(),
                'phone_number' => $livraison->getphone_number(),
                'postal_code' => $livraison->getpostal_code()
           
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showlivraison($id)
    {
        $sql = "SELECT * from livraison where id = $id";
        $db = Aconfig::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $livraison = $query->fetch();
            return $livraison;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
