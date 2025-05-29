<?php
$tareas = json_decode(file_get_contents('data/tareas.sql.json'), true);
$id = $_GET['id'];
$tarea = null;

foreach ($tareas as $t) {
    if ($t['id'] == $id) {
        $tarea = $t;
        break;
    }
}

if (!$tarea) {
    echo "Tarea no encontrada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($tareas as &$t) {
        if ($t['id'] == $id) {
            $t['titulo'] = $_POST['titulo'];
            $t['descripcion'] = $_POST['descripcion'];
            $t['estado'] = $_POST['estado'];
            break;
        }
    }
    file_put_contents('data/tareas.sql.json', json_encode($tareas, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Tarea</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Editar Tarea</h1>
  <form method="POST">
    <label>Título: <input type="text" name="titulo" value="<?= htmlspecialchars($tarea['titulo']) ?>" required></label>
    <label>Descripción: <textarea name="descripcion" required><?= htmlspecialchars($tarea['descripcion']) ?></textarea></label>
    <label>Estado:
      <select name="estado">
        <option value="pendiente" <?= $tarea['estado'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
        <option value="en progreso" <?= $tarea['estado'] === 'en progreso' ? 'selected' : '' ?>>En Progreso</option>
        <option value="completada" <?= $tarea['estado'] === 'completada' ? 'selected' : '' ?>>Completada</option>
      </select>
    </label>
    <button type="submit">Actualizar</button>
  </form>
  <a href="index.php">← Volver</a>
</body>
</html>