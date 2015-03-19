<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "product_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('product_name', 'product_desc', 'product_category_id', 'product_value', 'product_company_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'product_name'					=> 'required',
		   'product_desc'					=> 'required|min:3',	
		   'product_category_id'			=> 'required|integer',
		   'product_value'					=> 'required|float',
		   'product_company_id'				=> 'required|integer',
	   );
	}
	
	public function company()
    {
        return $this->belongsTo('Company', 'company_id', 'product_company_id');
    }
	
	public function category()
    {
        return $this->belongsTo('ProductCategory', 'product_category_id', 'product_category_id');
    }
	
    public function is_valid()
	{  	   	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
