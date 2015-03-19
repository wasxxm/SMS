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
	protected $hidden = array('');
	
	public function __construct()
	{
		static::$rules = array(
		   'department_desc' => 'between:10,1000',
	   );
	}
	
	public function studyprograms()
    {
        return $this->hasMany('StudyProgram', 'study_program_id');
    }
	
    public function batches()
    {
        return $this->hasMany('Batch', 'batch_id');
    }
	
    public function is_valid()
	{  	   
	   Static::$rules['department_name'] = 'required|between:3,100|unique:departments,department_name,'.$this->department_id.',department_id';
	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
