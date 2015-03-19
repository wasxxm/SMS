<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class section extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "section_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('section_name', 'batch_id', 'study_program_id', 'department_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sections';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'section_company_id'	=> 'required|integer',
		   'section_email'			=> 'required|email',
		   'section_phone'			=> 'between:6,15',
		   'section_observations'	=> 'between:10,1000',
		   'section_register_date'	=> 'date',
		   'section_money_spent'	=> 'numeric',
	   );
	}
	
	public function company()
    {
        return $this->belongsTo('Company', 'company_id', 'section_company_id');
    }
	
    public function is_valid()
	{  	   
	   Static::$rules['section_name'] = 'required|between:3,100|unique:sections,section_name,'.$this->section_id.',section_id';
	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
