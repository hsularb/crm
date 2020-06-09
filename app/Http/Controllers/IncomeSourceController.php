<?php

namespace App\Http\Controllers;

use App\IncomeSource;
use Illuminate\Http\Request;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IncomeSource::all();
        return view('backend.incomeSource.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.incomeSource.create');
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
            'name' => 'required',
            'fee_percent' => 'required'
        ]);

        IncomeSource::create($validatedData);

        return redirect('incomesource')->withStatus(__('Status successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeSource $incomeSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = IncomeSource::find($id);
        return view('backend.incomeSource.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'fee_percent' => 'required'
        ]);

        IncomeSource::whereId($id)->update($validatedData);

        return redirect('incomesource')->withStatus(__('Status successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = IncomeSource::find($id);
        $data->delete();

        return redirect('incomesource')->withStatus(__('Status successfully deleted.'));
    }
}
