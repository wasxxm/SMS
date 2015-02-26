<?php

class DepartmentsController extends \BaseController {

	protected $department;
	
	public function __construct(Department $department)
	{
	   $this->department = $department;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
		return View::make('departments.create_or_edit');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		$input = Input::all();
		
		$department_found = Department::find($id);
		
		if ($department_found) $this->department = $department_found;
		
		if (!$this->department->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->department->errors);
		}
		
	    $this->department->save();
		
		if ($department_found)
		{
		   Session::flash('alert', 'Updated Department Details' . ': ' . $this->department->department_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', 'Created Department' . ': ' . $this->department->department_name);
		   return Redirect::route('departments.show', array('department' => $this->department->department_id));	
		}
	}
	
    public function store()
	{
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
		return $this->store_create($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function update_status($id)
	{
	   $status = $this->get_status($id) ? $this->set_status($id, 0) : $this->set_status($id, 1);
	   
	   return Redirect::back()->with('alert', trans('text.updated_status_department') . ': ' . $this->department->find($id)->department_name); 	
	}
	
	public function set_status($id, $department_status)
	{
		$department = $this->department->find($id);
		$department->department_status = $department_status;
		return $department->save();
	}
	
	public function get_status($id)
	{
		$department = $this->department->find($id);
		return $department->department_status ? true : false;
	}


}
