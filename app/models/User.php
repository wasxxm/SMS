<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Session\Store;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "user_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('email', 'password', 'user_fullname', 'user_label', 'user_phone', 'user_status', 'user_block_note', 'user_profile_pic_uri');

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
		   'password' => 'required|min:6',
		   'user_fullname' => 'required|between:3,50',
		   'user_label' => 'between:2,15',
		   'user_phone' => 'between:7,15',
		   'user_status' => 'integer',
		   'user_block_note' => 'between:5,1000',
		   'user_profile_pic_uri'	=> "image|mimes:jpeg,gif,png|max:". Setting::get('profile_pic_max_size')
	   );
	}
	
	public static function permissions()
	{
	   //if (!Auth::check()) return false;
	   
	   if ($user_permissions = Session::get('user_permissions'))
	      return $user_permissions;
	   
	   $permission_arr = array();
	   
	   // fetch the permissions directly assigned to this user
	   $user_permission_sets = DB::table('user_permissions')->where('user_id', '=', Auth::id())->get();
	   
	   foreach($user_permission_sets as $user_permission_set)
	   {
		    $user_permissions = DB::table('permission_sets')->where('permission_set_id', '=', $user_permission_set->user_permission_set_id)->pluck('permission_ids');  
			
			$user_permissions = explode(',', $user_permissions);
			
			foreach($user_permissions as $user_permission)
			{
			    $permission_name = DB::table('permissions')->where('permission_id', '=', $user_permission)->pluck('permission_name');
				if($permission_name && trim($permission_name) != '')
				{
				   $permission_arr[] = $permission_name;
				}
			}
	   }
	   
	   Session::put('user_permissions', $permission_arr); 
	   
	   return $permission_arr;	
	}
	
    public function departments()
    {
        return $this->belongsToMany('Department', 'user_departments');
    }
	
    public function is_valid()
	{  	   
	   static::$rules['email'] = 'required|email|unique:users,email,'.$this->user_id.',user_id';
	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
