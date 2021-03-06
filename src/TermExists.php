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
			$this->message = esc_html__( 'Submitted term is invalid.', 'posterno' );
		}

		$is_multiple = isset( $this->getArgs()['multiple'] ) && $this->getArgs()['multiple'] === true;

		if ( $is_multiple ) {
			$terms_array = is_array( $this->getInput() ) ? $this->getInput() : json_decode( $this->input );
		}

		if ( empty( $terms_array ) ) {
			return true;
		}

		if ( is_array( $terms_array ) ) {
			foreach ( $terms_array as $value ) {
				return term_exists( absint( $value ), $taxonomy );
			}
		}

		return term_exists( absint( $this->input ), $taxonomy );
	}

}
