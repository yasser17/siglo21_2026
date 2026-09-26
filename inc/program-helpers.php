<?php
/**
 * Helpers para el popup de detalle de programa (front-page.php, #anchor01).
 */

/**
 * Convierte el campo ACF "dias" (nombres en inglés) en texto en español.
 *
 * Días consecutivos se muestran como rango ("Lunes a viernes"), un solo día
 * con su nombre completo ("Sábado") y el resto como lista corta
 * ("Lun, Mié y Vie").
 *
 * @param array $dias Nombres de días en inglés, ej. array( 'Monday', 'Friday' ).
 * @return string Texto listo para mostrar, o '' si no hay días válidos.
 */
function siglo21_format_program_days( $dias ) {
	// Nombre completo, abreviatura y minúscula (para el final de un rango).
	$semana = array(
		'Monday'    => array( 'Lunes', 'Lun', 'lunes' ),
		'Tuesday'   => array( 'Martes', 'Mar', 'martes' ),
		'Wednesday' => array( 'Miércoles', 'Mié', 'miércoles' ),
		'Thursday'  => array( 'Jueves', 'Jue', 'jueves' ),
		'Friday'    => array( 'Viernes', 'Vie', 'viernes' ),
		'Saturday'  => array( 'Sábado', 'Sáb', 'sábado' ),
		'Sunday'    => array( 'Domingo', 'Dom', 'domingo' ),
	);
	$orden = array_keys( $semana );

	$indices = array();
	foreach ( siglo21_normalize_program_days( $dias ) as $dia ) {
		$i = array_search( $dia, $orden, true );
		if ( false !== $i ) {
			$indices[] = $i;
		}
	}
	$indices = array_values( array_unique( $indices ) );
	sort( $indices );

	$total = count( $indices );
	if ( 0 === $total ) {
		return '';
	}
	if ( 1 === $total ) {
		return $semana[ $orden[ $indices[0] ] ][0];
	}
	if ( 7 === $total ) {
		return 'Todos los días';
	}

	$consecutivos = ( $indices[ $total - 1 ] - $indices[0] ) === ( $total - 1 );
	if ( $consecutivos && $total > 2 ) {
		$desde = $semana[ $orden[ $indices[0] ] ][0];
		$hasta = $semana[ $orden[ $indices[ $total - 1 ] ] ][2];
		return $desde . ' a ' . $hasta;
	}

	$cortos = array();
	foreach ( $indices as $i ) {
		$cortos[] = $semana[ $orden[ $i ] ][1];
	}
	$ultimo = array_pop( $cortos );
	return implode( ', ', $cortos ) . ' y ' . $ultimo;
}

/**
 * Normaliza el campo ACF "dias" a una lista de nombres en inglés.
 *
 * Tolera un valor suelto (select simple) y el formato "value/label" de ACF.
 *
 * @param mixed $dias Valor crudo del campo.
 * @return array Nombres de días, ej. array( 'Monday', 'Friday' ).
 */
function siglo21_normalize_program_days( $dias ) {
	$lista = array();
	foreach ( (array) $dias as $dia ) {
		if ( is_array( $dia ) && isset( $dia['value'] ) ) {
			$dia = $dia['value'];
		}
		if ( is_string( $dia ) && '' !== $dia ) {
			$lista[] = $dia;
		}
	}
	return $lista;
}

/**
 * Arma el link de WhatsApp (wa.me) a partir del celular cargado en ACF.
 *
 * Números locales ("095 574 700") pierden el 0 inicial y reciben el prefijo
 * de Uruguay (598). Números internacionales ("+54 9 11…" o "00598…") se
 * respetan tal cual, sin el "+" ni el "00".
 *
 * @param string $celular Número tal como está cargado en el campo.
 * @return string URL de wa.me, o '' si no parece un número válido.
 */
function siglo21_whatsapp_url( $celular ) {
	$celular = trim( (string) $celular );
	$digitos = preg_replace( '/\D+/', '', $celular );

	if ( 0 === strpos( $celular, '+' ) ) {
		$internacional = true;
	} elseif ( 0 === strpos( $digitos, '00' ) ) {
		$internacional = true;
		$digitos       = substr( $digitos, 2 );
	} else {
		$internacional = 0 === strpos( $digitos, '598' );
	}

	if ( ! $internacional ) {
		$digitos = '598' . ltrim( $digitos, '0' );
	}

	// 598 + 8 dígitos es el mínimo de un celular uruguayo.
	if ( strlen( ltrim( $digitos, '0' ) ) < 11 ) {
		return '';
	}

	return 'https://wa.me/' . $digitos;
}

/**
 * Sanitiza el código de streaming embebido del programa.
 *
 * Permite iframes (reproductores externos) y deja el src en data-src: el
 * popup lo carga recién al abrirse y lo descarga al cerrarse, así los
 * reproductores de todos los programas no arrancan al cargar la portada.
 *
 * @param string $codigo HTML cargado en el campo.
 * @return string HTML seguro, o '' si no queda nada visible.
 */
function siglo21_program_embed( $codigo ) {
	$codigo = preg_replace( '#<(script|style)\b[^>]*>.*?</\1>#is', '', (string) $codigo );
	$codigo = wp_kses( $codigo, array_merge( wp_kses_allowed_html( 'post' ), array(
		'iframe' => array( 'src' => true, 'width' => true, 'height' => true, 'frameborder' => true, 'allow' => true, 'allowfullscreen' => true, 'title' => true ),
	) ) );
	$codigo = trim( $codigo );
	if ( '' === $codigo ) {
		return '';
	}
	return preg_replace( '#(<iframe\b[^>]*?)\ssrc=#i', '$1 data-src=', $codigo );
}
