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
 * Regex validation class.
 */
class RegEx extends AbstractValidator {

	/**
	 * Method to evaluate the validator.
	 *
	 * @param  mixed $input the input to validate.
	 * @return boolean
	 */
	public function evaluate( $input = null ) {
		if ( null !== $input ) {
			$this->input = $input;
		}
		if ( null === $this->message ) {
			$this->message = esc_html__( 'The format is not correct.' );
		}
		return (bool) ( preg_match( $this->value, $this->input ) );
	}
}
