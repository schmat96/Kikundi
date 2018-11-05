<?php
	
	class LoggerService {
		
		static private $file = 'logs/log.txt';
		
		public static function log($msg) {
			if (!file_exists(self::$file)) {
			$myfile = fopen(self::$file, "a"); 
			} 
			$current = file_get_contents(self::$file);	
			$current .= date('Y-m-d-h-m-s').$msg."\n";
			file_put_contents(self::$file, $current);
		
		}
		
		public static function getLogs() {
			if (file_exists(self::$file)) {
			return file_get_contents(self::$file);	
			} else {
				return "no logs found!";
			}
			
		}
		
	}

?>