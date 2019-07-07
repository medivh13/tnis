<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Customer;
use DataTables;

class AccountController extends Controller
{
    public function __construct(Customer $customer, Account $account, Transaction $transaction)
    {
        $this->middleware('auth');
        $this->customer = $customer;
        $this->account = $account;
        $this->transaction = $transaction;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
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
    public function show(Request $request)
    {
        if($request->ajax()){
            
            $index = $this->account->query()->with('customer');
      
              return DataTables::of($index)
              ->editColumn('id', function($index){
                return $index->id;
              })
              ->editColumn('name', function($index){
                return ucwords($index->customer->first_name.' '.$index->customer->last_name);
              })
              ->editColumn('balance', function($index){
                return $index->balance;
              })
              ->addColumn('action', function($index){
                return '<center><a class="btn btn-primary btn-sm detail" href="'.route('account.edit',['id' => $index->id]).'"><i class="fa fa-pencil"></i> <span class="tombol"> Detail Trans</span></a></center>';
               
              })
              ->make(true);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['id'] = $id;
        return view('account.detail',$data);
    }

    public function detailTrans($id)
    {
        $index = $this->transaction->query()->with('createdUser')->where('account_id',$id);
      
        return DataTables::of($index)
        ->editColumn('created_by', function($index){
          return $index->createdUser->name;
        })
        ->editColumn('amount', function($index){
            return $index->amount;
        })
        ->editColumn('type', function($index){
          return $index->type;
        })
        ->editColumn('created_at', function($index){
            return $index->created_at;
        })
        ->make(true);
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
