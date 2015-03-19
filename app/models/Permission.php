<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Permission extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	public $timestamps = false;
	
	public static $rules = array();
	
	protected $fillable = array();
	
	protected $primaryKey = "permission_id";

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permissions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array();
	public static function get($id)
	{
		if (!Permission::find($id)->super_user)
		   return Permission::find($id)->permission_name;
		
		return false;	
	}
	
	public static function get_by_name($name)
	{	
		$p = Permission::where('permission_name', $name)->where('super_user', 0)->first()->permission_id;
	}
	
	public static function get_ids($permission_names)
	{
	   	$permission_names = explode(',', $permission_names);
		
		$permission_ids = '';
		$n = 1;
		
		foreach($permission_names as $permission_name)
		{
		   if (trim($permission_name) != '')
		   {
			   $permission_ids .= trim(Permission::get_by_name($permission_name));     
		   }
		   
		   if ($n < count($permission_names))
		      $permission_ids .= ', ';
		}
		
		return $permission_ids;
	}
	
	public static function get_array($ids)
	{
		$ids = explode(',', $ids);
		
		$permissions = array();
		
		foreach($ids as $id)
		{
		   if (trim($id) != '')
		   {
			   $permissions[] = Permission::get($id);
		   }
		}
		
		return $permissions;
	}
	
	public static function get_str($ids)
	{
	   $permissions = '';
	   
	   $n = 1;
	   
	   foreach ($permissions_arr = Permission::get_array($ids) as $permission)
	   {
		   $permissions .= $permission;
		   
		   if ($n < count($permissions_arr))
		   {
		      $permissions .= ', ';
		   }
			  
		   $n++;  
	   }
	   
	   return $permissions;
	}
	
	public static function get_str_formatted($ids)
	{
	   $permissions = '';
	   
	   $n = 1;
	   
	   foreach ($permissions_arr = Permission::get_array($ids) as $permission)
	   {
		   $permissions .= '<span class="btn default blue-stripe" style="margin-top:8px">' . $permission . '</span>';
		   
		   if ($n < count($permissions_arr))
		   {
		      $permissions .= ' ';
		   }
			  
		   $n++;  
	   }
	   
	   return $permissions;
	}
}
