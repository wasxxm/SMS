<?php namespace Ville\Storage\User;
 
use User;
 
class EloquentUserRepository implements UserRepository {
	
   protected $user;
	
   public function __construct(User $user)
   {
	   $this->user = $user;	
   }
 
  public function all()
  {
      $page = Input::get('page', 1);
	   
	  $data = $this->user->getByPage($page, 10);
	   
	  $users = Paginator::make($data->items, $data->totalItems, 10);
	  
	  return $users;
  }
 
  public function find($id)
  {
    return User::find($id);
  }
 
  public function create($input)
  {
    return User::create($input);
  }
  
  /**
	 * Get results by page
	 *
	 * @param int $page
	 * @param int $limit
	 * @return StdClass
	*/
	public function getByPage($page = 1, $limit = 10)
	{
	  $results =  (object) null; 
	  $results->page = $page;
	  $results->limit = $limit;
	  $results->totalItems = 0;
	  $results->items = array();
	  
	  $users = DB::table('users')->join('companies', 'users.user_company_id', '=', 'company.company_id');
	 
	  $users = $users->sortable()->skip($limit * ($page - 1))->take($limit)->get();
	 
	  $results->totalItems = $this->user->count();
	  $results->items = $users->all();
	 
	  return $results;
	}
}

?>