<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => array(
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	),
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
		'company_name' => array(
        				'required' => 'The company name is required.',
						'between' => 'The company name must be between :min and :max characters.',
						'alphaNum' => 'The company name may only contain letters and numbers.',
        ),
		'company_reg_no' => array(
        				'required' => 'The company registration number is required.',
						'between' => 'The company registration number must be between :min and :max characters.',
						'alphaNum' => ' The company registration number may only contain letters and numbers.',
        ),
		'company_currency_code' => array(
						'required' => 'The company currency code is required.',
						'alpha' => 'The company currency code may only contain letters.',
						'between' => 'The company currency code must be between :min and :max characters.'
		),
		'company_users_limit' => array(
						'required' => 'The company users limit is required.',
						'integer' => 'The company users limit must be an integer.'
		),
		'company_country' => array(
						'alpha' => 'The company country may only contain letters.',
						'between' => 'The company country must be between :min and :max characters.'
		),
		'company_city' => array(
						'alpha' => 'The company city may only contain letters.',
						'between' => 'The company city must be between :min and :max characters.'
		),
		'company_state' => array(
						'alpha' => 'The company state may only contain letters.',
						'between' => 'The company state must be between :min and :max characters.'
		),
	   'company_address' => array(
						'between' => 'The company address must be between :min and :max characters.'
		),
	   'company_phone' => array(
						'between' => 'The company phone must be between :min and :max characters.'
		),
	    'company_website' => array(
						'url' => 'The company website URL format is invalid.'
		),
		'company_email' => array(
						'email' => 'The company email must be a valid email address.'
		),
	    'company_ntn' => array(
						'between' => 'The company NTN must be between :min and :max characters.'
		),
	    'company_vat' => array(
						'between' => 'The company VAT must be between :min and :max characters.'
		),
	    'company_logo_uri' => array(
						'image' => 'The company logo must be an image.',
						'mimes' => 'The company logo must be a file of type: jpg, gif, png.',
						'max' => 'The company logo may not be greater than :max kilobytes.'
		),
		'user_company_id'  => array(
						'required' => 'The user must be assigned a company'
		),
		'user_email'  => array(
						'required'	=> 'The user email is required.',
						'email'		=> 'The user must have a valid email address.'
		),
		'user_password'  => array(
						'required'	=> 'The user password is required.',
						'min'		=> 'The user password must be at least :min characters.'
		),
	    'user_fullname'  => array(
						'required'	=> 'The user fullname is required.',
						'between'	=> 'The user fullname must be between :min and :max characters.'
		),
	    'user_phone'  => array(
						'between'	=> 'The user phone must be between :min and :max characters.'
		),
		'user_label'  => array(
						'between'	=> 'The user title must be between :min and :max characters.'
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
