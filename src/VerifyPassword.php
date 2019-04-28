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
 * Make sure the password belongs to the currently logged in user.
 */
class VerifyPassword extends AbstractValidator {

	/**
	 * Make sure the password belongs to the currently logged in user.
	 *
	 * @param mixed $input the value to validate.
	 * @return mixed
	 */
	public function evaluate( $input = null ) {
		if ( null !== $input ) {
			$this->input = $input;
		}

		if ( null === $this->message ) {
			$this->message = esc_html__( 'The password you entered is incorrect.' );
		}

		$user = wp_get_current_user();

		return $user instanceof \WP_User && wp_check_password( $this->input, $user->data->user_pass, $user->ID ) && is_user_logged_in();
	}

}
