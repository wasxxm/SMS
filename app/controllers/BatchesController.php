<?php

class BatchesController extends \BaseController {

	protected $batch;
	
	public function __construct(Batch $batch)
	{
	   $this->beforeFilter('auth');
	   
	   $this->batch = $batch;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_batch')) return unauth();
		
		$batches = $this->batch->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('batches.index', array('batches' => $batches));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('create_batch')) return unauth();
		return View::make('batches.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		if ($batch_found = Batch::find($id))
		{	
		   $this->batch = $batch_found;
		}
		else
		{

		}
		
		$input = Input::all();
		
		if (!$this->batch->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->batch->errors);
		}
		
	    $this->batch->save();
		
		if ($batch_found)
		{
		   Session::flash('alert', trans('text.updated_batch') . ': ' . $this->batch->batch_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_batch') . ': ' . $this->batch->batch_name);
		   return Redirect::route('batches.show', array('batch' => $this->batch->batch_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!check_permission('create_batch')) return unauth();
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
		if (!check_permission('view_batch')) return unauth();
		
		$batch = $this->batch->find($id);
		
		return View::make('batches.show', array('batch' => $batch));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_batch')) return unauth();
		
		$batch = $this->batch->find($id);
		
		return View::make('batches.create_or_edit', array('batch' => $batch));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_batch')) return unauth();
		
		return $this->store_create($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($batch_id)
	{
	   if (!check_permission('delete_batch')) return unauth();
	  
	   
	   //if (batch::where('batch_id', $batch_id)->first()->department_users_count >= 1) return Redirect::to("departments")->with('alert', trans('text.department_del_error'))->with('alert_type', 'danger');
	   
	   $batch = Batch::where('batch_id', $batch_id)->delete();
	   
	   return Redirect::to("batches")->with('alert', trans('text.batch_deleted'));
	}

}
