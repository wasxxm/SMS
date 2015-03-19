<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class StudyProgram extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "study_program_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('study_program_name', 'study_program_duration', 'study_program_desc', 'department_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'study_programs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'study_program_duration'	=> 'required|integer|min:1',
		   'study_program_desc'	   => 'min:10',
		   'department_id'	      => 'required|integer',
	   );
	}
	
	public function department()
    {
        return $this->belongsTo('Department');
    }
	
	public function batch()
    {
        return $this->hasMany('Batch');
    }
	
    public function is_valid()
	{  	   
	   Static::$rules['study_program_name'] = 'required|between:3,100|unique:study_programs,study_program_name,'.$this->study_program_id.',study_program_id';
	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
