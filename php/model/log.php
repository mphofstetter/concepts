<?php class Log{

	private static $log = array();

	public static function writeLine($string){
		self::$log[] = $string . "\n";
	}

	public static function write($string){
		self::$log[] = $string;
	}

	public static function toHTML(){
		$results = implode("", self::$log);
		return $results;
	}
}