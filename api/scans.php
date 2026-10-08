<?php
// Receive a scan result from the app (needs the API_KEY header)
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json');

// Check the key
$key = getenv('API_KEY');
if (!$key || ($_SERVER['HTTP_X_API_KEY'] ?? '') !== $key) {
    http_response_code(401);
    exit(json_encode(['error' => 'Unauthorized']));
}

// Read the data sent by the app
$data = json_decode(file_get_contents('php://input'), true);
$device_id = $data['device_id'] ?? '';
if ($device_id == '') {
    http_response_code(400);
    exit(json_encode(['error' => 'device_id is required']));
}

// Find the user (or create one) and update last active
$stmt = $db->prepare('SELECT id FROM users WHERE device_id = ?');
$stmt->execute([$device_id]);
$user_id = $stmt->fetchColumn();

if ($user_id) {
    $db->prepare('UPDATE users SET last_active = NOW() WHERE id = ?')->execute([$user_id]);
} else {
    $db->prepare('INSERT INTO users (name, device_id, last_active) VALUES (?, ?, NOW())')
       ->execute([$data['name'] ?? null, $device_id]);
    $user_id = $db->lastInsertId();
}

// Save the scan
$db->prepare('INSERT INTO scans (user_id, result, confidence) VALUES (?, ?, ?)')
   ->execute([$user_id, $data['result'] ?? '', $data['confidence'] ?? 0]);

echo json_encode(['ok' => true]);
