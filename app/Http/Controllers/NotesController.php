<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'title'=>'required|max:20|unique:notes,title',
            'body'=>'required|min:50'

            ]);

        $inputData=$request->all();
        Note::create($inputData);
        $notebookId=$request->notebook_id;//take values from form in create.blade.php
        return redirect()->route('notebooks.show',compact('notebookId'));
        //back(); redirect to previous page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note=Note::find($id);
        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note=Note::find($id);
        return view('notes.edit',compact('note'));
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
        $inputData=$request->all();
        $note=Note::find($id);
        $note->update($inputData);

        return redirect()->route('notebooks.show',$note->notebook_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::destroy($id);
        return back();
    }

    public function createNote($notebookId)
    {
        return view('notes.create')->with('id',$notebookId);
    }

}
