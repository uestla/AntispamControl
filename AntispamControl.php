<?php

use Nette\Forms\Form;
use Nette\Forms\Controls\TextInput;


class AntispamControl extends TextInput
{
	/** @return void */
	static function register()
	{
		Form::extensionMethod('addAntispam', callback(__CLASS__ . '::addAntispam'));
	}



	/**
	 * @param  Form
	 * @param  string
	 * @param  string
	 * @param  string
	 * @return AntispamControl
	 */
	static function addAntispam(Form $form, $name = 'antispam', $label = 'Vymažte obsah tohoto pole', $message = 'Byl detekován pokus o spam.')
	{
		return $form[$name] = new static($label, NULL, NULL, $message);
	}



	/**
	 * @param  string
	 * @param  int
	 * @param  int
	 * @param  string
	 */
	function __construct($label = NULL, $cols = NULL, $maxLength = NULL, $msg = NULL)
	{
		parent::__construct($label, $cols, $maxLength);
		$this->setDefaultValue('@');
		$this->addRule(Form::MAX_LENGTH, $msg, 0);
	}



	/**
	 * @param  string
	 * @return string
	 */
	function sanitize($value)
	{
		return $value;
	}
}
