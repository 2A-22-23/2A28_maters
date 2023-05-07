<?php
	include '../config.php';
	include_once '../Model/commentaire.php';
	class commentaireC {
		public function affichercommentaire($id_post){
			$db = AConfig::getConnexion();
			$stmt = $db->prepare("SELECT * FROM commentaire WHERE idpost = :id_post");
			$stmt->bindValue(':id_post', $id_post);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		public function afficherAverageRating($id_post){
			$db = AConfig::getConnexion();
			$stmt = $db->prepare("SELECT AVG(rating) AS average_rating FROM commentaire WHERE idpost = :id_post");
			$stmt->bindValue(':id_post', $id_post);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $result['average_rating'];
		}
		
		function supprimercommentaire($id){
			$sql="DELETE FROM commentaire WHERE id=:id";
			$db = AConfig::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercommentaire($commentaire){
			$sql="INSERT INTO commentaire (id, contenu, idpost, rating) 
			VALUES (:id,:contenu,:idpost,:rating)";
			$db = AConfig::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $commentaire->getid(),
					'contenu' => $commentaire->getcontenu(),
					'idpost' => $commentaire->getidpost(),
					'rating' => $commentaire->getrating(),
					
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercommentaire($id){
			$sql="SELECT * from commentaire where id=$id";
			$db = AConfig::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$commentaire=$query->fetch();
				return $commentaire;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercommentaire($commentaire, $id){
			try {
				$db = AConfig::getConnexion();
				$query = $db->prepare(
					'UPDATE commentaire SET 
						contenu= :contenu,
						rating= :rating
					WHERE id= :id'
				);
				$query->execute([
					'contenu' => $commentaire->getcontenu(),
					'rating' => $commentaire->getrating(),
					
					
					
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>