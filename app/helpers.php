<?php

/*
Helper Functions
*/

/*
get the company configs and cache them
*/
function get_company_config($config)
{
   if (!Auth::check())
   {
	   return false;
   }
   
   if (!Session::get('company_configs'))
   {
	  $company = get_user_company();
	  Session::put('company_configs', $company); 
   }
   else
   {
	   $company = Session::get('company_configs');   
   }
   
   if ($config == 'currency_code')
   {
	   return $company->company_currency_code;   
   }
}

function NOW()
{
   return date('Y-m-d H:i:s');	
}

function format_date($date_string, $day = true)
{  
   if (!check_date($date_string)) return;
   
   if ($day)
   {
      return Date::parse($date_string)->format('l, j F Y');	
   }
   else
   {
	  return Date::parse($date_string)->format('j F Y');   
   }
}

function format_datetime($date_string, $day = true)
{
   if (!check_date($date_string)) return;
   
   if ($day)
   {
      return Date::parse($date_string)->format('l, j F Y h:i:s');	
   }
   else
   {
	  return Date::parse($date_string)->format('j F Y');   
   }	
}

function check_date($date_string)
{
   if (is_null($date_string)) return;
   
   if (!is_string($date_string))
   {
      $year = date_parse($date_string->toFormattedDateString());
   }
   else
   {
	   $year = date_parse($date_string);   
   }
   if (!$year['year']) return;	
   
   return true;
}

// get current user company ID
function get_user_cid()
{
   if (Auth::check())
   {
	   $company_id = DB::table('users')->where('user_id', '=', Auth::id())->pluck('user_company_id');
	   $company = DB::table('companies')->where('company_id', '=', $company_id)->first();
	   return $company->company_id;
   }
   return false;
}

function get_user_company()
{
   if (Auth::check())
   {
	   $company_id = DB::table('users')->where('user_id', '=', Auth::id())->pluck('user_company_id');
	   $company = DB::table('companies')->where('company_id', '=', $company_id)->first();
	   return $company;
   }
   return false;
}

function if_user_in_company($user_id, $company_id)
{
   	$u = User::find($user_id);
	if ($u && $u->user_company_id == $company_id)
	{
	   return true;	
	}
	
	return false;
}

function if_department_in_company($department_id, $company_id)
{
   	$d = Department::find($department_id);
	if ($d && $d->department_company_id == $company_id)
	{
	   return true;	
	}
	
	return false;
}

function if_permission_set_in_company($permission_set_id, $company_id)
{
   	$cid = PermissionSet::find($permission_set_id);
	if ($cid && $cid->company_id == $company_id)
	{
	   return true;	
	}
	
	return false;
}

function if_purchase_request_in_company($purchase_request_id, $company_id)
{
   	$cid = PurchaseRequest::find($purchase_request_id);
	if ($cid && $cid->purchase_request_company_id == $company_id)
	{
	   return true;	
	}
	
	return false;
}

function if_product_in_company($product_id, $company_id)
{
   	$cid = Product::find($product_id);
	if ($cid && $cid->product_company_id == $company_id)
	{
	   return true;	
	}
	
	return false;
}

function if_supplier_in_company($supplier_id, $company_id)
{
   	$d = Supplier::find($supplier_id);
	if ($d && $d->supplier_company_id == $company_id)
	{
	   return true;	
	}
	
	return false;
}

/*
Check if the permission IDs are only meant for non super user
*/
function check_if_permission_ids_valid($permission_ids)
{
	$permissions = Permission::all();
	
	foreach($permissions as $permission)
	{
	   if (in_array($permission->permission_id, $permission_ids) && $permission->super_user)
	   {
		   return false;   
	   }
	}
	
	return true;
}

function unauth()
{
   return Response::make(trans('text.unauthorized'), 401);	
}

function check_permission($permission)
{
    if (Auth::check() && $user_permissions = Auth::user()->permissions())
    {
         if (in_array($permission, $user_permissions))
		 {
		     return true;	 
		 }
	}
	
	return false;   
}

function if_no_permission()
{
    if (!Auth::user()->permissions() or count(Auth::user()->permissions()) <= 0)
	{
	   return true;	
	}
	
	return false;
}

function if_user_disabled()
{
    if (User::find(Auth::id())->user_status)
	{
	   return false;	
	}
	
	return true;
}

function get_curr_code()
{
   if (Auth::check())
   {
      $company = Company::find(get_user_cid())->get();
      return $company->company_currency_code;
   }
   
   return false;
}


function format_product_names($products, $purchase_request_id)
{  
   $product_names_html = '';
   
   if ($products)
   {
	   foreach($products as $product)
	   {
		   $product_names_html .= '<a target="_blank" href="'.url('products/' . $product->product_id).'" class="btn default blue-stripe" style="margin-top:4px;margin-bottom:4px">' . $product->product_name . '</a> '; 
	   }
	   if ($product_names_html == '')
	   {
	      return link_to("purchase_requests/$purchase_request_id/products/create", trans('text.add_products_purchase'));   
	   }
	   else
	   {
	      return $product_names_html;
	   }
   }
   
   return false;
}

function format_purchase_request_status($status = 0)
{
   if ($status == 0)
   {
	   return '<span class="label label-warning">' . trans('text.pending_approval') . '</span>'; 
   }
   elseif ($status == 1)
   {
	   return '<span class="label label-success">' . trans('text.approved') . '</span>';  
   }
   elseif ($status == 2)
   {
	   return '<span class="label label-danger">' . trans('text.rejected') . '</span>'; 
   }
   else
   {
	   return '<span class="label label-warning">' . trans('text.pending_approval') . '</span>';    
   }
}


// macro for generating the active class for menu links
HTML::macro('menu_active', function($route, $matchExact = false)
{
   if($matchExact && Request::is($route))
   {
      $active = "active open start";
   }
   elseif(!$matchExact && (Request::is($route . '/*') || Request::is($route)))
   {
      $active = "active open";
   }
   else
   {
      $active = '';
   }
   
   return $active;
});

// macro to include html in form::label
Form::macro('label_html', function($name, $value = null, $options = array())
{
	$label = Form::label($name, '%s', $options);

    return sprintf($label, $value);
});

// function to append value to product names array
function get_products_with_values()
{
   $products = Product::all();
   $product_names_values = array();
   foreach ($products as $product)
   {
	   $product_names_values[] = $product->product_name . ' (' . get_currency(get_company_config('currency_code')) . $product->product_value . ')';      
   }
   
   return $product_names_values;
}

/*
Query Listening
*/
/*
Event::listen('illuminate.query', function() {
    print_r(func_get_args()); exit;
});
*/

/*
Currency codes array
*/
function get_currency($code = 'USD')
{
   $currency = array
   (
      'USD'	=> '$',
   );
   
   return $currency[$code];
}

?>