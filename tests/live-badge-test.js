/**
 * Tests del badge "EN VIVO" del popup de programa.
 * Extrae las funciones puras de js/template-scripts/main.js (sin jQuery).
 *
 * Uso: node tests/live-badge-test.js
 */
const fs = require( 'fs' );
const path = require( 'path' );

const src = fs.readFileSync( path.join( __dirname, '../js/template-scripts/main.js' ), 'utf8' );
const inicio = src.indexOf( 'var semana' );
const fin = src.indexOf( "$( '.program-modal' )" );
if ( inicio < 0 || fin < 0 ) {
  console.error( 'FAIL no se encontraron las funciones del badge en main.js' );
  process.exit( 1 );
}
const { estaAlAire, aMinutos, ahoraEnMontevideo } =
  new Function( src.slice( inicio, fin ) + '; return { estaAlAire, aMinutos, ahoraEnMontevideo };' )();

let fallas = 0;
const check = ( etiqueta, obtenido, esperado ) => {
  const ok = obtenido === esperado;
  if ( !ok ) fallas++;
  console.log( ( ok ? 'PASS' : 'FAIL' ) + ' ' + etiqueta + ' => ' + obtenido );
};

// Mismo formato que produce front-page.php: implode( ',', $dias ).
const semanaLaboral = 'Monday,Tuesday,Wednesday,Thursday,Friday'.split( ',' );

check( 'al aire martes 20:10 (19 a 22)', estaAlAire( semanaLaboral, aMinutos( '19:00' ), aMinutos( '22:00' ), { dia: 2, minutos: 20 * 60 + 10 } ), true );
check( 'justo al empezar 19:00', estaAlAire( semanaLaboral, aMinutos( '19:00' ), aMinutos( '22:00' ), { dia: 2, minutos: 19 * 60 } ), true );
check( 'fin exclusivo 22:00', estaAlAire( semanaLaboral, aMinutos( '19:00' ), aMinutos( '22:00' ), { dia: 2, minutos: 22 * 60 } ), false );
check( 'domingo no sale', estaAlAire( semanaLaboral, aMinutos( '19:00' ), aMinutos( '22:00' ), { dia: 0, minutos: 20 * 60 } ), false );
check( 'medianoche: viernes 23:30 (22 a 01)', estaAlAire( [ 'Friday' ], aMinutos( '22:00' ), aMinutos( '01:00' ), { dia: 5, minutos: 23 * 60 + 30 } ), true );
check( 'medianoche: sábado 00:30 sigue el de viernes', estaAlAire( [ 'Friday' ], aMinutos( '22:00' ), aMinutos( '01:00' ), { dia: 6, minutos: 30 } ), true );
check( 'medianoche: viernes 00:30 (jueves no sale)', estaAlAire( [ 'Friday' ], aMinutos( '22:00' ), aMinutos( '01:00' ), { dia: 5, minutos: 30 } ), false );
check( 'hora inválida', estaAlAire( semanaLaboral, aMinutos( '' ), aMinutos( '22:00' ), { dia: 2, minutos: 600 } ), false );
check( 'sin reloj', estaAlAire( semanaLaboral, 60, 120, null ), false );
check( 'aMinutos 07:05', aMinutos( '07:05' ), 425 );
const ahora = ahoraEnMontevideo();
check( 'reloj de Montevideo válido', ahora !== null && ahora.dia >= 0 && ahora.minutos >= 0 && ahora.minutos < 1440, true );

if ( fallas ) {
  console.log( fallas + ' test(s) fallaron' );
  process.exit( 1 );
}
console.log( 'OK' );
