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
 * Validator class
 */
abstract class AbstractValidator implements ValidatorInterface {

	/**
	 * Validator rules to test against.
	 *
	 * @var mixed
	 */
	protected $value = null;

	/**
	 * The value that needs to be tested.
	 *
	 * @var mixed
	 */
	protected $input = null;

	/**
	 * Validation message.
	 *
	 * @var string
	 */
	protected $message = null;

	/**
	 * Additional args to the send to the validator.
	 *
	 * @var array
	 */
	protected $args = [];

	/**
	 * Get things started.
	 *
	 * @param mixed  $value the validator value.
	 * @param string $message the validation message.
	 * @param array  $args additional args to send to the validation class.
	 */
	public function __construct( $value = null, $message = null, $args = [] ) {
		$this->setValue( $value );

		if ( null !== $message ) {
			$this->setMessage( $message );
		}

		if ( ! empty( $args ) ) {
			$this->setArgs( $args );
		}
	}

	/**
	 * Get the validator value.
	 *
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Get the validation message.
	 *
	 * @return mixed
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Get the input to test.
	 *
	 * @return mixed
	 */
	public function getInput() {
		return $this->input;
	}

	/**
	 * Set the validation rule.
	 *
	 * @param  mixed $value the value to test.
	 * @return AbstractValidator
	 */
	public function setValue( $value ) {
		$this->value = $value;
		return $this;
	}

	/**
	 * Set the validation message.
	 *
	 * @param  string $message the message.
	 * @return AbstractValidator
	 */
	public function setMessage( $message = null ) {
		$this->message = $message;
		return $this;
	}

	/**
	 * Set the input to test.
	 *
	 * @param  mixed $input the input to validate.
	 * @return AbstractValidator
	 */
	public function setInput( $input = null ) {
		$this->input = $input;
		return $this;
	}

	/**
	 * Utility method to set args to the validator.
	 *
	 * @param array $args args to send to the validation class.
	 * @return void
	 */
	public function setArgs( $args = [] ) {
		$this->args = $args;
	}

	/**
	 * Get args assigned to the validator.
	 *
	 * @return array
	 */
	public function getArgs() {
		return (array) $this->args;
	}

	/**
	 * Run the validation for the the input.
	 *
	 * @param mixed $input the input to validate.
	 * @return void
	 */
	abstract public function evaluate( $input = null );

}
