<?php
	class post
	{
		private $id=null;
		private $titre=null;
		private $contenu=null;

		
		
		
		
		function __construct($id, $titre,$contenu){
			$this->id=$id;
			$this->titre=$titre;
			$this->contenu=$contenu;
			
			
		}
		function getid(){
			return $this->id;
		}
		function gettitre(){
			return $this->titre;
		}
		function getcontenu(){
			return $this->contenu;
		}
		
		
		
		function settitre(string $titre){
			$this->titre=$titre;
		}

		function setcontenu(string $contenu){
			$this->titre=$contenu;
		}
		
	
		
	}


?>