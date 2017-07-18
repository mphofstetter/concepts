<?php
class Circle extends Object_Abstract{

	public $radius;

	function __construct(){
		$this->type = TYPE_CIRCLE;
	}

	public function toArray(){
		$array = parent::toArray();		
		$array['radius'] = $this->radius;
		return $array;
	}
}