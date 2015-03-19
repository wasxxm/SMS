<?php

class PermissionSetsController extends \BaseController {

	protected $permission_set;
	
	public function __construct(PermissionSet $permission_set)
	{
	   $this->beforeFilter('auth');
	   
	   $this->permission_set = $permission_set;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_permission_set')) return unauth();
		
		$permission_sets = $this->permission_set->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('permissions.index', array('permission_sets' => $permission_sets));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('create_permission_set')) return unauth();
		
		return View::make('permissions.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		if ($permission_set_found = PermissionSet::find($id))
		{	
		   $this->permission_set = $permission_set_found;
		}
		
		$input = Input::all();
		
		if (isset($input['permission_ids']) && !check_if_permission_ids_valid($input['permission_ids'])) return unauth();
		
		if (isset($input['permission_ids']))
		{
			$permissions = new Permission();
			
			$permission_ids = implode(',', $input['permission_ids']);
			
			$input['permission_ids'] = $permission_ids;
		}
		else
		{
		   $input['permission_ids'] = '';	
		}
		
		if (!$this->permission_set->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->permission_set->errors);
		}
		
	    $this->permission_set->save();
		
		if ($permission_set_found)
		{
		   Session::flash('alert', trans('text.updated_permission_set') . ': ' . $this->permission_set->permission_set_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_permission_set') . ': ' . $this->permission_set->permission_set_name);
		   return Redirect::route('permissions.show', array('permission_set' => $this->permission_set->permission_set_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!check_permission('create_permission_set')) return unauth();
		return $this->store_create();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (!check_permission('view_permission_set')) return unauth();	
		
		$permission_set = $this->permission_set->find($id);
		
		return View::make('permissions.show', array('permission_set' => $permission_set));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_permission_set')) return unauth();	
		
		$permission_set = $this->permission_set->find($id);
		
		return View::make('permissions.create_or_edit', array('permission_set' => $permission_set));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_permission_set')) return unauth();
		
		return $this->store_create($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($permission_set_id)
	{
	   if (!check_permission('delete_permission_set')) return unauth();
	   
	   $permission_set = PermissionSet::where('permission_set_id', $permission_set_id)->first();	
	   
	   if ($permission_set->departments_count >= 1 || $permission_set->users_count >= 1) return Redirect::back()->with('alert', trans('text.permission_set_del_error'))->with('alert_type', 'danger');
	   
	   PermissionSet::where('permission_set_id', $permission_set_id)->delete();
	   
	   return Redirect::back()->with('alert', trans('text.permission_set_deleted'));
	}

}
