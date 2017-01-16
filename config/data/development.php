<?php

$devAppData = [
	'database' => [
		// Possible fields: 
		// 
		// Required
		// 1. database_type
		// 2. database_name
		// 3. server
		// 4. username
		// 5. password
		// 6. charset
		// 
		// Optional
		// 7. port
		// 8. prefix 

		'server' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database_name' => 'test',
		'database_type' => 'mysql',
		'charset' => 'utf8'
	]
];

return $devAppData;