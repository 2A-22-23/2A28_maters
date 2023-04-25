<?php
include '../config.php';
include '../Model/user.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

class userC
{
    public function listusers()
    {
        $sql = "SELECT * FROM user";
        $db = Aconfig::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($identity_card)
{
    $sql = "DELETE FROM user WHERE identity_card = :identity_card";
    $db = Aconfig::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':identity_card', $identity_card);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}


    function adduser($user)
{
    $sql = "INSERT INTO user (identity_card,Name, Email, Sexe, Password,Role) VALUES (:tn,:ln, :fn, :ad, :password,:role)";
    $db = Aconfig::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'tn' => intval($user->getIdentity_card()), // cast to integer
            'ln' => $user->getName(),
            'fn' => $user->getEmail(),
            'ad' => $user->getSexe(),
            'password' => $user->getPassword(),
            'role'=>$user->getRole()
        ]);
       
    } catch (PDOException $e) {
          $e->getMessage();
    }
}
    
    
    
    
    
    
    
    
    function updateuser($user, $identity_card)
    {
        try {
            $db = Aconfig::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                   
                    Name = :Name, 
                    Email = :Email, 
                    Sexe = :Sexe, 
                    Password = :Password
                WHERE identity_card= :identity_card'
            );
            $query->execute([
                'identity_card' => $identity_card,
                'Name' => $user->getName(),
                'Email' => $user->getEmail(),
                'Sexe' => $user->getSexe(),
                'Password' => $user->getPassword()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showuser($identity_card)
    {
        $sql = "SELECT * from user where identity_card = $identity_card";
        $db = Aconfig::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}


