<?php get_header(); ?>

<h1 class="sr-only"><?php bloginfo( 'name' ); ?></h1>

<section class="section biography inverse-color" id="anchor00">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="hero-top-spacer"></div>
                <div class="separator-icon">
                    <i class="fa fa-twitch"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 animatedParent">
                <!-- Twitch Player Container -->
                <div id="twitch-embed" class="animated fadeInUp"></div>
            </div>
        </div>
        <div class="voffset150"></div>
    </div>
</section>

<!-- PROGRAMAS -->
<section class="section discography inverse-color" id="anchor01">
    <div id="discography"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="voffset70"></div>
                <div class="separator-icon">
                    <i class="fa fa-microphone"></i>
                </div>
                <div class="voffset30"></div>
                <p class="pretitle">para todos los gustos</p>
                <div class="voffset20"></div>
                <h2 class="title">Programas</h2>
                <div class="voffset80"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                $programas = new WP_Query( array(
                    'post_type'      => 'programa',
                    'posts_per_page' => -1,
                    'meta_key'       => 'hora_inicio',
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                ) );
                ?>

                <?php if ( $programas->have_posts() ) : ?>

                <ul class="carousel-discography js-flickity" data-flickity-options="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;wrapAround&quot;: true, &quot;contain&quot;: true, &quot;prevNextButtons&quot;: false, &quot;autoPlay&quot;: 2500, &quot;pauseAutoPlayOnHover&quot;: true}">

                    <?php while ( $programas->have_posts() ) : $programas->the_post();
                        $programa_slug = get_post_field( 'post_name' );
                        $hora_inicio   = get_field( 'hora_inicio' );
                        $hora_fin      = get_field( 'hora_fin' );
                    ?>

                    <li class="gallery-cell col-xs-12 col-sm-6 col-md-4">
                        <div class="info-album">
                            <div class="cover" data-toggle="modal" data-target="#programa-<?php echo esc_attr( $programa_slug ); ?>" role="button" tabindex="0" aria-label="<?php echo esc_attr( 'Ver programa ' . get_the_title() ); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'listados-thumbnail' ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/discography/disco-1.jpg" alt="">
                                <?php endif; ?>
                                <div class="rollover">
                                    <i class="fa fa-info-circle"></i>
                                    <p>ver programa</p>
                                </div>
                            </div>
                            <p class="album"><?php the_title(); ?></p>
                            <?php if ( $hora_inicio && $hora_fin ) : ?>
                                <p class="artist"><?php echo esc_html( $hora_inicio . ' a ' . $hora_fin . ' hs' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </li>

                    <?php endwhile; ?>

                </ul>

                <?php $programas->rewind_posts(); ?>

                <?php while ( $programas->have_posts() ) : $programas->the_post();
                    $programa_slug = get_post_field( 'post_name' );
                    $hora_inicio   = get_field( 'hora_inicio' );
                    $hora_fin      = get_field( 'hora_fin' );
                    // "conduce" puede venir como posts o como IDs según la configuración de ACF.
                    $conductores   = array_filter( array_map( 'get_post', (array) get_field( 'conduce' ) ) );
                    $dias          = siglo21_normalize_program_days( get_field( 'dias' ) );
                    $dias_texto    = siglo21_format_program_days( $dias );
                    $whatsapp_url  = siglo21_whatsapp_url( get_field( 'celular_programa' ) );
                    $facebook_url  = get_field( 'facebook_programa' );
                    $instagram_url = get_field( 'instagram_programa' );
                    $embed         = siglo21_program_embed( get_field( 'streaming_embed_code' ) );
                    $titulo_id     = 'programa-' . $programa_slug . '-titulo';
                    $contenido     = apply_filters( 'the_content', get_the_content() );
                ?>

                <!-- Modal: <?php the_title(); ?> -->
                <div class="modal fade program-modal" id="programa-<?php echo esc_attr( $programa_slug ); ?>" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="<?php echo esc_attr( $titulo_id ); ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                            </button>
                            <div class="program-modal__grid">
                                <div class="program-modal__cover">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium', array( 'alt' => '' ) ); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/discography/disco-1.jpg" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="program-modal__info">
                                    <p class="program-modal__pretitle">Programa</p>
                                    <h3 class="program-modal__title" id="<?php echo esc_attr( $titulo_id ); ?>"><?php the_title(); ?></h3>

                                    <?php if ( $dias_texto || ( $hora_inicio && $hora_fin ) ) : ?>
                                    <div class="program-modal__chips">
                                        <?php if ( $dias_texto ) : ?>
                                            <span class="program-modal__chip"><?php echo esc_html( $dias_texto ); ?></span>
                                        <?php endif; ?>
                                        <?php if ( $hora_inicio && $hora_fin ) : ?>
                                            <span class="program-modal__chip"><?php echo esc_html( $hora_inicio . ' – ' . $hora_fin . ' hs' ); ?></span>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $dias ) && $hora_inicio && $hora_fin ) : ?>
                                            <span class="program-modal__live" hidden
                                                data-dias="<?php echo esc_attr( implode( ',', (array) $dias ) ); ?>"
                                                data-inicio="<?php echo esc_attr( $hora_inicio ); ?>"
                                                data-fin="<?php echo esc_attr( $hora_fin ); ?>"><span aria-hidden="true">●</span> EN VIVO</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ( '' !== trim( wp_strip_all_tags( str_replace( '&nbsp;', ' ', $contenido ) ) ) ) : ?>
                                        <div class="program-modal__description"><?php echo $contenido; // phpcs:ignore WordPress.Security.EscapeOutput -- salida de the_content, igual que the_content(). ?></div>
                                    <?php endif; ?>

                                    <?php if ( $embed ) : ?>
                                        <div class="program-modal__embed<?php echo false !== stripos( $embed, '<iframe' ) ? ' program-modal__embed--video' : ''; ?>"><?php echo $embed; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitizado con wp_kses en siglo21_program_embed(). ?></div>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $conductores ) ) : ?>
                                    <div class="program-modal__block">
                                        <p class="program-modal__label"><?php echo count( $conductores ) > 1 ? 'Conducen' : 'Conduce'; ?></p>
                                        <ul class="program-modal__hosts">
                                            <?php foreach ( $conductores as $conductor ) : ?>
                                            <li class="program-modal__host">
                                                <?php if ( has_post_thumbnail( $conductor ) ) : ?>
                                                    <?php echo get_the_post_thumbnail( $conductor, 'thumbnail', array( 'class' => 'program-modal__avatar', 'alt' => $conductor->post_title ) ); ?>
                                                <?php else : ?>
                                                    <span class="program-modal__avatar program-modal__avatar--initial" aria-hidden="true"><?php echo esc_html( mb_substr( $conductor->post_title, 0, 1 ) ); ?></span>
                                                <?php endif; ?>
                                                <span><?php echo esc_html( $conductor->post_title ); ?></span>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ( $whatsapp_url || $facebook_url || $instagram_url ) : ?>
                                    <div class="program-modal__block">
                                        <p class="program-modal__label">Contacto</p>
                                        <div class="program-modal__contact">
                                            <?php if ( $whatsapp_url ) : ?>
                                                <a class="program-modal__whatsapp" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i> Escribinos por WhatsApp</a>
                                            <?php endif; ?>
                                            <?php if ( $facebook_url ) : ?>
                                                <a class="program-modal__social" href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( 'Facebook de ' . get_the_title() ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                            <?php if ( $instagram_url ) : ?>
                                                <a class="program-modal__social" href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( 'Instagram de ' . get_the_title() ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile;
                wp_reset_postdata(); ?>

                <?php else : ?>

                <p class="text-center">Muy pronto vamos a anunciar la programación.</p>

                <?php endif; ?>

                <div class="voffset90"></div>
            </div>
        </div>
    </div>
</section>

<!-- CONDUCTORES -->
<section class="section featured-artists" id="anchor02">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="voffset70"></div>
                <div class="separator-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="voffset30"></div>
                <p class="pretitle">las voces de la radio</p>
                <div class="voffset20"></div>
                <h2 class="title">Conductores</h2>
                <div class="voffset80"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="voffset20"></div>

                <?php
                $conductores = new WP_Query( array(
                    'post_type'      => 'conductor',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ) );
                ?>

                <?php if ( $conductores->have_posts() ) : ?>

                <div class="js-flickity" data-flickity-options="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;wrapAround&quot;: true, &quot;prevNextButtons&quot;: false, &quot;autoPlay&quot;: 3500, &quot;pauseAutoPlayOnHover&quot;: true}">

                    <?php while ( $conductores->have_posts() ) : $conductores->the_post(); ?>

                    <div class="gallery-cell col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="featured-artist">
                            <div class="image">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'listados-thumbnail' ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/template-images/demo/artists/featured-artist1.jpg" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="rollover">
                                <div class="text">
                                    <h4 class="title-artist"><?php the_title(); ?></h4>
                                    <?php if ( has_excerpt() || get_the_content() ) : ?>
                                        <p><?php echo esc_html( wp_trim_words( get_the_content(), 20 ) ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </div>

                <?php else : ?>

                <p class="text-center">Muy pronto vamos a presentar a los conductores.</p>

                <?php endif; ?>

            </div>
        </div>
        <div class="voffset120"></div>
    </div>
</section>

<!-- REDES SOCIALES -->
<section class="section twitterfeed social-section inverse-color full-width parallax-section" id="anchor06" data-parallax-image="<?php echo esc_url( get_template_directory_uri() ); ?>/img/BG/banner1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <i class="fa fa-share-alt"></i>
                <h2 class="title">Seguí nuestras redes</h2>
                <p class="subtitle-text">Y no te pierdas de ningún sorteo</p>
                <div class="voffset30"></div>

                <?php if ( $facebook = get_option( 'siglo21_option_generales_facebook' ) ) : ?>
                    <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" class="btn rounded icon"><i class="fa fa-facebook"></i> Me gusta en Facebook</a>
                <?php endif; ?>

                <?php if ( $instagram = get_option( 'siglo21_option_generales_instagram' ) ) : ?>
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" class="btn rounded icon"><i class="fa fa-instagram"></i> Seguinos en Instagram</a>
                <?php endif; ?>

                <?php if ( $twitter = get_option( 'siglo21_option_generales_twitter' ) ) : ?>
                    <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer" class="btn rounded icon"><i class="fa fa-twitter"></i> Seguinos en Twitter</a>
                <?php endif; ?>

                <?php if ( $youtube = get_option( 'siglo21_option_generales_youtube' ) ) : ?>
                    <a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" class="btn rounded icon"><i class="fa fa-youtube"></i> Suscribite en YouTube</a>
                <?php endif; ?>

                <?php if ( $twitch = get_option( 'siglo21_option_generales_twitch' ) ) : ?>
                    <a href="<?php echo esc_url( $twitch ); ?>" target="_blank" rel="noopener noreferrer" class="btn rounded icon"><i class="fa fa-twitch"></i> Seguinos en Twitch</a>
                <?php endif; ?>

                <?php if ( $spotify = get_option( 'siglo21_option_generales_spotify' ) ) : ?>
                    <a href="<?php echo esc_url( $spotify ); ?>" target="_blank" rel="noopener noreferrer" class="btn rounded icon"><i class="fa fa-spotify"></i> Escuchanos en Spotify</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<!-- NOTICIAS -->
<div class="section blog list-posts" id="anchor07">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="voffset70"></div>
                <div class="separator-icon">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <div class="voffset30"></div>
                <p class="pretitle">informate aquí</p>
                <div class="voffset20"></div>
                <h2 class="title">Noticias</h2>
                <div class="voffset80"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <?php
                $noticias = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ) );
                ?>

                <?php if ( $noticias->have_posts() ) : ?>

                    <?php while ( $noticias->have_posts() ) : $noticias->the_post(); ?>

                    <article class="post-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="photo-post" style="background-image: url('<?php the_post_thumbnail_url( 'listados-thumbnail' ); ?>')"></div>
                                <?php endif; ?>
                                <p class="date">
                                    <span class="day"><?php the_time( 'd' ); ?></span>
                                    <span class="month"><?php the_time( 'M' ); ?></span>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div class="voffset30"></div>
                                <h4 class="title small"><span>Publicado por:</span> <?php the_author(); ?><?php $categoria = get_the_category(); if ( ! empty( $categoria ) ) : ?> | <?php echo esc_html( $categoria[0]->name ); ?><?php endif; ?></h4>
                                <h3 class="title post"><?php the_title(); ?></h3>
                                <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn rounded">Leer más</a>
                            </div>
                        </div>
                    </article>

                    <?php endwhile;
                    wp_reset_postdata(); ?>

                <?php else : ?>

                <p class="text-center">Todavía no hay noticias publicadas.</p>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<!-- CONTACTS -->
<section class="section inverse-color contact" id="anchor08">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="voffset70"></div>
                <div class="separator-icon">
                    <i class="fa fa fa-microphone"></i>
                </div>
                <div class="voffset30"></div>
                <p class="pretitle">ponete en contacto</p>
                <div class="voffset20"></div>
                <h2 class="title">Escribinos</h2>
                <div class="voffset80"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-7">
                <form action="mail.php" method="post" id="contactform" class="contact-form">
                    <div class="form-group">
                        <label class="title small" for="name">Tu nombre:</label>
                        <input type="text" placeholder="Nombre completo" name="name" id="name" class="text name required">
                    </div>

                    <div class="form-group">
                        <label class="title small" for="email">Tu email:</label>
                        <input type="email" placeholder="Tu email" name="email" id="email" class="text email required">
                    </div>

                    <div class="form-group">
                        <label class="title small" for="message">Tu mensaje:</label>
                        <textarea name="message" class="text area required" id="message" placeholder="Escribí tu mensaje"></textarea>
                    </div>

                    <!-- <div class="formSent"><p><strong>Your Message Has Been Sent!</strong> Thank you for contacting us.</p></div> -->
                    <input type="submit" value="Enviar" class="btn rounded">
                    <div class="voffset80"></div>
                </form>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="col-contact">
                    <h4 class="title small"><?php bloginfo( 'name' ); ?></h4>
                    <div class="voffset20"></div>

                    <?php if ( $direccion = get_option( 'siglo21_option_generales_direccion' ) ) : ?>
                        <p><?php echo esc_html( $direccion ); ?></p>
                    <?php endif; ?>

                    <ul class="contact">
                        <?php if ( $tel_celular = get_option( 'siglo21_option_generales_telefono_celular' ) ) : ?>
                            <li><i class="fa fa-whatsapp"></i> <?php echo esc_html( $tel_celular ); ?></li>
                        <?php endif; ?>
                        <?php if ( $tel_fijo = get_option( 'siglo21_option_generales_telefono_fijo' ) ) : ?>
                            <li><i class="fa fa-phone"></i> <?php echo esc_html( $tel_fijo ); ?></li>
                        <?php endif; ?>
                        <?php if ( $email = get_option( 'siglo21_option_generales_email' ) ) : ?>
                            <li><i class="fa fa-envelope"></i> <?php echo esc_html( $email ); ?></li>
                        <?php endif; ?>
                    </ul>

                    <h4 class="title small">Seguinos en las redes</h4>
                    <ul class="social-links">
                        <?php if ( $facebook = get_option( 'siglo21_option_generales_facebook' ) ) : ?>
                            <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if ( $twitter = get_option( 'siglo21_option_generales_twitter' ) ) : ?>
                            <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if ( $instagram = get_option( 'siglo21_option_generales_instagram' ) ) : ?>
                            <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if ( $youtube = get_option( 'siglo21_option_generales_youtube' ) ) : ?>
                            <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube"></i></a></li>
                        <?php endif; ?>
                        <?php if ( $twitch = get_option( 'siglo21_option_generales_twitch' ) ) : ?>
                            <li><a href="<?php echo esc_url( $twitch ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitch"></i></a></li>
                        <?php endif; ?>
                        <?php if ( $spotify = get_option( 'siglo21_option_generales_spotify' ) ) : ?>
                            <li><a href="<?php echo esc_url( $spotify ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-spotify"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$sorteo = new WP_Query( array(
    'post_type'      => 'sorteo',
    'posts_per_page' => 1,
) );
?>

<?php while ( $sorteo->have_posts() ) : $sorteo->the_post(); ?>

    <?php if ( get_field( 'activo' ) ) : ?>

        <?php get_template_part( 'modal-sorteos' ); ?>

    <?php endif; ?>

<?php endwhile;
wp_reset_postdata(); ?>

<?php get_footer(); ?>