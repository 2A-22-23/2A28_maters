<?php
	class commentaire
	{
		private $id=null;
		private $contenu=null;
		private $idpost=null;
		private $rating=null;

		
		
		
		
		function __construct($id, $contenu,$idpost,$rating){
			$this->id=$id;
			$this->contenu=$contenu;
			$this->idpost=$idpost;
			$this->rating=$rating;
			
			
		}
		function getid(){
			return $this->id;
		}
		function getcontenu(){
			return $this->contenu;
		}
		function getidpost(){
			return $this->idpost;
		}
		function getrating(){
			return $this->rating;
		}
		
		
		
		function setcontenu(string $contenu){
			$this->contenu=$contenu;
		}

		function setidpost(string $idpost){
			$this->idpost=$idpost;
		}
		function setrating(string $rating){
			$this->rating=$rating;
		}
		
	
		
	}


?>