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
	 * Get things started.
	 *
	 * @param mixed  $value the validator value.
	 * @param string $message the validation message.
	 */
	public function __construct( $value = null, $message = null ) {
		$this->setValue( $value );
		if ( null !== $message ) {
			$this->setMessage( $message );
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
	 * Run the validation for the the input.
	 *
	 * @param mixed $input the input to validate.
	 * @return void
	 */
	abstract public function evaluate( $input = null );

}
