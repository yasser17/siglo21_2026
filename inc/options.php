<?php

function siglo21_options() {
    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
    add_menu_page('Ajustes generales', 'Opciones', 'administrator', 'crandon-options-generales', 'siglo21_options_generales', 'dashicons-admin-generic', 9);
}

function siglo21_settings() {
    // siglo21_options_group_generales
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_direccion');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_telefono_celular');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_telefono_fijo');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_email');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_facebook');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_twitter');    
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_instagram');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_youtube');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_twitch');
    register_setting('siglo21_options_group_generales', 'siglo21_option_generales_spotify');
}

if (is_admin()) {
    add_action('admin_menu', 'siglo21_options');
    add_action('admin_init', 'siglo21_settings');
}

function siglo21_options_generales() { ?>
    <div class="wrap">
        <h1>Ajustes generales</h1>
        
        <?php settings_errors(); ?>
        
        <form method="post" action="options.php">
        
        <?php settings_fields( 'siglo21_options_group_generales' ); ?>
        <?php do_settings_sections( 'siglo21_options_generales' ); ?>
            
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Dirección:</th>
                    <td>
                        <p class="description">Calle y número</p>                   
                        <input type="text" name="siglo21_option_generales_direccion" value="<?php echo esc_attr( get_option('siglo21_option_generales_direccion') ); ?>" />
                    </td>                
                </tr>

                <tr valign="top">
                    <th scope="row">Teléfonos:</th>
                    <td>
                        <p class="description">Celular (WhatsApp)</p>   
                        <input type="tel" name="siglo21_option_generales_telefono_celular" value="<?php echo esc_attr( get_option('siglo21_option_generales_telefono_celular') ); ?>" />
                        <p class="description">Fijo</p>   
                        <input type="tel" name="siglo21_option_generales_telefono_fijo" value="<?php echo esc_attr( get_option('siglo21_option_generales_telefono_fijo') ); ?>" />
                    </td>                
                </tr>

                <tr valign="top">
                    <th scope="row">E-mail:</th>
                    <td>
                        <input type="email" name="siglo21_option_generales_email" value="<?php echo esc_attr( get_option('siglo21_option_generales_email') ); ?>" />
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Redes Sociales:</th>
                    <td>
                        <p class="description">Facebook</p>   
                        <input type="text" name="siglo21_option_generales_facebook" value="<?php echo esc_attr( get_option('siglo21_option_generales_facebook') ); ?>" />
                        <p class="description">Twitter</p>   
                        <input type="text" name="siglo21_option_generales_twitter" value="<?php echo esc_attr( get_option('siglo21_option_generales_twitter') ); ?>" />
                        <p class="description">Instagram</p>
                        <input type="text" name="siglo21_option_generales_instagram" value="<?php echo esc_attr( get_option('siglo21_option_generales_instagram') ); ?>" />
                        <p class="description">YouTube</p>
                        <input type="text" name="siglo21_option_generales_youtube" value="<?php echo esc_attr( get_option('siglo21_option_generales_youtube') ); ?>" />
                        <p class="description">Twitch</p>
                        <input type="text" name="siglo21_option_generales_twitch" value="<?php echo esc_attr( get_option('siglo21_option_generales_twitch') ); ?>" />
                        <p class="description">Spotify</p>
                        <input type="text" name="siglo21_option_generales_spotify" value="<?php echo esc_attr( get_option('siglo21_option_generales_spotify') ); ?>" />
                    </td>
                </tr>

            </table>
        
        <?php submit_button(); ?>
    
        </form>
    </div>

<?php }