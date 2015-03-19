<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ProductCategory extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SortableTrait;
	
	public $timestamps = true;
	
	protected $primaryKey = "product_category_id";
	
    public static $rules = array();
	
	public $errors;
	
	protected $fillable = array('product_category_name', 'product_category_desc', 'product_category_type', 'product_category_company_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_categories';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function __construct()
	{
		static::$rules = array(
		   'product_category_name'			=> 'required',
		   'product_category_desc'			=> 'required|min:3',	
		   'product_category_type'			=> 'required',
		   'product_category_company_id'	=> 'required|integer',
	   );
	}
	
	public function company()
    {
        return $this->belongsTo('Company', 'company_id', 'product_category_company_id');
    }
	
	public function category()
    {
        return $this->hasMany('Product', 'product_category_id', 'product_category_id');
    }
	
    public function is_valid()
	{  	   	   
	   $validation = Validator::make($this->attributes, static::$rules);
	   
	   if ($validation->passes()) return true;
	   
	   $this->errors = $validation->messages();
	   
	   return false;
		   	
	}

}
