<?php
/**
 * CONFIGURACIÓN GLOBAL DEL SITIO
 * 
 * Centraliza toda la información del sitio en un solo lugar.
 * Si necesitas cambiar tu número de WhatsApp, redes sociales o
 * nombre de la empresa, solo edita este archivo.
 */

// ============================================
// INFORMACIÓN DE LA EMPRESA
// ============================================
define('SITE_NAME', 'Samuel Casaran');
define('SITE_TAGLINE', 'Product Designer & Full-Stack Developer');
define('SITE_DESCRIPTION', 'Diseño y desarrollo productos digitales funcionales para emprendedores, founders y negocios: MVPs, SaaS, dashboards, plataformas web y experiencias móviles.');
define('SITE_YEAR', '2026');

// ============================================
// CONTACTO
// ============================================
define('WHATSAPP_NUMBER', '56934058501'); // Solo números, sin + ni espacios
define('CONTACT_EMAIL', 'astrostudiochile@gmail.com');

// ============================================
// REDES SOCIALES
// ============================================
define('SOCIAL_INSTAGRAM', 'https://www.instagram.com/astrostudiochile/');
define('SOCIAL_LINKEDIN', '#'); // Se puede actualizar después
define('SOCIAL_FACEBOOK', '#');
define('SOCIAL_TWITTER', '#');

// ============================================
// URLS BASE
// ============================================
define('BASE_URL', '/Samuel/'); // Directorio del usuario es Samuel
define('ASSETS_URL', BASE_URL . 'assets/');

// ============================================
// MENSAJES DE WHATSAPP
// ============================================
$whatsapp_messages = [
    'agendar'              => 'Hola Samuel 👋, vi tu portafolio y me interesa conversar sobre una idea o proyecto digital.',
    'cotizar'              => 'Hola Samuel 👋, me gustaría cotizar el diseño y desarrollo de un producto digital con tu ayuda.',
    'validacion'           => 'Hola Samuel 👋, tengo una idea y me interesa el Sprint de Producto para aterrizarla y diseñar los prototipos.',
    'mvp'                  => 'Hola Samuel 👋, quiero construir un MVP funcional para mi proyecto. ¿Cómo podemos empezar?',
    'growth'               => 'Hola Samuel 👋, tengo un sistema/producto existente y me gustaría optimizarlo o agregarle nuevas funcionalidades.',
    'proyecto_similar'     => 'Hola Samuel 👋, vi tu portafolio y me gustaría saber más sobre uno de tus proyectos.',
    'informacion'          => 'Hola Samuel 👋, vi tu portafolio y me interesa conversar sobre una idea o proyecto digital.',
    // Mensajes por intención específica (embudo)
    'idea_mvp'             => 'Hola Samuel 👋, tengo una idea de producto digital y quiero aterrizar una primera versión. ¿Podemos conversar?',
    'proceso_manual'       => 'Hola Samuel 👋, tengo un proceso manual en mi negocio (Excel, WhatsApp o papel) y quiero ver si se puede convertir en un sistema digital.',
    'dashboard_plataforma' => 'Hola Samuel 👋, necesito una plataforma o dashboard para gestionar información de mi negocio. ¿Cómo lo encaramos?',
    'aterrizar'            => 'Hola Samuel 👋, tengo una idea o proceso que quiero convertir en software. Te cuento más para ver qué primera versión tendría sentido.',
];

// ============================================
// FUNCIÓN HELPER - URL de WhatsApp
// ============================================
function get_whatsapp_url($message_key = 'informacion') {
    global $whatsapp_messages;
    $message = isset($whatsapp_messages[$message_key]) ? $whatsapp_messages[$message_key] : $whatsapp_messages['informacion'];
    return 'https://wa.me/' . WHATSAPP_NUMBER . '?text=' . urlencode($message);
}

// ============================================
// FUNCIÓN HELPER - URL de Redes Sociales
// ============================================
function get_social_links() {
    return [
        'instagram' => SOCIAL_INSTAGRAM,
        'linkedin' => SOCIAL_LINKEDIN,
        'facebook' => SOCIAL_FACEBOOK,
        'twitter' => SOCIAL_TWITTER,
        'whatsapp' => get_whatsapp_url()
    ];
}
?>

