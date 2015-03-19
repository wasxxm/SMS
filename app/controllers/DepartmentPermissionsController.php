<?php

class DepartmentPermissionsController extends \BaseController {

	protected $department_permissions;
	
	public function __construct(DepartmentPermission $department_permissions)
	{
	   $this->beforeFilter('auth');
	   
	   $this->department_permissions = $department_permissions;	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($department_id)
	{
		if (!check_permission('manage_department_permissions')) return unauth();
		
		if (!if_department_in_company($department_id, get_user_cid())) return unauth();
		
		return View::make('department_permissions.create', array('department_id' => $department_id));
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($department_id)
	{
		
		$input = Input::all();
		
		$input['department_id'] = $department_id;
		
		if (!$this->department_permissions->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->department_permissions->errors);
		}
		
	    if ($this->department_permissions->save())
		{
		   $per = PermissionSet::find(Input::get('department_permission_set_id'));
		   $per->increment('departments_count');
		   $per->save();    	
		}
		
		Session::flash('alert', trans('text.added_department_permission_set'));
		
		return Redirect::to("departments/{$department_id}/permissions");
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($department_id)
	{
		
		if (!check_permission('manage_department_permissions')) return unauth();
		
		if (!if_department_in_company($department_id, get_user_cid())) return unauth();
		
		if (!if_permission_set_in_company(Input::get('department_permission_set_id'), get_user_cid())) return unauth();
		
		return $this->store_create($department_id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function index($department_id)
	{
       if (!check_permission('manage_department_permissions')) return unauth();
	   
	   if (!if_department_in_company($department_id, get_user_cid())) return unauth();
	  
	   $department_permissions = $this->department_permissions->where('department_id', $department_id)->sortable()->paginate(Setting::get('pagination_size'));
		
	   return View::make('department_permissions.index', array('department_permissions' =>$department_permissions, 'department_id' => $department_id));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($department_id, $department_permission_set_id)
	{
       if (!check_permission('manage_department_permissions')) return unauth();
	   
	   if (!if_department_in_company($department_id, get_user_cid())) return unauth();
	   
	   if (!if_permission_set_in_company($department_permission_set_id, get_user_cid())) return unauth();
	   
	   $department_permission_set_deleted = DepartmentPermission::where('department_id', $department_id)->where('department_permission_set_id', $department_permission_set_id)->delete();
	   
	   if ($department_permission_set_deleted)
	   {
		   $per = PermissionSet::find($department_permission_set_id);
		   $per->decrement('departments_count');
		   $per->save();   
	   }
	   
	   return Redirect::to("departments/{$department_id}/permissions")->with('alert', trans('text.department_deleted_permission'));
	}


}
