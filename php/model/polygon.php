<?php
class Polygon extends Object_Abstract{

	public $points;

	function __construct(){
		$this->type = TYPE_POLYGON;
		$this->points = array();
	}

	public function addPoint($x, $y){		
		$this->points[] = array($x, $y);
	}

	public function toArray(){
		$array = parent::toArray();
		$array['points'] = array();
		foreach($this->points as $point){
			$array['points'][] = $point;
		}
		return $array;
	}
}