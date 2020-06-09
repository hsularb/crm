<?php

namespace App\Http\Controllers;

use App\Note;
use App\Project;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Note::all();
        return view('backend.note.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Project::all();
        return view('backend.note.create',compact('data'));
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
            'note' => 'required|max:255',
            'project_id' => 'required',
        ]);
        
        Note::create($validatedData);

        return redirect('note')->withStatus(__('Note successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Note::find($id);
        $project = Project::all();
        return view('backend.note.edit',compact('data','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'note' => 'required|max:255',
            'project_id' => 'required',
        ]);

        Note::whereId($id)->update($validatedData);

        return redirect('note')->withStatus(__('Note successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $data = Note::find($id);
        $data->delete();

        return redirect('note')->withStatus(__('Note successfully deleted.'));
    }
}
