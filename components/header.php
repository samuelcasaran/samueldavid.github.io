<?php
// Cargar configuración si no está cargada
if (!defined('SITE_NAME')) {
    $config_path = isset($basePath) ? $basePath . 'config.php' : 'config.php';
    if (file_exists($config_path)) {
        require_once $config_path;
    }
}
?>

<!-- Header -->
<header class="fade-in">
    <?php if (isset($showBackButton) && $showBackButton): ?>
        <a href="<?php echo isset($basePath) ? $basePath : ''; ?>#portfolio" class="back-button" title="Volver">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M12.5 15L7.5 10L12.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
    <?php endif; ?>

    <?php if (!isset($showBackButton) || !$showBackButton): ?>
        <div class="logo" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-decoration: none;">
            <a href="<?php echo isset($basePath) ? $basePath : ''; ?>index.php" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; align-items: center;">
                <span style="font-size: 1.3rem; font-weight: 800; color: var(--text-dark); letter-spacing: -0.5px; text-transform: uppercase; line-height: 1.2; font-family: 'Poppins', sans-serif;"><?php echo SITE_NAME; ?></span>
                <span style="font-size: 0.7rem; color: var(--text-light); letter-spacing: 2px; text-transform: uppercase; font-weight: 500; margin-top: 2px;">Product &amp; Code</span>
                <span style="font-size: 0.55rem; color: var(--text-lighter); letter-spacing: 1px; text-transform: uppercase; font-weight: 400; border-top: 1px solid #eee; padding-top: 2px; margin-top: 2px; width: 80px; text-align: center;">Astro Studio</span>
            </a>
        </div>
    <?php endif; ?>

</header>