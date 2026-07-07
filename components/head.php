<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Astro studio - Experiencias Web de Próxima Generación'; ?></title>
    <link rel="icon" type="image/png" href="<?php echo isset($basePath) ? $basePath : ''; ?>assets/img/Favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php 
    // Permitir rutas CSS personalizadas
    $cssVersion = filemtime(isset($basePath) ? $basePath . 'assets/css/style.css' : 'assets/css/style.css');
    if (isset($cssPath)) {
        echo '<link rel="stylesheet" href="' . $cssPath . '?v=' . $cssVersion . '">';
    } else {
        echo '<link rel="stylesheet" href="assets/css/style.css?v=' . $cssVersion . '">';
    }
    
    // CSS adicional para páginas de proyectos
    if (isset($extraCSS)) {
        foreach ($extraCSS as $css) {
            echo '<link rel="stylesheet" href="' . $css . '">';
        }
    }
    ?>
</head>
<body>

