<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientStatus;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hello');
        $data = Client::all();
        return view('backend.client.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ClientStatus::all();
        return view('backend.client.create',compact('data'));
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
            'name' => 'required|max:255',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'address' => 'required',
            'status_id' => 'required',
        ]);
        
        Client::create($validatedData);

        return redirect('client')->withStatus(__('Client successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Client::find($id);
        $status = ClientStatus::all();
        return view('backend.client.edit',compact('data','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'address' => 'required',
            'status_id' => 'required',
        ]);

        Client::whereId($id)->update($validatedData);

        return redirect('client')->withStatus(__('Client successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Client::find($id);
        $data->delete();

        return redirect('client')->withStatus(__('Client successfully deleted.'));
    }
}
