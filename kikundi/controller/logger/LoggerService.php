<?php
	/**
	 * Class to store and get Loggin-content
	 */
	class LoggerService {
		/**
		 * file where the logs are to be stored
		 */
		static private $file = 'logs/log.txt';
		
		/**
		 * generate a new log
		 */
		public static function log($msg) {
			if (!file_exists(self::$file)) {
			$myfile = fopen(self::$file, "a"); 
			} 
			$current = file_get_contents(self::$file);	
			$current .= date('Y-m-d-h-m-s').$msg."\n";
			file_put_contents(self::$file, $current);
		
		}
		
		/**
		 * get all logs
		 */
		public static function getLogs() {
			if (file_exists(self::$file)) {
			return file_get_contents(self::$file);	
			} else {
				return "no logs found!";
			}
			
		}
		
	}

?>