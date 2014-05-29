<?php

/**
 * This file is part of the AntispamControl package
 *
 * Copyright (c) 2013 Petr Kessler (http://kesspess.1991.cz)
 *
 * @license  MIT
 * @link     https://github.com/uestla/AntispamControl
 */

use Nette\Forms\Form;
use Nette\Utils\Callback;
use Nette\Forms\Controls\TextInput;


class AntispamControl extends TextInput
{

	/**
	 * @param  string $label
	 * @param  int $maxLength
	 * @param  string $errorMsg
	 */
	function __construct($label = NULL, $maxLength = NULL, $errorMsg = NULL)
	{
		parent::__construct($label, $maxLength);

		$this->setDefaultValue('@');
		$this->addRule(Form::BLANK, $errorMsg);
	}


	/**
	 * @param  string $method
	 * @return void
	 */
	static function register($method = 'addAntispam')
	{
		Form::extensionMethod($method, Callback::closure(__CLASS__ . '::addAntispam'));
	}


	/**
	 * @param  Form $form
	 * @param  string $name
	 * @param  string $label
	 * @param  string $errorMsg
	 * @return AntispamControl
	 */
	static function addAntispam(Form $form, $name = 'antispam', $label = 'Leave the following field blank', $errorMsg = 'Spam detected.')
	{
		return $form[$name] = new static($label, NULL, NULL, $errorMsg);
	}


	/**
	 * @param  string $value
	 * @return string
	 */
	function sanitize($value)
	{
		return $value;
	}

}
