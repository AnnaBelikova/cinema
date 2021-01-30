<?php

	final class DB {

		private static $instance = null;

		private function __construct() {
			include_once('config/db.php');
			$connection = mysqli_connect($db['host'], $db['user'], $db['password'], $db['db_name']);
			mysqli_set_charset($connection, 'utf8');
			self::$instance = $connection;
		}

		public static function getConnection() {
			if (self::$instance === null) {
				new self();
			}
			return self::$instance;
		}
	}