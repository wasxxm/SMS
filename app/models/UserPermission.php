<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserPermission extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "user_permission_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('user_id', 'user_permission_set_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_permissions';

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
		   'user_permission_set_id'	=> 'required|integer|unique_with:user_permissions,user_id',
	   );
	}
	
	public function user()
	{
	    return $this->belongsTo('User');	
	}
	
	public function permissionset()
	{
	    return $this->belongsTo('PermissionSet', 'user_permission_set_id', 'permission_set_id');	
	}
	
    public function is_valid()
	{  	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
