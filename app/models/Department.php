<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Department extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "department_id";
	
	public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('department_name', 'department_desc');
	
	public function __construct()
	{
		static::$rules = array(
		   'department_name' => 'required|between:3,100',
		   'department_desc' => 'between:10,1000',
		);
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array();
	
	public function is_valid()
	{  	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}
	
	public static function get_col($col_name)
	{
	   $rows = Department::get(array($col_name))->toArray();
	   
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
