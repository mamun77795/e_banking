<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{

    public function all_transaction()
    {
    }

    public function deposit_transaction(Request $request)
    {
        
        
        

    }

    public function deposit(Request $request)
    {
        $amount = $request->amount;
        $transaction_type = $request->transaction_type;
        $fee = $request->fee;
        $user_id = Session::get('sess_user_id');

        $balance = DB::select("select balance from users where id='$user_id'");
        $new_balance = $balance[0]->balance + $amount;
        
       
        Transaction::create([
            'user_id' => $user_id,
            'transaction_type' => $transaction_type,
            'amount' => $amount,
            'fee' => $fee,
        ]);
        
        User::where('id', $user_id)->update(['balance' => $new_balance]);


        // $trx = new Transaction();
        // if (session('sess_user_id')) {
        //     $user_id = Session::get('sess_user_id');
        // }
        // $trx->user_id = $user_id;
        // $trx->transaction_type = $request->transaction_type;
        // $trx->amount = $request->amount;
        // $trx->fee = $request->fee;
        // $trx->save();

        // $user = User::find($user_id);
        // $balance = $user->balance;
        // $updateData = [
        //     'balance' => $balance + $request->amount,
        // ];

        // DB::table('users')->where('id', '=', $user_id)->update($updateData);

        return Redirect::route('deposit');
    }

    public function withdrawal_transaction()
    {
    }

    public function withdrawal(Request $request)
    {
        $amount = $request->amount;
        $transaction_type = $request->transaction_type;
        $fee = $request->fee;
        $user_id = Session::get('sess_user_id');

        $balance = DB::select("select balance from users where id='$user_id'");
        $new_balance = $balance[0]->balance - $amount;
        
        Transaction::create([
            'user_id' => $user_id,
            'transaction_type' => $transaction_type,
            'amount' => $amount,
            'fee' => $fee,
        ]);
        
        User::where('id', $user_id)->update(['balance' => $new_balance]);

        return Redirect::route('withdrawal');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create_trx');
    }

    public function create_wdr()
    {
        return view('transaction.create_wdr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
