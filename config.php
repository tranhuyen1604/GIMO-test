<?php 

return [
	'database' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db_name' => 'test',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    ]
];