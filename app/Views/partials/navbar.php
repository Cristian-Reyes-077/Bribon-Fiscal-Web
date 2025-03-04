<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css'); ?>"> <!-- Enlace al CSS -->
    
</head>
<body>

<nav class="navbar">
    <div class="left">
        <button class="menu-btn">☰</button>
        <img src="<?= base_url('assets/img/LogoBribonFiscal_ImagenL.png'); ?>" alt="Logo" class="logo">
    </div>

    <div class="center">
        <h2 id="dynamic-title">Selecciona un nombre</h2>
    </div>

    <div class="right">
        <select id="name-selector">
            <option value="Bienvenido">Bienvenido</option>
            <option value="Usuario 1">Usuario 1</option>
            <option value="Usuario 2">Usuario 2</option>
        </select>
    </div>
</nav>

<script src="<?= base_url('assets/js/navbar.js'); ?>"></script>

</body>

</html>
