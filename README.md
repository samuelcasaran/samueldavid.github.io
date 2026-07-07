# Audify - Proyecto Componentizado en PHP

Este proyecto ha sido componentizado para facilitar el mantenimiento y reutilización de código.

## 📁 Estructura del Proyecto

```
audify/
├── components/          # Componentes reutilizables
│   ├── head.php        # Head con meta tags y CSS
│   ├── header.php      # Header del sitio
│   ├── footer.php      # Footer del sitio
│   └── scripts.php     # Scripts JavaScript
├── assets/             # Recursos estáticos
│   ├── css/
│   └── img/
├── proyectos/          # Páginas de proyectos
│   ├── wibbux/
│   ├── banco-bice/
│   ├── racional/
│   └── rydox/
└── index.php           # Página principal
```

## 🎯 Componentes Disponibles

### 1. `components/head.php`
Incluye el `<head>` con meta tags, fuentes y CSS.

**Variables configurables:**
- `$pageTitle` - Título de la página (default: "Audify - Experiencias Web...")
- `$cssPath` - Ruta al CSS principal (default: "assets/css/style.css")
- `$extraCSS` - Array con rutas a CSS adicionales

**Ejemplo de uso:**
```php
<?php 
$pageTitle = "Mi Proyecto - Audify";
$cssPath = "../../assets/css/style.css";
$extraCSS = ["../../assets/css/proyecto.css"];
include '../../components/head.php'; 
?>
```

### 2. `components/header.php`
Header con logo y tagline de Audify.

**Uso:**
```php
<?php include 'components/header.php'; ?>
```

### 3. `components/footer.php`
Footer completo con enlaces y redes sociales.

**Variables configurables:**
- `$basePath` - Ruta base para enlaces (ej: "../../" para proyectos)

**Ejemplo:**
```php
<?php 
$basePath = "../../";
include 'components/footer.php'; 
?>
```

### 4. `components/scripts.php`
Scripts JavaScript para animaciones y funcionalidad.

**Variables configurables:**
- `$hasFAQ` - Si la página tiene sección FAQ (activa el acordeón)

**Ejemplo:**
```php
<?php 
$hasFAQ = true;
include 'components/scripts.php'; 
?>
```

## 🚀 Cómo Crear una Nueva Página de Proyecto

1. **Crear carpeta del proyecto:**
```bash
mkdir proyectos/mi-proyecto
```

2. **Crear el archivo `index.php`:**
```php
<?php 
// Configurar variables
$pageTitle = "Mi Proyecto - Audify";
$basePath = "../../";
$cssPath = "../../assets/css/style.css";
$extraCSS = ["../../assets/css/proyecto.css"];
include '../../components/head.php'; 
?>

<?php include '../../components/header.php'; ?>

<!-- Tu contenido aquí -->
<section class="project-hero">
    <h1>Mi Proyecto</h1>
    <!-- ... -->
</section>

<?php include '../../components/footer.php'; ?>
<?php include '../../components/scripts.php'; ?>
```

3. **Agregar al portfolio en `index.php`:**
```php
<div class="portfolio-item">
    <div class="portfolio-visual">
        <img src="img/portfolio/mi-proyecto.jpg" alt="Mi Proyecto">
    </div>
    <div class="portfolio-info">
        <h3 class="portfolio-name">Mi Proyecto</h3>
        <a href="proyectos/mi-proyecto/index.php" class="portfolio-link">Ver proyecto</a>
    </div>
</div>
```

## 💡 Ventajas de esta Estructura

✅ **Cambios centralizados**: Modifica el header/footer una vez y se actualiza en todas las páginas
✅ **Consistencia**: Todos los proyectos usan los mismos componentes
✅ **Fácil mantenimiento**: Agregar nuevas funciones o estilos desde un solo lugar
✅ **Escalabilidad**: Agregar nuevos proyectos es muy rápido

## 🔧 Editar Elementos Comunes

### Cambiar el Header
Edita `components/header.php`:
```php
<header class="fade-in">
    <div class="logo">Tu Logo</div>
    <div class="header-tagline">Tu Tagline</div>
</header>
```

### Cambiar el Footer
Edita `components/footer.php` para actualizar enlaces, redes sociales o copyright.

### Agregar Nuevos Scripts
Edita `components/scripts.php` para agregar funcionalidad global.

## 📝 Notas Importantes

- Los archivos `.html` originales se mantienen como respaldo
- Las nuevas páginas deben usar extensión `.php`
- Asegúrate de configurar MAMP/servidor PHP correctamente
- Las rutas relativas deben ajustarse según la ubicación del archivo

## 🌐 Servidor Local

Para ver el sitio en tu servidor local:
1. Abre MAMP
2. Navega a: `http://localhost/audify/index.php`
3. O configura un virtual host para mejor URL

---

**¿Preguntas?** Este sistema te permite escalar tu sitio fácilmente agregando nuevos proyectos sin repetir código.

