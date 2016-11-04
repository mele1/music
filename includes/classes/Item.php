<?php
class Item {
	private $id;
	private $description;
	private $image;
	private $price;
	
	public function setId($id) {
		$this -> id = $id;
	}
	
	public function setDescription($description) {
		$this -> description = $description;
	}
	
	public function setImage($image) {
		$this -> image = $image;
	}
	
	public function setPrice($price) {
		$this -> price = $price;
	}
	
	public function __construct($id, $price) {
		$this->id = $id;
		$this->price = $price;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getImage()
	{
		return $this->image;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function __toString()
	{
		return $this->id." ".$this->description." ".$this->price;
	}
}
?>