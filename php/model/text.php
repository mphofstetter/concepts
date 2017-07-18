<?php
class Text extends Object_Abstract{

	public $text;
	public $align;
	public $font;

	function __construct(){
		$this->type = TYPE_TEXT;
	}

	public function setText($string){
		$this->text = $string;
	}

	public function toArray(){
		$array = parent::toArray();		
		$array['align'] = $this->align;
		$array['font'] = $this->font;
		$array['text'] = $this->text;
		return $array;
	}
}