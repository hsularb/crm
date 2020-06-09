<?php

namespace App\Http\Controllers;

use App\ClientStatus;
use Illuminate\Http\Request;

class ClientStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $data = ClientStatus::all();
        return view('backend.clientStatus.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clientStatus.create');
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
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);
        
        ClientStatus::create($validatedData);

        return redirect('clientstatus')->withStatus(__('Status successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientStatus  $clientStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ClientStatus $clientStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientStatus  $clientStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ClientStatus::find($id);
        return view('backend.clientStatus.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientStatus  $clientStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientStatus $clientStatus,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        ClientStatus::whereId($id)->update($validatedData);

        return redirect('clientstatus')->withStatus(__('Status successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientStatus  $clientStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientStatus $clientStatus,$id)
    {
        $data = ClientStatus::find($id);
        $data->delete();

        return redirect('clientstatus')->withStatus(__('Status successfully deleted.'));
    }
}
