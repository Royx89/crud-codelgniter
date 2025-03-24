<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 25px 40px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .producto {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .acciones a {
            margin-left: 10px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
        }

        .acciones a.eliminar {
            background-color: #e74c3c;
            color: white;
        }

        .acciones a.editar {
            background-color: #3498db;
            color: white;
        }

        .nuevo {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            background-color: #2ecc71;
            padding: 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Lista de productos</h1>

    <a class="nuevo" href="/catalogo/formulario">➕ Agregar nuevo producto</a>

    <?php foreach ($productos as $p): ?>
        <div class="producto">
            <div>
                <strong><?= esc($p['nombre']) ?></strong> – $<?= esc($p['precio']) ?>
            </div>
            <div class="acciones">
                <a href="/catalogo/editar/<?= $p['id'] ?>" class="editar">✏️ Editar</a>
                <a href="/catalogo/eliminar/<?= $p['id'] ?>" class="eliminar" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">🗑️ Eliminar</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
