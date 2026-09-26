<?php
/**
 * Tests de los helpers del popup de programa (inc/program-helpers.php).
 *
 * Uso:
 *   php tests/program-helpers-test.php                  (días y WhatsApp)
 *   lando wp eval-file wp-content/themes/siglo21_2026/tests/program-helpers-test.php
 *                                                       (además, embed: necesita WordPress)
 */

if ( 'cli' !== PHP_SAPI ) {
	exit;
}

require_once __DIR__ . '/../inc/program-helpers.php';

$fallas = 0;

function siglo21_check( $etiqueta, $obtenido, $esperado ) {
	global $fallas;
	$ok = $obtenido === $esperado;
	if ( ! $ok ) {
		$fallas++;
	}
	echo ( $ok ? 'PASS' : 'FAIL' ) . " $etiqueta => " . var_export( $obtenido, true ) . ( $ok ? '' : ' (esperado ' . var_export( $esperado, true ) . ')' ) . "\n";
}

// Días.
siglo21_check( 'días lunes a viernes', siglo21_format_program_days( array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ) ), 'Lunes a viernes' );
siglo21_check( 'días lunes a sábado', siglo21_format_program_days( array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ) ), 'Lunes a sábado' );
siglo21_check( 'días salteados y desordenados', siglo21_format_program_days( array( 'Friday', 'Monday', 'Wednesday', 'Monday' ) ), 'Lun, Mié y Vie' );
siglo21_check( 'dos días seguidos', siglo21_format_program_days( array( 'Monday', 'Tuesday' ) ), 'Lun y Mar' );
siglo21_check( 'un solo día', siglo21_format_program_days( array( 'Saturday' ) ), 'Sábado' );
siglo21_check( 'todos los días', siglo21_format_program_days( array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ) ), 'Todos los días' );
siglo21_check( 'días vacío', siglo21_format_program_days( array() ), '' );
siglo21_check( 'días null', siglo21_format_program_days( null ), '' );
siglo21_check( 'días valor suelto', siglo21_format_program_days( 'Sunday' ), 'Domingo' );
siglo21_check( 'días formato value/label', siglo21_format_program_days( array( array( 'value' => 'Monday', 'label' => 'Lunes' ), array( 'value' => 'Friday', 'label' => 'Viernes' ) ) ), 'Lun y Vie' );

// WhatsApp.
siglo21_check( 'wa local', siglo21_whatsapp_url( '099732065' ), 'https://wa.me/59899732065' );
siglo21_check( 'wa local con espacios', siglo21_whatsapp_url( '095 574 700' ), 'https://wa.me/59895574700' );
siglo21_check( 'wa +598', siglo21_whatsapp_url( '+59895574700' ), 'https://wa.me/59895574700' );
siglo21_check( 'wa 598 sin +', siglo21_whatsapp_url( '59895574700' ), 'https://wa.me/59895574700' );
siglo21_check( 'wa 00598', siglo21_whatsapp_url( '00598 95 574 700' ), 'https://wa.me/59895574700' );
siglo21_check( 'wa extranjero +54', siglo21_whatsapp_url( '+54 9 11 2345 6789' ), 'https://wa.me/5491123456789' );
siglo21_check( 'wa vacío', siglo21_whatsapp_url( '' ), '' );
siglo21_check( 'wa sin dígitos', siglo21_whatsapp_url( '-- ' ), '' );
siglo21_check( 'wa demasiado corto', siglo21_whatsapp_url( '0000' ), '' );
siglo21_check( 'wa null', siglo21_whatsapp_url( null ), '' );

// Embed (solo con WordPress cargado).
if ( function_exists( 'wp_kses' ) ) {
	$iframe = siglo21_program_embed( '<iframe src="https://player.example.com/live" width="560" height="315"></iframe>' );
	siglo21_check( 'embed iframe sobrevive con data-src', false !== strpos( $iframe, '<iframe' ) && false !== strpos( $iframe, 'data-src="https://player.example.com/live"' ) && false === strpos( $iframe, ' src=' ), true );
	siglo21_check( 'embed quita script y su contenido', siglo21_program_embed( '<script>alert(1)</script>' ), '' );
	siglo21_check( 'embed solo espacios', siglo21_program_embed( "  \n " ), '' );
} else {
	echo "SKIP embed (correr con lando wp eval-file)\n";
}

if ( $fallas ) {
	echo "$fallas test(s) fallaron\n";
	exit( 1 );
}
echo "OK\n";
