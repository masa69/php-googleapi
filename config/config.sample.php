<?php

class Config {

	private static $config = [
		'google' => [
			'calendarId' => 'YOUR GOOGLE CALENDAR ID',
			'json' => APP_PATH . '/config/client_secret.json',
		],
	];


	public static function get($name) {
		if (isset(self::$config[$name])) {
			if (is_array(self::$config[$name])) {
				return (object) self::$config[$name];
			}
			return self::$config[$name];
		}
		return null;
	}

}