<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

	<!-- Favicon -->
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon-196x196.png" sizes="196x196">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/apple-touch-icon-152x152.png">

	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target="#navbar-muziq" data-offset="80" <?php body_class(); ?>>

	<!-- LOADER -->
	<div id="mask">
		<div class="loader">
			<div class="cssload-container">
				<div class="cssload-shaft1"></div>
				<div class="cssload-shaft2"></div>
				<div class="cssload-shaft3"></div>
				<div class="cssload-shaft4"></div>
				<div class="cssload-shaft5"></div>
				<div class="cssload-shaft6"></div>
				<div class="cssload-shaft7"></div>
				<div class="cssload-shaft8"></div>
				<div class="cssload-shaft9"></div>
				<div class="cssload-shaft10"></div>
			</div>
		</div>
	</div>

	<?php
	// En el home los links del menú son anchors dentro de la misma página.
	// En el resto de las páginas apuntan de vuelta al home + el anchor.
	$anchor_base = is_front_page() ? '' : home_url( '/' );
	?>

	<!-- HEADER -->
	<header id="jHeader"<?php echo ! is_front_page() ? ' class="solid"' : ''; ?>>
		<nav class="navbar navbar-default" role="navigation">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Desplegar navegación</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/basic/logo2.png" alt="logo"></a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar-muziq">
				<ul class="nav navbar-nav navbar-right">
					<li<?php echo is_front_page() ? ' class="active"' : ''; ?>><a href="<?php echo esc_url( $anchor_base . '#anchor00' ); ?>">Inicio</a></li>
					<li><a href="<?php echo esc_url( $anchor_base . '#anchor01' ); ?>">Programas</a></li>
					<li><a href="<?php echo esc_url( $anchor_base . '#anchor02' ); ?>">Conductores</a></li>
					<li><a href="<?php echo esc_url( $anchor_base . '#anchor06' ); ?>">Redes</a></li>
					<li><a href="<?php echo esc_url( $anchor_base . '#anchor07' ); ?>">Noticias</a></li>
					<li><a href="<?php echo esc_url( $anchor_base . '#anchor08' ); ?>">Contacto</a></li>
				</ul>
			</div>

		</nav>
	</header>
