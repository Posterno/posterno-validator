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
 * Alpha validation rules.
 */
class Alpha extends AbstractValidator {

	/**
	 * Verify the value contains only alphabetical characters.
	 *
	 * @param string $input the string to validate.
	 * @return boolean
	 */
	public function evaluate( $input = null ) {
		if ( null !== $input ) {
			$this->input = $input;
		}

		if ( null === $this->message ) {
			$this->message = sprintf( esc_html__( 'The value must only contain characters of the alphabet %s.', 'posterno' ), $this->value );
		}

		return (bool) ( preg_match( '/^[a-zA-Z]+$/', $this->input ) );
	}

}
