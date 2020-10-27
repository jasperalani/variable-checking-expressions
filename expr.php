<?php

function check_against( $variable, $checks, $argument = null) {
	if ( sizeof( $checks ) === 0 ) {
		trigger_error( 'check_against(): at least one check must be supplied' );
	}

	$results = [];

	foreach ( $checks as $key => $check ) {
		switch ( $check ) {
			case 'isset':
				$results[ $check ] = isset( $variable );
				break;

			case 'empty':
				$results[$check] = empty($variable);
				break;

			case 'notempty':
				$results[$check] = !empty($variable);
				break;

			case 'bool':
			case 'boolean':
				$results[ $check ] = is_bool( $variable );
				break;

			case 'string':
				$results[ $check ] = is_string( $variable );
				break;

			case 'int':
				$results[ $check ] = is_integer( $variable );
				break;

			case 'array':
				$results[ $check ] = is_array( $variable );
				break;

			case 'instanceof':
				if(null === $argument){
					trigger_error("check_against(): A class name must be supplied in as the third argument.");
				}
				if ( class_exists( $argument ) ) {
					$results[ $check ] = is_a( $variable, $argument );
				} else {
					trigger_error( "check_against(): specified class doesnt exist." );
				}
				break;

			case 'countable':
				$results[$check] = is_countable($variable);
				break;

			case 'iterable':
				$results[$check] = is_iterable($variable);
				 break;

			case 'writable':
			case 'writeable':
				$results[$check] = is_writeable($variable);
				break;

			case 'callable':
				$results[$check] = is_callable($variable);
				break;

			case 'double':
				$results[$check] = is_double($variable);
				break;

			case 'float':
				$results[$check] = is_float($variable);
				break;

			case 'long':
				$results[$check] = is_long($variable);
				break;

			case 'null':
				$results[$check] = is_null($variable);
				break;

			case 'numeric':
				$results[$check] = is_numeric($variable);
				break;

			case 'object':
				$results[$check] = is_object($variable);
				break;

			case 'executable':
				$results[$check] = is_executable($variable);
				break;

			default:
				echo "unknown check found: $check";
				break;
		}
	}

	$impression = true;

	foreach($results as $result){
		if(!$result){
			$impression = false;
		}
	}

	return $impression;
}

class MyClass {}
$instance = new MyClass();
var_dump(check_against($instance, ['notempty', 'instanceof'], 'MyClass'));