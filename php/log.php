<?php class Log{

	private static $log = array();

	public static function write($string){
		self::$log[] = $string;
	}

	public static function toHTML(){
		$results = implode("\n", self::$log);
		$results .= "\n";
		return $results;
	}
}