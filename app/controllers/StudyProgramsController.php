<?php

class StudyProgramsController extends \BaseController {

	protected $study_program;
	
	public function __construct(StudyProgram $study_program)
	{
	   $this->beforeFilter('auth');
	   
	   $this->study_program = $study_program;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_study_program')) return unauth();
		
		$study_programs = $this->study_program->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('study_programs.index', array('study_programs' => $study_programs));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('create_study_program')) return unauth();
		return View::make('study_programs.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		if ($study_program_found = StudyProgram::find($id))
		{	
		   $this->study_program = $study_program_found;
		}
		else
		{

		}
		
		$input = Input::all();
		
		if (!$this->study_program->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->study_program->errors);
		}
		
	    $this->study_program->save();
		
		if ($study_program_found)
		{
		   Session::flash('alert', trans('text.updated_study_program') . ': ' . $this->study_program->study_program_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_study_program') . ': ' . $this->study_program->study_program_name);
		   return Redirect::route('study_programs.show', array('study_program' => $this->study_program->study_program_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!check_permission('create_study_program')) return unauth();
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
		if (!check_permission('view_study_program')) return unauth();
		
		$study_program = $this->study_program->find($id);
		
		return View::make('study_programs.show', array('study_program' => $study_program));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_study_program')) return unauth();
		
		$study_program = $this->study_program->find($id);
		
		return View::make('study_programs.create_or_edit', array('study_program' => $study_program));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_study_program')) return unauth();
		
		return $this->store_create($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($study_program_id)
	{
	   if (!check_permission('delete_study_program')) return unauth();
	  
	   
	   //if (study_program::where('study_program_id', $study_program_id)->first()->department_users_count >= 1) return Redirect::to("departments")->with('alert', trans('text.department_del_error'))->with('alert_type', 'danger');
	   
	   $study_program = StudyProgram::where('study_program_id', $study_program_id)->delete();
	   
	   return Redirect::to("study_programs")->with('alert', trans('text.study_program_deleted'));
	}

}
