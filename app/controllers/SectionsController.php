<?php

class sectionsController extends \BaseController {

	protected $section;
	
	public function __construct(section $section)
	{
	   $this->beforeFilter('auth');
	   
	   $this->section = $section;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_section')) return unauth();
		
		$sections = $this->section->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('sections.index', array('sections' => $sections));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('create_section')) return unauth();
		return View::make('sections.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		if ($section_found = section::find($id))
		{	
		   $this->section = $section_found;
		}
		else
		{
		   $this->section->section_register_date = NOW();	
		}
		
		$input = Input::all();
		
		if (!$this->section->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->section->errors);
		}
		
	    $this->section->save();
		
		if ($section_found)
		{
		   Session::flash('alert', trans('text.updated_section') . ': ' . $this->section->section_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_section') . ': ' . $this->section->section_name);
		   return Redirect::route('sections.show', array('section' => $this->section->section_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!check_permission('create_section')) return unauth();
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
		if (!check_permission('view_section')) return unauth();
		
		$section = $this->section->find($id);
		
		return View::make('sections.show', array('section' => $section));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_section')) return unauth();
		
		$section = $this->section->find($id);
		
		return View::make('sections.create_or_edit', array('section' => $section));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_section')) return unauth();
		
		return $this->store_create($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($section_id)
	{
	   if (!check_permission('delete_section')) return unauth();
	  
	   
	   //if (section::where('section_id', $section_id)->first()->department_users_count >= 1) return Redirect::to("departments")->with('alert', trans('text.department_del_error'))->with('alert_type', 'danger');
	   
	   $section = section::where('section_id', $section_id)->delete();
	   
	   return Redirect::to("sections")->with('alert', trans('text.section_deleted'));
	}

}
