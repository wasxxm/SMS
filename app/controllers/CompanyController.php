<?php

class CompanyController extends \BaseController {

	protected $company;
	
	public function __construct(Company $company)
	{	
	   $this->beforeFilter('auth');
	   
	   $this->company = $company;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		if (!check_permission('view_company')) return unauth();
		
		$company = get_user_company();
		
		return View::make('company.show', array('company' => $company));	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!check_permission('view_company')) return unauth();
		
		return Redirect::route('company.index');	
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_create()
	{
		$input = Input::all();
		
		$company_found = Company::find(Auth::id());
		
		if ($company_found) $this->company = $company_found;
		
		$company_logo_uri = $company_found->company_logo_uri;
		
		if (!$this->company->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->company->errors);
		}
		
	    if (Input::file('company_logo_uri'))
		{
			$path = public_path('uploads/companies/' . time().uniqid().rand(1, 1000).'.jpg');
			
			$img = Image::make(Input::file('company_logo_uri'))->resize(Setting::get('company_logo_width'), Setting::get('company_logo_height'))->save($path);
	
			$this->company->company_logo_uri = $img->basename;
		}
		else
		{
		   	$this->company->company_logo_uri = $company_logo_uri;	
		}
		
		$company_contacts = Input::get('company_contacts');
		
		if ($company_contacts && trim($company_contacts) != '')
		{
		   $company_contacts_arr = array();
		   $company_contacts = explode("\n",  $company_contacts);
		   
		   foreach ($company_contacts as $company_contact)
		   {
			  $company_contact = explode(',', $company_contact);
			  
			  if (count($company_contact) >= 3)
			  {
			     list($company_contact_name, $company_contact_title, $company_contact_email) = $company_contact;
				 $company_contacts_arr[] = array('name' => trim($company_contact_name), 'email' => trim($company_contact_email), 'title' => trim($company_contact_title));
			  }
		   }
		   
		   $this->company->company_contacts = serialize($company_contacts_arr);
		}
		
	    $this->company->save();
		
		if ($company_found)
		{
		   Session::flash('alert', trans('text.updated_details_company') . ': ' . $this->company->company_name);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_company') . ': ' . $this->company->company_name);
		   return Redirect::route('company.show', array('company' => $this->company->company_id));	
		}
	}
	
    public function store()
	{
		return unauth();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (!check_permission('view_company')) return unauth();
		
		$company = get_user_company();
		
		return View::make('company.show', array('company' => $company));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!check_permission('edit_company')) return unauth();
		
		$company = get_user_company();
		
		return View::make('company.create_or_edit', array('company' => $company));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!check_permission('edit_company')) return unauth();
		
		return $this->store_create();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return unauth();
	}
}
