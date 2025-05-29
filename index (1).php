<?php
$tareas = json_decode(file_get_contents('data/tareas.sql.json'), true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <title>Lista de Tareas</title>
</head>
<body>
  <h1>Gestor de Tareas</h1>
  <a href="agregar.php">Agregar nueva tarea</a>
  <ul>
    <?php foreach ($tareas as $tarea): ?>
      <li>
        <strong><?= htmlspecialchars($tarea['titulo']) ?></strong> - <?= htmlspecialchars($tarea['estado']) ?><br>
        <?= htmlspecialchars($tarea['descripcion']) ?><br>
        <a href="editar.php?id=<?= $tarea['id'] ?>">Editar</a> |
        <a href="eliminar.php?id=<?= $tarea['id'] ?>">Eliminar</a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>