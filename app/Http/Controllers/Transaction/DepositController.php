<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Account;
use App\Models\Transaction;
use Mail;
use App\Mail\DetailTrans;

class DepositController extends Controller
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
        return view('deposit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deposit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->account_id){
            $account = $this->account->find($request->account_id);
            // dd($account->customer->email);
            $new_balance = doubleVal($account->balance) + doubleVal($request->amount);

            $data_transaction = collect([
                'account_id' => $account->id,
                'created_by' => auth()->user()->id,
                'amount' => $request->amount,
                'type' => 'deposit_cash'
            ])->all();

            $transaction = $this->transaction->create($data_transaction);

            $account->update(['balance' => $new_balance]);
            
            $data_email = collect([
                'account_id' => $account->id,
                'amount' => $request->amount,
                'type' => 'deposit_cash',
                'balance' => $account->balance
            ])->all();
            Mail::to($account->customer->email)->locale('es')->send(
                new DetailTrans($data_email)
            );

            if($account && $transaction){
                return redirect()->route('deposit.create')->with('success', 'Deposit Cash');
            }else{
                return redirect()->route('deposit.create')->with('danger', 'Deposit Cash');
            }
        }else{
            $is_exist = $this->customer::where('nik',$request->nik)->first();
        
            if(!$is_exist){

                $data_customer = collect($request->all())
                ->except(['_token','amount'])
                ->merge(['id' => Uuid::generate()->string])
                ->all();

                $customer = $this->customer->create($data_customer);

                $data_account = collect([

                    'id' => uniqid(),
                    'customer_id' => $customer->id,
                    'balance' => doubleVal($request->amount)
                
                ])->all();

                $account = $this->account->create($data_account);
            
                $data_transaction = collect([
                    'account_id' => $account->id,
                    'created_by' => auth()->user()->id,
                    'amount' => $request->amount,
                    'type' => 'deposit_cash'
                ])->all();

                $transaction = $this->transaction->create($data_transaction);

                $data_email = collect([
                    'account_id' => $account->id,
                    'amount' => $request->amount,
                    'type' => 'deposit_cash',
                    'balance' => $account->balance
                ])->all();
                
                Mail::to($customer->email)->locale('es')->send(
                    new DetailTrans($data_email)
                );

                if($customer && $account && $transaction){
                    return redirect()->route('deposit.index')->with('success', 'Deposit Cash');
                }else{
                    return redirect()->route('deposit.index')->with('danger', 'Deposit Cash');
                }
            }else{

                return redirect()->route('deposit.index')->with('danger', 'Customer is exist. Use existing customer instead.');

            }
        }
        
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
        dd($request->all());
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
