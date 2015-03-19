<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserDepartment extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "user_department_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('user_id', 'department_id', 'company_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_departments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'user_id' 		=> 'required|integer',
		   'company_id'		=> 'required|integer',
		   'department_id'	=> 'required|integer|unique_with:user_departments,user_id,company_id',
	   );
	}
	
	public function department()
	{
	    return $this->belongsTo('Department');	
	}
	
    public function is_valid()
	{  	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
