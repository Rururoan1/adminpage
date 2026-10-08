<?php
// Send the whole library to the app (same field names as the app's PestInfo)
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json; charset=utf-8');

$version = $db->query('SELECT version FROM library_meta WHERE id = 1')->fetchColumn();
$items = $db->query('SELECT slug AS id, type, name, local_name AS localName, scientific_name AS scientificName,
                            description, cause, symptoms, prevention
                     FROM library_items ORDER BY type, name')->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['version' => (int) $version, 'items' => $items], JSON_UNESCAPED_UNICODE);
