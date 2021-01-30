<?php

	spl_autoload_register(function ($class) {
		$dirs = array( 'components', 'controllers', 'models');
		foreach ($dirs as $dir) {
			$filePath =  $dir . '/' . strtolower($class) . '.php';

			if (file_exists($filePath)) {
				include_once($filePath);
				break;
			}
		}
	});
	


?>