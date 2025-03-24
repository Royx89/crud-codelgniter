<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Editar producto</h1>

    <?php if (isset($validation)): ?>
        <div class="error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/catalogo/actualizar/<?= $producto['id'] ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= esc($producto['nombre']) ?>" required>

        <label>Descripción:</label>
        <input type="text" name="descripcion" value="<?= esc($producto['descripcion']) ?>" required>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?= esc($producto['precio']) ?>" required>

        <button type="submit">Actualizar</button>
    </form>

    <a href="/catalogo">← Volver al listado</a>
</div>
</body>
</html>
