<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Project;
use App\Currency;
use App\IncomeSource;
use App\TransactionType;
use App\Users;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::all();
        // dd($data);
        return view('backend.transaction.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        $currency = Currency::all();
        $income = IncomeSource::all();
        $type = TransactionType::all();
        return view('backend.transaction.create',compact('project','currency','income','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(auth()->id());
        $validatedData = $request->validate([
            'amount' => 'required',
            'transaction_date' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'currency_id' => 'required',
            'income_source_id' => 'required',
            'transaction_type_id' => 'required'
        ]);
        
        Transaction::create($validatedData + ['user_id' => auth()->id()]);

        return redirect('transaction')->withStatus(__('Transaction successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaction::find($id);
        $project = Project::all();
        $currency = Currency::all();
        $income = IncomeSource::all();
        $type = TransactionType::all();
        return view('backend.transaction.edit',compact('data','project','currency','income','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount' => 'required',
            'transaction_date' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'currency_id' => 'required',
            'income_source_id' => 'required',
            'transaction_type_id' => 'required'
        ]);

        Transaction::whereId($id)->update($validatedData+ ['user_id' => auth()->id()]);

        return redirect('transaction')->withStatus(__('Transaction successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::find($id);
        $data->delete();

        return redirect('transaction')->withStatus(__('Transaction successfully deleted.'));
    }
}
