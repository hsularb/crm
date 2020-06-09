<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use App\ProjectStatus;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();
        return view('backend.project.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = ProjectStatus::all();
        $client = Client::all();
        return view('backend.project.create',compact('status','client'));
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
            'description' => 'required',
            'start_date' => 'required',
            'budget' => 'required',
            'client_id' => 'required',
            'status_id' => 'required',
        ]);
        
        Project::create($validatedData);

        return redirect('project')->withStatus(__('Project successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project::find($id);
        $client = Client::all();
        $status = ProjectStatus::all();
        return view('backend.project.edit',compact('data','client','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update',$request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required',
            'budget' => 'required',
            'client_id' => 'required',
            'status_id' => 'required',
        ]);

        Project::whereId($id)->update($validatedData);

        return redirect('project')->withStatus(__('Project successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Project::find($id);
        $data->delete();

        return redirect('project')->withStatus(__('Project successfully deleted.'));
    }
}
