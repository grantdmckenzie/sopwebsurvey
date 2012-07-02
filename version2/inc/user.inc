<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: User Object
	*/
	
	class wsuser {
		
		public $id;
		public $first;
		public $last;
		public $email;
		public $page;
		
		public function addFromDB($row) {
			$this->id=$row['id'];
			$this->first=$row['firstname'];
			$this->last=$row['lastname'];
			$this->page=$row['page'];
			$this->email=$row['email'];
		}
	}	
?>