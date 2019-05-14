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
 * Make sure the submitted terms exist.
 */
class TermExists extends AbstractValidator {

	/**
	 * Make sure the submitted terms exist.
	 *
	 * @param mixed $input the value to validate.
	 * @return mixed
	 */
	public function evaluate( $input = null ) {

		$taxonomy = isset( $this->getArgs()['taxonomy'] ) ? $this->getArgs()['taxonomy'] : false;

		if ( null !== $input ) {
			$this->input = $input;
		}

		if ( null === $this->message ) {
			$this->message = esc_html__( 'Submitted term is invalid.' );
		}

		if ( is_array( $this->getInput() ) ) {
			foreach ( $this->getInput() as $value ) {
				return term_exists( absint( $value ), $taxonomy );
			}
		}

		return term_exists( absint( $this->input ), $taxonomy );
	}

}
