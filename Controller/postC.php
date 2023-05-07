<?php
	include '../Myconfig.php';
	include_once '../Model/post.php';
	class postC {
		function afficherpost(){
			$sql="SELECT * FROM post";
			$db = Myconfig::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function affichertritempspost(){
			$sql="SELECT * FROM post ORDER BY id DESC";
			$db = Myconfig::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function supprimerpost($id){
			$sql="DELETE FROM post WHERE id=:id";
			$db = Myconfig::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterpost($post){
			$sql="INSERT INTO post (id, titre, contenu) 
			VALUES (:id,:titre,:contenu)";
			$db = Myconfig::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $post->getid(),
					'titre' => $post->gettitre(),
					'contenu' => $post->getcontenu(),
					
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererpost($id){
			$sql="SELECT * from post where id=$id";
			$db = Myconfig::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$post=$query->fetch();
				return $post;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierpost($post, $id){
			try {
				$db = Myconfig::getConnexion();
				$query = $db->prepare(
					'UPDATE post SET 
						titre= :titre, 
						contenu= :contenu
					WHERE id= :id'
				);
				$query->execute([
					'titre' => $post->gettitre(),
					'contenu' => $post->getcontenu(),
					
					
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function rechercherpost($query){
			$sql = "SELECT * FROM post WHERE titre LIKE '%$query%' OR contenu LIKE '%$query%'";
			$db = Myconfig::getConnexion();
			try {
				$liste = $db->query($sql);
				return $liste;
			} catch(Exception $e) {
				die('Erreur: '. $e->getMessage());
			}
		}

	}
?>