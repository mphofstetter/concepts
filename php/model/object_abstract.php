<?php

define('TYPE_POLYGON', 'polygon');
define('TYPE_CIRCLE', 'circle');
define('TYPE_TEXT', 'text');

abstract class Object_Abstract{

	public $type;
	public $px;
	public $py;
	public $color;

	public function toArray(){
		$array = array(
			'type' => $this->type,
			'px' => $this->px,
			'py' => $this->py			
		);
		if($this->type == TYPE_TEXT){
			$array['color'] = $this->color;
		}else{
			$array['fill'] = $this->color;
		}
		return $array;
	}

}