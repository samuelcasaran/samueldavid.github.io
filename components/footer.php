<?php
// Cargar configuración si no está cargada
if (!defined('SITE_NAME')) {
    $config_path = isset($basePath) ? $basePath . 'config.php' : 'config.php';
    if (file_exists($config_path)) {
        require_once $config_path;
    }
}
$social = get_social_links();
?>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-section">
            <div class="footer-logo" style="margin-bottom: 1.5rem;">
                <span style="font-size: 1.4rem; font-weight: 800; color: var(--white); letter-spacing: -0.5px; text-transform: uppercase;"><?php echo SITE_NAME; ?></span>
                <div style="font-size: 0.65rem; color: var(--accent-cyan); letter-spacing: 2px; text-transform: uppercase; font-weight: 600; margin-top: 2px;">Product Designer &amp; Dev</div>
            </div>
            <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.7; font-size: 0.9rem;"><?php echo SITE_DESCRIPTION; ?></p>
        </div>
        <div class="footer-section">
            <h3>Enlaces Rápidos</h3>
            <ul>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php">Inicio</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php#servicios">Servicios</a></li>
                <li><a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php#portfolio">Proyectos</a></li>
                <li><a href="<?php echo get_whatsapp_url(); ?>">Contacto</a></li>
            </ul>
        </div>

    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo SITE_YEAR; ?> <?php echo SITE_NAME; ?> — Diseño y desarrollo de productos digitales funcionales. Respaldado por Astro Studio.</p>
    </div>
</footer>

