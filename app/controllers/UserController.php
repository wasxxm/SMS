<?php

use Ville\Storage\User\UserRepository as Users;

class UserController extends \BaseController {

	protected $user;
	
	public function __construct(User $user)
	{
	   $this->user = $user;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $users = $this->user->sortable()->paginate(Setting::get('pagination_size'));
		
	    return View::make('users.index', array('users' => $users));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create_or_edit');
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		
		$user_found = User::find($id);
		$pass_input = Input::get('user_password');
		
		if ($user_found) $this->user = $user_found;
		
		if ($user_found && $pass_input == '')
		{
			 Input::merge(array('user_password' => $user_found->user_password));
		}
		
		$input = Input::all();
		
		if (!$this->user->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->user->errors);
		}
		
		if ($user_found)
		{
			if ($pass_input != '')
			{
		      $this->user->user_password = Hash::make($pass_input);	
			}
		}
		else
		{
		   $this->user->user_password = Hash::make($pass_input);   	
		}
		
	    $this->user->save();
		
		if ($user_found)
		{
		   Session::flash('alert', trans('text.updated_details_user') . ': ' . $this->user->user_fullname);
		   return Redirect::back();
		}
		else
		{
		   Session::flash('alert', trans('text.created_new_user') . ': ' . $this->user->user_fullname);
		   return Redirect::route('users.show', array('user' => $this->user->user_id));	
		}
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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
		$user = $this->user->find($id);
		
		return View::make('users.show', array('user' => $user));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);
		
		return View::make('users.create_or_edit', array('user' => $user));
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
	   return Redirect::back()->with('alert', trans('text.updated_status_user') . ': ' . $this->user->find($id)->user_fullname);
	}
	
	public function set_status($id, $user_status)
	{
		$user = $this->user->find($id);
		$user->user_status = $user_status;
		return $user->save();
	}
	
	public function get_status($id)
	{
		$user = $this->user->find($id);
		return $user->user_status ? true : false;
	}


}
