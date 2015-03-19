<?php

class PurchaseRequestsController extends \BaseController {

	protected $purchase_request;
	
	public function __construct(PurchaseRequest $purchase_request)
	{
	   $this->beforeFilter('auth');
	   
	   $this->purchase_request = $purchase_request;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_purchase_request')) return unauth();
		
		$purchase_requests = $this->purchase_request->where('purchase_request_company_id', '=', get_user_cid())->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('purchase_requests.index', array('purchase_requests' => $purchase_requests));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('create_purchase_request')) return unauth();
		return View::make('purchase_requests.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		if ($purchase_request_found = PurchaseRequest::find($id))
		{
		   if (!if_purchase_request_in_company($id, get_user_cid())) return unauth();	
		   $this->purchase_request = $purchase_request_found;
		}
		
		$input = Input::all();
		
		if ($purchase_request_found)
		{
		   $this->purchase_request->purchase_request_edited_date = NOW();
		}
		else
		{
		   $this->purchase_request->purchase_request_company_id = get_user_cid();
		   $this->purchase_request->purchase_request_date = NOW();
		   $this->purchase_request->purchase_request_status = 0;
		}
		
		if (!$this->purchase_request->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->purchase_request->errors);
		}
		
	    $this->purchase_request->save();
		
		if ($purchase_request_found)
		{
		   Session::flash('alert', trans('text.updated_purchase_request') . ': ' . $this->purchase_request->purchase_request_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_purchase_request') . ': ' . $this->purchase_request->purchase_request_name);
		   return Redirect::route('purchase_requests.show', array('purchase_request' => $this->purchase_request->purchase_request_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!check_permission('create_purchase_request')) return unauth();
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
		if (!check_permission('view_purchase_request')) return unauth();
		if (!if_purchase_request_in_company($id, get_user_cid())) return unauth();	
		
		$purchase_request = $this->purchase_request->find($id);
		
		return View::make('purchase_requests.show', array('purchase_request' => $purchase_request));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_purchase_request')) return unauth();
		if (!if_purchase_request_in_company($id, get_user_cid())) return unauth();	
		
		$purchase_request = $this->purchase_request->find($id);
		
		return View::make('purchase_requests.create_or_edit', array('purchase_request' => $purchase_request));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_purchase_request')) return unauth();
		if (!if_purchase_request_in_company($id, get_user_cid())) return unauth();	
		
		return $this->store_create($id);
	}
	
	
	public function reject($purchase_request_id)
	{
	   if (!check_permission('reject_purchase_request')) return unauth();
	   
       if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
	   
	   $pr = PurchaseRequest::find($purchase_request_id);
	   $pr->purchase_request_status = 2;
	   $pr->purchase_request_edited_date = NOW();
	   $pr->save();
	   
	   return Redirect::to("purchase_requests/{$purchase_request_id}")->with('alert', trans('text.rejected_purchase_request'). ": {$pr->purchase_request_name}");
	}
	
    
	public function approve($purchase_request_id)
	{
	   if (!check_permission('approve_purchase_request')) return unauth();
	   
       if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
	   
	   $pr = PurchaseRequest::find($purchase_request_id);
	   $pr->purchase_request_status = 1;
	   $pr->purchase_request_edited_date = NOW();
	   $pr->save();
	   
	   return Redirect::to("purchase_requests/{$purchase_request_id}")->with('alert', trans('text.approved_purchase_request') . ": {$pr->purchase_request_name}");
	}
	
	public function delete($purchase_request_id)
	{
	   if (!check_permission('delete_purchase_request')) return unauth();
	   
       if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
	   
	   $pr = PurchaseRequest::find($purchase_request_id);
	   if ($pr->purchase_request_status != 1)
	   {
		   $pr->delete();   
	   }
	   else
	   {
		   return Redirect::to("purchase_requests/{$purchase_request_id}")->with('alert', trans('text.delete_pr_error'))->with('alert_type', 'danger');      
	   }
	   
	   return Redirect::to("purchase_requests")->with('alert', trans('text.deleted_purchase_request') . ": {$pr->purchase_request_name}");
	}

}
