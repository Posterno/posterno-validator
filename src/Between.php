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
 * Make sure the submitted value is between the specified amount.
 */
class Between extends AbstractValidator {

	/**
	 * Make sure the submitted value is between the specified amount.
	 *
	 * @param mixed $input the value to validate.
	 * @return mixed
	 */
	public function evaluate( $input = null ) {

		if ( ! is_array( $this->value ) ) {
			throw new Exception( 'The value must be an array.' );
		} elseif ( count( $this->value ) !== 2 ) {
			throw new Exception( 'The value must be an array that contains 2 values.' );
		}

		if ( null !== $input ) {
			$this->input = $input;
		}

		if ( null === $this->message ) {
			$this->message = sprintf( esc_html__( 'The value must be between %1$s and %2$s.' ), absint( $this->value[0] ), absint( $this->value[1] ) );
		}

		var_dump( $this->value[1] );

		return ( ( $this->input > $this->value[0] ) && ( $this->input < $this->value[1] ) );
	}

}
