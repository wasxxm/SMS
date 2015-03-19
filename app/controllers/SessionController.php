<?php

use Illuminate\Session\Store;

class SessionController extends \BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
	
	public function index()
	{
	   if (Auth::check())
	      return Redirect::to('/');	
	   else
	      return View::make('login.index');	 
	}
	
	public function create()
	{
	   if (Auth::check())
	      return Redirect::to('/');	
	   else
	      return View::make('login.index');	 
	}
	
	public function store()
	{
	   if (Auth::check())
	   {
		   return Redirect::to('/');      
	   }
	   
	   Session::forget('user_permissions');
	   
	   if (Auth::attempt(Input::only('email', 'password'), (Input::get('remember') == 1)? true :  false))
	   {	
			if (if_no_permission())
			{
			   Auth::logout();
			   return Redirect::back()->withInput()->with('alert', trans('text.no_permission'))->with('alert_type', 'danger');
			}
			
			if (if_user_disabled())
			{ 
			   Auth::logout();
			   return Redirect::back()->withInput()->with('alert', trans('text.user_disabled_error'))->with('alert_type', 'danger');	
			}
			
			
			return Redirect::to('/');
	   }
	   
	   return Redirect::back()->withInput()->with('alert', trans('text.wrong_login'))->with('alert_type', 'danger');
	}
	
	public function destroy()
	{
	    Auth::logout();
		
		Session::forget('user_permissions');
		
		return View::make('login.index');	
	}
}
