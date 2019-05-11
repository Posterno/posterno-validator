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
 * Validator interface.
 */
interface ValidatorInterface {

	public function getValue();

	public function getMessage();

	public function getInput();

	public function getArgs();

	public function setValue( $value );

	public function setMessage( $msg = null );

	public function setInput( $input = null );

	public function setArgs( $args = [] );

	public function evaluate( $input = null );

}
