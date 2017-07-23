<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use App\Repositories\EntryRepository as EntryRepository;
use App\Entry;
use App\Genre;
use App\Http\Controllers\Admin\Controller;

class PagesController extends Controller

{
    private $entry;

    public function __construct(
            EntryRepository $entry
        ){
        $this->entry=$entry;
    }

    public function index()
    {
        $entry= $this->entry->all();
        return view('layouts.index',compact('entry'));
    }
   
    public function movie()
    {
        $entries=Entry::where('entry_type_id_id','=','1')->paginate(3);
        return view('entry.movie',compact('entries'));
    }

    public function tvshow()
    {
        $entries=Entry::where('entry_type_id_id','=','2')->paginate(3);
        return view('entry.tvShow',compact('entries'));
    }

    public function newEntry(){
        $movie=Entry::latest()->where('entry_type_id_id','=','1')->get();
        $tvshow=Entry::latest()->where('entry_type_id_id','=','2')->get();
        $entry=Entry::all();
        return view('entry.new',compact(['movie','tvshow','entry']));
    }

    public function show($entry)
    {
        $entry= Entry::find($entry);
        return view('entry.show', compact('entry'));
    }

    public function showGenre($genre){
        $genre=Genre::whereIn('name', [$genre])->with('entry')->get();
        return view('entry.genre',compact('genre'));
    }
    
    public function store(Request $request)
    {
        //
    }

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
        //
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
