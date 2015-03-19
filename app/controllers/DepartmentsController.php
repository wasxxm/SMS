<?php

class DepartmentsController extends \BaseController {

	protected $department;
	
	public function __construct(Department $department)
	{
	   $this->beforeFilter('auth');
	   
	   $this->department = $department;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_department')) return unauth();
		
		$departments = $this->department->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('departments.index', array('departments' => $departments));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('create_department')) return unauth();
		return View::make('departments.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		if ($department_found = Department::find($id))
		{
		   $this->department = $department_found;
		}
		
		$input = Input::all();
		
		
		if (!$this->department->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->department->errors);
		}
		
	    $this->department->save();
		
		if ($department_found)
		{
		   Session::flash('alert', trans('text.updated_department') . ': ' . $this->department->department_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_department') . ': ' . $this->department->department_name);
		   return Redirect::route('departments.show', array('department' => $this->department->department_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!check_permission('create_department')) return unauth();
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
		if (!check_permission('view_department')) return unauth();
		
		$department = $this->department->find($id);
		
		return View::make('departments.show', array('department' => $department));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_department')) return unauth();
		
		$department = $this->department->find($id);
		
		return View::make('departments.create_or_edit', array('department' => $department));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_department')) return unauth();
		
		return $this->store_create($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($department_id)
	{
	   if (!check_permission('delete_department')) return unauth();
	   
	   //if (Department::where('department_id', $department_id)->first()->department_users_count >= 1) return Redirect::to("departments")->with('alert', trans('text.department_del_error'))->with('alert_type', 'danger');
	   if (!StudyProgram::where('department_id', $department_id)->first())
	   {  
	      $department = Department::where('department_id', $department_id)->delete();
	   
	      return Redirect::to("departments")->with('alert', trans('text.department_deleted'));
	   }
	   
	   return Redirect::to("departments")->with('alert', trans('text.department_del_error'))->with('alert_type', 'danger');
	}

}
