<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "user_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('user_company_id', 'user_email', 'user_password', 'user_fullname', 'user_label', 'user_phone', 'user_status', 'user_block_note');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('user_password');
	
	public function __construct()
	{
		static::$rules = array(
		   'user_company_id' => 'required|integer',
		   'user_email' => 'required|email',
		   'user_password' => 'required|min:6',
		   'user_fullname' => 'required|between:3,50',
		   'user_label' => 'between:2,15',
		   'user_phone' => 'between:7,15',
		   'user_status' => 'integer',
		   'user_block_note' => 'between:5,1000',
	   );
	}
	
	public function company()
    {
        return $this->belongsTo('Company', 'user_company_id', 'company_id');
    }
	
    public function is_valid()
	{  	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
