<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class PurchaseRequest extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "purchase_request_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('purchase_request_reject_notes', 'purchase_request_name', 'purchase_request_desc');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchase_requests';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'purchase_request_name'			=> 'required|min:3',
		   'purchase_request_desc'			=> 'min:3',	
		   'purchase_request_date'			=> 'date',
		   'purchase_request_reject_notes'	=> 'min:5',
		   'purchase_request_edited_date'	=> 'date',
	   );
	}
	
	public function company()
    {
        return $this->belongsTo('Company', 'company_id', 'purchase_request_company_id');
    }
	
    public function user()
    {
        return $this->belongsTo('User');
    }
	
    public function products()
    {
        return $this->belongsToMany('Product')->withPivot('value', 'quantity');
    }
	
    public function is_valid()
	{  	   	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
