# Tema Siglo 21 2026

## Descripción
Tema WordPress moderno para Radio Siglo 21, basado en el diseño Muziq con integración completa de WordPress.

## Características
- Diseño responsive con Bootstrap
- Slider de introducción con Superslides
- Carruseles con Owl Carousel y Flickity
- Reproductor de audio integrado
- Galería con Swipebox
- Soporte para miniaturas de posts
- Menús personalizables
- Estilos y scripts organizados siguiendo buenas prácticas de WordPress

## Estructura de Carpetas
```
siglo21_2026/
├── css/
│   ├── template-styles/        # Estilos del template (Bootstrap, librerías, etc.)
│   └── ...                      # Otros estilos del tema
├── js/
│   ├── template-scripts/        # Scripts del template
│   └── ...                      # Otros scripts del tema
├── img/
│   ├── template-images/         # Imágenes del template
│   └── ...                      # Otras imágenes del tema
├── fonts/
│   ├── template-fonts/          # Fuentes del template
│   └── ...                      # Otras fuentes del tema
├── header.php                   # Encabezado del tema
├── footer.php                   # Pie de página del tema
├── index.php                    # Página principal
├── functions.php                # Funciones del tema
├── style.css                    # Información del tema
└── ...
```

## Instalación
1. Coloca la carpeta `siglo21_2026` en `/wp-content/themes/`
2. Ve a WordPress Admin > Apariencia > Temas
3. Activa el tema "Siglo 21 2026"

## Configuración de Menús
1. Ve a WordPress Admin > Apariencia > Menús
2. Crea un nuevo menú llamado "Header Menu"
3. Asigna el menú a la ubicación "Header Menu"

## Uso de Imágenes
- Las imágenes del template están en `/img/template-images/`
- Puedes agregar tus propias imágenes en `/img/`
- Usa `get_template_directory_uri()` para referenciar archivos del tema

## Buenas Prácticas Implementadas
- ✅ Uso de `get_header()` y `get_footer()`
- ✅ Encolado correcto de estilos con `wp_enqueue_style()`
- ✅ Encolado correcto de scripts con `wp_enqueue_script()`
- ✅ Uso de `esc_url()`, `esc_html()`, `wp_kses_post()` para seguridad
- ✅ Uso de `bloginfo()` para información del sitio
- ✅ Uso de `wp_nav_menu()` para menús
- ✅ Soporte para miniaturas de posts
- ✅ Soporte para HTML5
- ✅ Localización (i18n) preparada

## Personalización
Para personalizar el tema:
1. Edita `style.css` para cambiar colores y estilos generales
2. Edita `header.php` para cambiar el encabezado
3. Edita `footer.php` para cambiar el pie de página
4. Edita `index.php` para cambiar la página principal
5. Edita `functions.php` para agregar funcionalidades

## Soporte
Para más información sobre desarrollo de temas WordPress, visita:
- https://developer.wordpress.org/themes/
- https://developer.wordpress.org/plugins/hooks/

---
Desarrollado por Artisan.uy
