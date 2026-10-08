<?php
// Connect to MySQL (uses Railway variables)
$db = new PDO(
    'mysql:host=' . getenv('MYSQLHOST') . ';port=' . getenv('MYSQLPORT') . ';dbname=' . getenv('MYSQLDATABASE') . ';charset=utf8mb4',
    getenv('MYSQLUSER'),
    getenv('MYSQLPASSWORD'),
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
