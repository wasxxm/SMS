<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class PermissionSet extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "permission_set_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('permission_ids', 'permission_set_name', 'permission_set_desc');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permission_sets';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'permission_ids' => 'required',
		   'permission_set_desc' => 'between:10,1000',
	   );
	}
	
    public function is_valid()
	{  	   
	   static::$rules['permission_set_name'] = 'required|min:3|unique_with:permission_sets,company_id,'.$this->permission_set_id.'=permission_set_id';
	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
