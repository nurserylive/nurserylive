<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
		$customers = DB::select('select * from nl_customer_experience');
		//$customers = DB::table('nl_customer_experience')->where('votes', '>', 100)->get();
		//$customers = DB::table('nl_customer_experience')->paginate(15);
		$customers = DB::table('nl_customer_experience');
		if($request->get('status'))
        {
            $customers->where('order_status', '=', $request->get('status'));
        }
        if($request->get('last_order_date'))
        {
			//echo $request->get('last_order_date');
			//$final_data = date("Y-m-d H:i:s", strtotime($request->get('last_order_date')));
            //echo $final_data;
			//$customers->where('created_on', '!>', $final_data);
        }
		 /**if(Input::has('status'))
        {
            $customers->where('order_status_name', '=', Input::get('status'));
        }
        if(Input::has('last_order_date'))
        {
            $customers->where('created_on', '<=', Input::get('last_order_date'));
        }*/
		$customers = $customers->paginate(15);
        return view('customer', ['customers' => $customers, 'request' => $request]);
		//return view::make('customer', ['customers' => $customers]);

    }
	
	public function queueNotifications(Request $request) {
		echo "Send mail to following customer ids:";
		$customer_ids = explode(',', $request->get('customer_ids'));
		print_r($customer_ids);
		//echo $request->get('customer_ids');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
