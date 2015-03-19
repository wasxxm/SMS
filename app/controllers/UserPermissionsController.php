<?php

class UserPermissionsController extends \BaseController {

	protected $user_permissions;
	
	public function __construct(UserPermission $user_permissions)
	{
	   $this->beforeFilter('auth');
	   
	   $this->user_permissions = $user_permissions;	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($user_id)
	{
		if (!check_permission('manage_user_permissions')) return unauth();
		
		return View::make('user_permissions.create', array('user_id' => $user_id));
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
		
		if (!$this->user_permissions->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->user_permissions->errors);
		}
		
	    if ($this->user_permissions->save())
		{
		   $per = PermissionSet::find(Input::get('user_permission_set_id'));
		   $per->increment('users_count');
		   $per->save();    	
		}
		
		Session::flash('alert', trans('text.added_user_permission_set'));
		
		return Redirect::to("users/{$user_id}/permissions");
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($user_id)
	{
		
		if (!check_permission('manage_user_permissions')) return unauth();
		
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
       if (!check_permission('manage_user_permissions')) return unauth();
	  
	   $user_permissions = $this->user_permissions->where('user_id', $user_id)->sortable()->paginate(Setting::get('pagination_size'));
		
	   return View::make('user_permissions.index', array('user_permissions' =>$user_permissions, 'user_id' => $user_id));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($user_id, $user_permission_set_id)
	{
       if (!check_permission('manage_user_permissions')) return unauth();
	   
	   
	   $user_permission_set_deleted = UserPermission::where('user_id', $user_id)->where('user_permission_set_id', $user_permission_set_id)->delete();
	   
	   if ($user_permission_set_deleted)
	   {
		   $per = PermissionSet::find($user_permission_set_id);
		   $per->decrement('users_count');
		   $per->save();   
	   }
	   
	   return Redirect::to("users/{$user_id}/permissions")->with('alert', trans('text.user_deleted_permission'));
	}


}
