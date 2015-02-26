<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Setting extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	public $timestamps = false;
	
	public static $rules = array();
	
	protected $fillable = array();

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array();
	public static function get($key)
	{
		return Setting::where('setting_key', '=', $key)->pluck('setting_value');	
	}

}
