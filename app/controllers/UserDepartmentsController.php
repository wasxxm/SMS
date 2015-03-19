<?php

class UserDepartmentsController extends \BaseController {

	protected $user_departments;
	
	public function __construct(UserDepartment $user_departments)
	{
	   $this->beforeFilter('auth');
	   
	   $this->user_departments = $user_departments;	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($user_id)
	{
		if (!check_permission('manage_user_departments')) return unauth();
		
		if (!if_user_in_company($user_id, get_user_cid())) return unauth();
		
		return View::make('user_departments.create', array('user_id' => $user_id));
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($user_id)
	{
		
		$input = Input::all();
		
		$input['user_id'] = $user_id;
		$input['company_id'] = get_user_cid();
		
		if (!$this->user_departments->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->user_departments->errors);
		}
		
	    if ($this->user_departments->save())
		{
		   $dep = Department::find(Input::get('department_id'));
		   $dep->increment('department_users_count');
		   $dep->save();    	
		}
		
		Session::flash('alert', trans('text.added_user_department'));
		
		return Redirect::to("users/{$user_id}/departments");
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($user_id)
	{
		
		if (!check_permission('manage_user_departments')) return unauth();
		
		if (!if_user_in_company($user_id, get_user_cid())) return unauth();
		
		if (!if_department_in_company(Input::get('department_id'), get_user_cid())) return unauth();
		
		return $this->store_create($user_id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function index($user_id)
	{
       if (!check_permission('manage_user_departments')) return unauth();
	   
	   if (!if_user_in_company($user_id, get_user_cid())) return unauth();
	  
	   $user = $this->user_departments->where('user_id', $user_id)->where('company_id', get_user_cid())->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('user_departments.index', array('user' =>$user, 'user_id' => $user_id));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($user_id, $department_id)
	{
       if (!check_permission('manage_user_departments')) return unauth();
	   
	   if (!if_user_in_company($user_id, get_user_cid())) return unauth();
	   
	   if (!if_department_in_company($department_id, get_user_cid())) return unauth();
	   
	   $user_department = UserDepartment::where('user_id', $user_id)->where('department_id', $department_id)->where('company_id', get_user_cid())->delete();
	   
	   if ($user_department)
	   {
		   $dep = Department::find($department_id);
		   $dep->decrement('department_users_count');
		   $dep->save();   
	   }
	   
	   return Redirect::to("users/{$user_id}/departments")->with('alert', trans('text.user_deleted_department'));
	}


}
