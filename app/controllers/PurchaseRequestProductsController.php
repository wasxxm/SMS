<?php

class PurchaseRequestProductsController extends \BaseController {

	protected $purchase_request_products;
	
	public function __construct(PurchaseRequest $purchase_request_products)
	{
	   $this->beforeFilter('auth');
	   
	   $this->purchase_request_products = $purchase_request_products;	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($purchase_request_id)
	{
	    if (!check_permission('view_purchase_request')) return unauth();
		
		if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
		
		$purchase_request_products = PurchaseRequest::find($purchase_request_id);
		
	    return View::make('purchase_request_products.index', array('purchase_request_products' => $purchase_request_products));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($purchase_request_id)
	{
		if (!check_permission('create_purchase_request')) return unauth();
		if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
		
		$purchase_request = PurchaseRequest::find($purchase_request_id);
		
		return View::make('purchase_request_products.create', array('purchase_request' => $purchase_request));
	}

    
     /**
	 * Store/Create resource in storage.
	 *
	 * @return Response
	 */
	public function store_create($id = 0)
	{
		$input = Input::all();
		
		$this->purchase_request_products = PurchaseRequest::find($id);
		
		$errorMessages = new Illuminate\Support\MessageBag;
		
		if ($this->purchase_request_products->products->contains($input['product_id']))
		{
		   $errorMessages->add('product_id', trans('text.product_already_in_pr'));
		   return Redirect::back()->withInput()->withErrors($errorMessages);
		}
		
		if ((float)$input['product_value'] < 0)
		{
		   $errorMessages->add('product_value', trans('text.product_value_invalid'));
		   return Redirect::back()->withInput()->withErrors($errorMessages);
		}
		
		if ((int)$input['product_quantity'] < 1)
		{
		   $errorMessages->add('product_quantity', trans('text.product_quantity_invalid'));
		   return Redirect::back()->withInput()->withErrors($errorMessages);
		}
		
		if (trim($input['product_value']) == '')
		{
		    $input['product_value'] = Product::find($input['product_id'])->product_value;   	
		}
		else
		{
		    $input['product_value'] = (float)$input['product_value']; 	
		}
		
        $input['product_quantity'] = (int)$input['product_quantity'];
		
		$this->purchase_request_products->products()->attach($input['product_id'], array('value' => $input['product_value'], 'quantity' => $input['product_quantity']));
		
	    $this->purchase_request_products->push();
		
		Session::flash('alert', Lang::get('text.added_product_to_pr', array('product' => Product::find($input['product_id'])->product_name)));
		return Redirect::to("purchase_requests/{$this->purchase_request_products->purchase_request_id}/products");	
	}
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($purchase_request_id)
	{
		if (!check_permission('create_purchase_request')) return unauth();
		
		if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
		
		if (!if_product_in_company(Input::get('product_id'), get_user_cid())) return unauth();
		
		return $this->store_create($purchase_request_id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($purchase_request_id)
	{
		if (!check_permission('view_purchase_request')) return unauth();
		
		$purchase_request = $this->purchase_request->find($purchase_request_id);
		
		return View::make('purchase_requests.show', array('purchase_request' => $purchase_request));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($purchase_request_id, $product_id)
	{
	   if (!check_permission('create_purchase_request')) return unauth();
	   
       if (!if_purchase_request_in_company($purchase_request_id, get_user_cid())) return unauth();
	   
	   if (!if_product_in_company($product_id, get_user_cid())) return unauth();
	   
	   if (!PurchaseRequest::find($purchase_request_id)->products()->detach($product_id)) 
	   {
	       return Redirect::to("purchase_requests/{$purchase_request_id}/products")->with('alert', trans('text.pr_products_del_error'))->with('alert_type', 'danger');   
	   }
	   
	   return Redirect::to("purchase_requests/{$purchase_request_id}/products")->with('alert', trans('text.pr_product_deleted'));
	}

}
