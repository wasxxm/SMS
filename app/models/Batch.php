<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Batch extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "batch_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('batch_name', 'batch_start_date', 'study_program_id', 'department_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'batches';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'batch_start_date'	=> 'required|date',
		   'study_program_id'	=> 'required|integer',
		   'department_id'	    => 'required|integer',
	   );
	}
	
	public function department()
    {
        return $this->belongsTo('Department', 'department_id');
    }
	
	public function studyprogram()
    {
        return $this->belongsTo('StudyProgram', 'study_program_id');
    }
	
    public function is_valid()
	{  	   
	   Static::$rules['batch_name'] = 'required|between:3,100|unique:batches,batch_name,'.$this->batch_id.',batch_id';
	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
