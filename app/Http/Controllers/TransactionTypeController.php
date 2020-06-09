<?php

namespace App\Http\Controllers;

use App\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TransactionType::all();
        return view('backend.transactionType.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.transactionType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);
        
        TransactionType::create($validatedData);

        return redirect('transactiontype')->withStatus(__('Type successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionType $transactionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionType $transactionType,$id)
    {
        $data = TransactionType::find($id);
        return view('backend.transactionType.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        TransactionType::whereId($id)->update($validatedData);

        return redirect('transactiontype')->withStatus(__('Type successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionType $transactionType,$id)
    {
        $data = TransactionType::find($id);
        $data->delete();

        return redirect('transactiontype')->withStatus(__('Type successfully deleted.'));
    }
}
