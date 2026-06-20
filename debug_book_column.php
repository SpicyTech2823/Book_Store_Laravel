<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$db = new PDO('mysql:host=127.0.0.1;dbname=book_store_laravel;charset=utf8mb4', 'root', '');
$stmt = $db->query('SHOW COLUMNS FROM books');
$columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "COLUMNS:\n";
var_dump($columns);
$stmt = $db->query('SELECT * FROM books LIMIT 2');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "ROWS:\n";
var_dump($rows);
