<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tareas = json_decode(file_get_contents('data/tareas.sql.json'), true);
    $nuevaTarea = [
        'id' => time(),
        'titulo' => $_POST['titulo'],
        'descripcion' => $_POST['descripcion'],
        'estado' => $_POST['estado']
    ];
    $tareas[] = $nuevaTarea;
    file_put_contents('data/tareas.sql.json', json_encode($tareas, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Tarea</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Nueva Tarea</h1>
  <form method="POST">
    <label>Título: <input type="text" name="titulo" required></label>
    <label>Descripción: <textarea name="descripcion" required></textarea></label>
    <label>Estado:
      <select name="estado">
        <option value="pendiente">Pendiente</option>
        <option value="en progreso">En Progreso</option>
        <option value="completada">Completada</option>
      </select>
    </label>
    <button type="submit">Guardar</button>
  </form>
  <a href="index.php">← Volver</a>
</body>
</html>