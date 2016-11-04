<?php
class ObjectCollection  {  
		//This is an array to hold line items
		private $line_items_array ;
	
		private $lineCounter; //Count the number of line items
 
		public function __construct() {
	    		//Create an array object to hold line items
	    		$this->line_items_array = array();
			$this->lineCounter=0; 
	 	}
	
		// This will add a new line object to line items array
		public function addLineItem($line_item) {
	   		$this->lineCounter++;
	   		$this->line_items_array[] = $line_item;
    	}
		
		public function getLineCount() {
			return $this->lineCounter;
		}
		
		public function getLineItem($i) {
			return $this->line_items_array[$i];
		}
		
		public function delLineItem($line_item){
       //Check to see if $line_item exists
			if (($key = array_search($line_item, 
				$this->line_items_array )) !== false) {
    		//remove portion of the array	
				array_splice($this->line_items_array, $key, 1);
				$this->lineCounter--;	
			}
		}
		
		public function amendLineItemQuantity($index,$value){
		
			$currentObject = $this->getLineItem($index);
			
			$currentObject->changeQuantity($value);
		}

		

      		 // …..more code to add
	}
