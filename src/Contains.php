<?php
/**
 * Posterno validator library.
 *
 * @package     posterno-validator
 * @copyright   Copyright (c) 2019, Pressmodo, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.1.0
 */

/**
 * @namespace
 */
namespace PNO\Validator;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Make sure the input contains the specified value.
 */
class Contains extends AbstractValidator {

	/**
	 * Make sure the input contains the specified value.
	 *
	 * @param string|array $input the value to validate.
	 * @return boolean
	 */
	public function evaluate( $input = null ) {
		if ( null !== $input ) {
			$this->input = $input;
		}
		if ( null === $this->message ) {
			$this->message = 'Input not found in the specified value.';
		}
		$result   = false;
		$needle   = $this->value;
		$haystack = $this->input;
		if ( is_string( $needle ) && is_string( $haystack ) ) {
			$result = ( strpos( $haystack, $needle ) !== false );
		} elseif ( ! is_array( $needle ) && is_array( $haystack ) ) {
			$result = in_array( $needle, $haystack );
		} elseif ( is_array( $needle ) && is_array( $haystack ) ) {
			$result = true;
			foreach ( $needle as $n ) {
				if ( ! in_array( $n, $haystack ) ) {
					$result = false;
					break;
				}
			}
		}
		return $result;
	}

}
