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
 * Make sure the input length is between the 2 specified values.
 */
class LengthBetween extends AbstractValidator {

	/**
	 * Make sure the input length is between the 2 specified values.
	 *
	 * @param mixed $input the value to validate.
	 * @throws Exception When value is not properly configured.
	 * @return boolean
	 */
	public function evaluate( $input = null ) {
		if ( ! is_array( $this->value ) ) {
			throw new Exception( 'Value must be an array.' );
		} elseif ( count( $this->value ) != 2 ) {
			throw new Exception( 'Value must be an array that contains 2 values.' );
		}
		if ( null !== $input ) {
			$this->input = $input;
		}
		if ( null === $this->message ) {
			$this->message = 'Value length must be between ' . $this->value[0] . ' and ' . $this->value[1] . '.';
		}
		return ( ( strlen( $this->input ) > $this->value[0] ) && ( strlen( $this->input ) < $this->value[1] ) );
	}

}
