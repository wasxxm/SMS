<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class DepartmentPermission extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "department_permission_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('department_id', 'department_permission_set_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'department_permissions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'department_id' 		=> 'required|integer',
		   'department_permission_set_id'	=> 'required|integer|unique_with:department_permissions,department_id',
	   );
	}
	
	public function department()
	{
	    return $this->belongsTo('Department');	
	}
	
	public function permissionset()
	{
	    return $this->belongsTo('PermissionSet', 'department_permission_set_id', 'permission_set_id');	
	}
	
    public function is_valid()
	{  	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
