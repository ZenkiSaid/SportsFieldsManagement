<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Fields Management</title>
    <link rel="stylesheet" href="public/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="public/assets/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php
    $rol = $_SESSION['usuario_rol'] ?? 2;
    if ($rol == 1) {
        include 'siderbar_admin.php';
    } elseif ($rol == 2) {
        include 'sidebar_cli.php';
    } elseif ($rol == 3) {
        include 'siderbar_org.php';
    }
    ?>

    <div class="content-wrapper">