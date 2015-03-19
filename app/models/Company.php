<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Company extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "company_id";
	
	public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('company_name', 'company_reg_no', 'company_country', 'company_city', 'company_state', 'company_address', 'company_phone', 'company_website', 'company_email', 'company_ntn', 'company_vat', 'company_currency_code', 'company_users_limit', 'company_logo_uri', 'company_contacts');
	
	public function __construct()
	{
		static::$rules = array(
		   'company_name' => 'required|between:3,100',
		   'company_reg_no' => 'required|alphaNum|between:3,100',
		   'company_currency_code' => 'required|alpha|between:3,4',
		   'company_users_limit' => 'required|integer|between:1,10000',
		   'company_country' => 'alpha|between:3,50',
		   'company_city' => 'alpha|between:3,50',
		   'company_state' => 'alpha|between:3,50',
		   'company_address' => 'between:5,200',
		   'company_phone' => 'between:7,15',
		   'company_website' => 'url',
		   'company_email' => 'email',
		   'company_ntn' => 'between:3,20',
		   'company_vat' => 'between:3,20',
		   'company_logo_uri' => "image|mimes:jpeg,gif,png|max:". Setting::get('company_logo_max_size'),
	   );
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array();
	
	public function departments()
    {
        return $this->hasMany('Department', 'department_company_id', 'company_id');
    }
	
	public function users()
    {
        return $this->hasMany('User', 'user_company_id', 'company_id');
    }
	
	public function is_valid()
	{  	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}
	
	public static function get_contacts($id)
	{
	   $company_contacts = Company::find($id)->company_contacts;
	   
	   if ($company_contacts && trim($company_contacts) != '')
	   {
		   return unserialize($company_contacts);
	   }
	   
	   return false;
	}
	
	public static function get_col($col_name)
	{
	   $rows = Company::get(array($col_name))->toArray();
	   
	   $return_rows = array();
	   
	   if ($rows && count($rows))
	   {
		   foreach($rows as $row)
		   {
			   $return_rows[] = $row[$col_name];   
		   }
		   
		   return $return_rows;
	   }
	   
	   return false;	
	}

}
