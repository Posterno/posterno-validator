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
 * Make sure the input equals to the specified value.
 */
class Equal extends AbstractValidator {

	/**
	 * Make sure the input equals to the specified value.
	 *
	 * @param mixed $input the value to validate.
	 * @return mixed
	 */
	public function evaluate( $input = null ) {
		if ( null !== $input ) {
			$this->input = $input;
		}

		if ( null === $this->message ) {
			$this->message = 'The value must be equal to ' . $this->value . '.';
		}

		return ( $this->input === $this->value );
	}

}
