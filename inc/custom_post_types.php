<?php

/**
 * Registro de custom post-type: Programa.
 */
function siglo21_register_cpt_programa()
{

	$labels = [
		'name' => __('Programas', 'siglo21'),
		'singular_name' => __('Programa', 'siglo21'),
		'add_new' => __('Agregar nuevo', 'siglo21'),
		'add_new_item' => __('Nuevo programa', 'siglo21'),
		'edit_item' => __('Editar programa', 'siglo21'),
		'new_item' => __('Nuevo programa', 'siglo21'),
		'view_item' => __('Ver programa', 'siglo21'),
		'search_items' => __('Buscar programas', 'siglo21'),
		'not_found' => __('Programa no encontrado.', 'siglo21'),
		'not_found_in_trash' => __('Programa no encontrado en papelera.', 'siglo21'),
		'parent_item_colon' => __('Parent Programa:', 'siglo21'),
		'menu_name' => __('Programas', 'siglo21'),
		'all_items' => __('Todos los programas', 'siglo21'),
		'featured_image' => __('Logo del programa', 'siglo21'),
		'set_featured_image' => __('Cargar logo del programa', 'siglo21'),
		'remove_featured_image' => __('Elminar logo del programa', 'siglo21'),
		'use_featured_image' => __('Usar como logo del programa', 'siglo21')
	];

	$args = [
		'public'       => true,
		'show_in_rest' => true,
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Pograma radial.',
		'supports' => ['title', 'editor', 'thumbnail'],
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-microphone',
		'show_in_nav_menus' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => false,
		'capability_type' => 'post'
	];

	register_post_type('programa', $args);
}

add_action('init', 'siglo21_register_cpt_programa');

/**
 * Registro de custom post-type: Conductor.
 */
function siglo21_register_cpt_conductor()
{

	$labels = [
		'name' => __('Conductores', 'siglo21'),
		'singular_name' => __('Conductor', 'siglo21'),
		'add_new' => __('Agregar nuevo', 'siglo21'),
		'add_new_item' => __('Nuevo conductor', 'siglo21'),
		'edit_item' => __('Editar conductor', 'siglo21'),
		'new_item' => __('Nuevo conductor', 'siglo21'),
		'view_item' => __('Ver conductor', 'siglo21'),
		'search_items' => __('Buscar conductores', 'siglo21'),
		'not_found' => __('Conductor no encontrado.', 'siglo21'),
		'not_found_in_trash' => __('Conductor no encontrado en papelera.', 'siglo21'),
		'parent_item_colon' => __('Parent Conductor:', 'siglo21'),
		'menu_name' => __('Conductores', 'siglo21'),
		'all_items' => __('Todos los conductores', 'siglo21'),
		'featured_image' => __('Foto del conductor', 'siglo21'),
		'set_featured_image' => __('Cargar foto del conductor', 'siglo21'),
		'remove_featured_image' => __('Elminar foto del conductor', 'siglo21'),
		'use_featured_image' => __('Usar como foto del conductor', 'siglo21')
	];

	$args = [
		'public'       => true,
		'show_in_rest' => true,
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Conductor de uno o más programas de la radio.',
		'supports' => ['title', 'editor', 'thumbnail'],
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups',
		'show_in_nav_menus' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => false,
		'capability_type' => 'post'
	];

	register_post_type('conductor', $args);
}

add_action('init', 'siglo21_register_cpt_conductor');


/**
 * Registro de custom post-type: Publicidad.
 */
function siglo21_register_cpt_publicidad()
{

	$labels = array(
		'name'                  => _x('Publicidad', 'Post Type General Name', 'siglo21'),
		'singular_name'         => _x('Publicidad', 'Post Type Singular Name', 'siglo21'),
		'menu_name'             => __('Publicidad', 'siglo21'),
		'name_admin_bar'        => __('Publicidades', 'siglo21'),
		'archives'              => __('Archivo de publicidades', 'siglo21'),
		'attributes'            => __('Atributos de publicidades', 'siglo21'),
		'parent_item_colon'     => __('Padre:', 'siglo21'),
		'all_items'             => __('Todas las publicidades', 'siglo21'),
		'add_new_item'          => __('Agregar nueva publicidad', 'siglo21'),
		'add_new'               => __('Agregar nueva publicidad', 'siglo21'),
		'new_item'              => __('Agregar publicidad', 'siglo21'),
		'edit_item'             => __('Editar publicidad', 'siglo21'),
		'update_item'           => __('Actualizar publicidad', 'siglo21'),
		'view_item'             => __('Ver publicidad', 'siglo21'),
		'view_items'            => __('Ver publicidades', 'siglo21'),
		'search_items'          => __('Buscar publicidad', 'siglo21'),
		'not_found'             => __('Not found', 'siglo21'),
		'not_found_in_trash'    => __('Not found in Trash', 'siglo21'),
		'featured_image'        => __('Imagen destacada', 'siglo21'),
		'set_featured_image'    => __('Establecer imagen de la publicidad', 'siglo21'),
		'remove_featured_image' => __('Eliminar imagen del publicidad', 'siglo21'),
		'use_featured_image'    => __('Usar como imagen del publicidad', 'siglo21'),
		'insert_into_item'      => __('Insert into item', 'siglo21'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'siglo21'),
		'items_list'            => __('Items list', 'siglo21'),
		'items_list_navigation' => __('Items list navigation', 'siglo21'),
		'filter_items_list'     => __('Filtrar publicidades', 'siglo21'),
	);

	$args = array(
		'public'       			=> true,
		'show_in_rest' 			=> true,
		'label'                 => __('Publicidad', 'siglo21'),
		'description'           => __('Publicidades para sección Interés turístico.', 'siglo21'),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail'),
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type('publicidad', $args);
}
add_action('init', 'siglo21_register_cpt_publicidad');

// Cambiar "posts" por "noticia" en el side menu admin:
function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'Noticias';
	$submenu['edit.php'][5][0] = 'Todas las noticias';
	$submenu['edit.php'][10][0] = 'Agregar nueva noticia';
	$submenu['edit.php'][16][0] = 'Tags';
	echo '';
}
add_action('admin_menu', 'change_post_menu_label');

// Cambiar los labels de post a "noticia"
function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Noticias';
	$labels->singular_name = 'Noticia';
	$labels->menu_name  = 'Noticias';
	$labels->name_admin_bar = 'Noticia';
	$labels->archives = 'Archivo de noticias';
	$labels->attributes = 'Atributos de noticias';
	$labels->parent_item_colon = 'Noticia padre';
	$labels->all_items = 'Todos las noticias';
	$labels->add_new_item = 'Agregar nueva noticia';
	$labels->add_new = 'Agregar nueva';
	$labels->new_item = 'Nueva noticia';
	$labels->edit_item = 'Editar noticia';
	$labels->update_item = 'Actualizar noticia';
	$labels->view_item = 'Ver noticia';
	$labels->view_items = 'Ver noticias';
	$labels->search_items = 'Buscar noticia';
	$labels->not_found = 'No encontrada';
	$labels->not_found_in_trash = 'No se encontró en la papelera';
	$labels->featured_image = 'Imagen de la noticia';
	$labels->set_featured_image = 'Cargar imagen de la noticia';
	$labels->remove_featured_image = 'Eliminar imagen de la noticia';
	$labels->use_featured_image = 'Usar como imagen de la noticia';
	$labels->insert_into_item = 'Insertar en noticia';
	$labels->uploaded_to_this_item = 'Cargar a esta noticia';
	$labels->items_list = 'Lista de noticias';
	$labels->items_list_navigation = 'Lista de navegación de noticias';
	$labels->filter_items_list = 'Filtrar lista de noticias';
}
add_action('init', 'change_post_object_label');

/**
 * Registro de custom post-type: Sorteo.
 */
function siglo21_register_cpt_sorteo()
{

	$labels = [
		'name' => __('Sorteos', 'siglo21'),
		'singular_name' => __('Sorteo', 'siglo21'),
		'add_new' => __('Agregar nuevo', 'siglo21'),
		'add_new_item' => __('Nuevo sorteo', 'siglo21'),
		'edit_item' => __('Editar sorteo', 'siglo21'),
		'new_item' => __('Nuevo sorteo', 'siglo21'),
		'view_item' => __('Ver sorteo', 'siglo21'),
		'search_items' => __('Buscar sorteos', 'siglo21'),
		'not_found' => __('Sorteo no encontrado.', 'siglo21'),
		'not_found_in_trash' => __('Programa no encontrado en papelera.', 'siglo21'),
		'parent_item_colon' => __('Parent Sorteo:', 'siglo21'),
		'menu_name' => __('Sorteos', 'siglo21'),
		'all_items' => __('Todos los sorteos', 'siglo21'),
		'featured_image' => __('Imagen promocional', 'siglo21'),
		'set_featured_image' => __('Cargar imagen promocional', 'siglo21'),
		'remove_featured_image' => __('Elminar imagen promocional', 'siglo21'),
		'use_featured_image' => __('Usar como imagen promocional', 'siglo21')
	];

	$args = [
		'public'       => true,
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Sorteo.',
		'supports' => ['title', 'editor', 'thumbnail'],
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-tickets',
		'show_in_nav_menus' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => false,
		'capability_type' => 'post'
	];

	register_post_type('sorteo', $args);
}
add_action('init', 'siglo21_register_cpt_sorteo');
