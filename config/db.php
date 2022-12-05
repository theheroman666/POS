<?php

use FFI\Exception;

class Database
{
	public static function connect()
	{
		try {
			//code...
			$db = new mysqli('localhost', 'root', '', 'restaurantes');
			$db->query("SET NAMES 'utf8'");
			return $db;
		} catch (Exception $e) {

			return $e->getMessage();
		}
	}
}
