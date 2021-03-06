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
 * Make sure the input is a numeric value.
 */
class Numeric extends AbstractValidator {

	/**
	 * Make sure the input is a numeric value.
	 *
	 * @param mixed $input the value to validate.
	 * @return mixed
	 */
	public function evaluate( $input = null ) {

		if ( null !== $input ) {
			$this->input = $input;
		}

		if ( empty( $this->input ) ) {
			return true;
		}

		if ( null === $this->message ) {
			$this->message = esc_html__( 'Value must be numeric.', 'posterno' );
		}

		return ( is_numeric( $this->input ) );
	}

}
