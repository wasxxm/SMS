<?php

class UserController extends \BaseController {

	protected $user;
	
	public function __construct(User $user)
	{
	   $this->beforeFilter('auth');
	   
	   $this->user = $user;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!check_permission('view_user')) return unauth();
		
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
		if (!check_permission('create_user')) return unauth();
		
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
		$user_profile_pic_uri = '';
		
		if ($user_found)
		{
		   $user_profile_pic_uri = $user_found->user_profile_pic_uri; 
		   $this->user = $user_found;  
		}
		
		$pass_input = Input::get('password');
		
		if ($user_found && $pass_input == '')
		{
			 Input::merge(array('password' => $user_found->password));
		}
		
		$input = Input::all();
		
		if (!check_permission('edit_user'))
		{
		    unset($input['user_status']);   	
		}
		
		if (!$this->user->fill($input)->is_valid())
		{
		   return Redirect::back()->withInput()->withErrors($this->user->errors);
		}
		
	    if (Input::file('user_profile_pic_uri'))
		{
			$path = public_path('uploads/profiles/' . time().uniqid().rand(1, 1000).'.jpg');
			
			$img = Image::make(Input::file('user_profile_pic_uri'))->resize(Setting::get('profile_pic_width'), Setting::get('profile_pic_height'))->save($path);
	
			$this->user->user_profile_pic_uri = $img->basename;
		}
		else
		{
		   $this->user->user_profile_pic_uri = $user_profile_pic_uri;	
		}
		
		if ($user_found)
		{
			if ($pass_input != '')
			{
		      $this->user->password = Hash::make($pass_input);	
			}
		}
		else
		{
		   $this->user->password = Hash::make($pass_input);   	
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
		if (!check_permission('create_user')) return unauth();
		
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
		if (!check_permission('view_user') && !check_permission('view_profile')) return unauth();
		
		$user = $this->user->find($id);
		
		if (check_permission('view_profile') && !check_permission('view_user'))
		{
		    if (Auth::id() != $id)
			{
			   return unauth();	
			}
		}
		
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
		if (!check_permission('edit_user') && !check_permission('edit_profile')) return unauth();
		
		$user = $this->user->find($id);
		
		if (check_permission('edit_profile') && !check_permission('edit_user'))
		{
		    if (Auth::id() != $id)
			{
			   return unauth();	
			}
		}
		
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
		if (!check_permission('edit_user') && !check_permission('edit_profile')) return unauth();
		
		if (check_permission('edit_profile') && !check_permission('edit_user'))
		{
		    if (Auth::id() != $id)
			{
			   return unauth();	
			}
		}
		
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
	   if (!check_permission('disable_user') || User::find($id)->user_company_id != get_user_cid()) return unauth();
	   
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
