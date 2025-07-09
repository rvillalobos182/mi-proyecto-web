<?php
$dsn = 'mysql:host=localhost;dbname=mi_bd;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Error al conectar: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? '';

    if ($nombre && $precio) {
        $stmt = $pdo->prepare('INSERT INTO productos (nombre, precio) VALUES (?, ?)');
        $stmt->execute([$nombre, $precio]);
        header('Location: index.php');
        exit;
    }
}

$productos = $pdo->query('SELECT * FROM productos')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2em; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 1em; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        form div { margin-bottom: 0.5em; }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['id']); ?></td>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($producto['precio']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar producto</h2>
    <form method="post" action="">
        <div>
            <label>Nombre:
                <input type="text" name="nombre" required>
            </label>
        </div>
        <div>
            <label>Precio:
                <input type="number" step="0.01" name="precio" required>
            </label>
        </div>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
