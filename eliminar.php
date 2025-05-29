<?php
$id = $_GET['id'];
$tareas = json_decode(file_get_contents('data/tareas.sql.json'), true);
$tareas = array_filter($tareas, fn($t) => $t['id'] != $id);
file_put_contents('data/tareas.sql.json', json_encode(array_values($tareas), JSON_PRETTY_PRINT));
header("Location: index.php");
exit;