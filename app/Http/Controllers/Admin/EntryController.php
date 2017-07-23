<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\EntryRepository as EntryRepo;
use App\Entry;
use App\User;
use App\Entries_genre;
use App\Entries_actor;  
use App\Genre;
use App\Actor;
class EntryController extends Controller
{
    

    public function showlist()
    {   
       $entries=Entry::orderBy('title','asc')->paginate(4);
        $user=auth()->user()->id;
        return view('entry.edit-list',compact(['entries','user']));
    }

   public function editForm($entry)
   {
        $entry=Entry::find($entry);
        return view('entry.edit',compact('entry'));
   }

    public function update(Request $request, $entry)
    {
        $entry=Entry::find($entry);
        $this->validate($request, [
                'title' => 'required',
                'release_year' => 'required',
                'rating' => 'required',
                'entry_type_id_id' => 'required',
                'synopsis' => 'required'
        ]);

        
        $img= $entry->image_url;

        //REPLACE PATH NAME ONLY IF INPUT FILE IS RECEIVED
        if(isset($request['img']))
        {

            //CREATE FILE NAME WITH THE FOLLOWING FORMAT -> TIMESTAMP.extension
            $imageName = str_replace(':', '', Carbon::now()) . '.' . 
                $request['img']->getClientOriginalExtension();

            //SAVE FILE TO PUBLIC FOLDER
            $request['img']->move(
                base_path() . '\\public\\img\\', $imageName
            );

            $img= '/img/'. $imageName;
        }

        $data=array(
            'title'=> $request['title'],
            'sysnopsis'=>$request['sysnopsis'],
            'image_url'=>$img,
            'release_year'=>$request['release_year'],
            'rating'=>$request['rating'],
            'entry_type_id_id'=>$request['entry_type_id_id']

            );
        $entry->update($data);

        if(isset($request['genre'])){
           // $entry->genres()->attach(array_values($request['genre']));
            foreach($request['genre'] as $genre){
                Entries_genre::update([
                    "genre_id" => $genre,
                    "entry_id" => $entry->id
                    ]);
            }
        }

        // if(count($request['actors'])===1){
        //     if($request['actors']!='divert'){
        //         $actors= 'not divert';
        //     }
        // }else{
        //     $actors= $request['actors'];
        //     $entry->actors()->attach(array_values($actors));
        // }

        return redirect('entry/edit-list');
    }

    public function delete()
    {
       $entries=Entry::orderBy('title','asc')->paginate(4);
       $user=auth()->user()->id;
        return view('entry.delete',compact(['user','entries']));
    }

    public function destroy($id)
    {
        $record=Entry::findOrFail($id);
        $record->delete();

        flash('Entry Deleted')->error();
        return redirect('entry/delete');
    }

    public function create(){
        return view('entry.create');
    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
                'title' => 'required',
                'release_year' => 'required',
                'rating' => 'required',
                'entry_type_id_id' => 'required',
                'synopsis' => 'required'
            ]);

        $img= '/img/default.png';

        //REPLACE PATH NAME ONLY IF INPUT FILE IS RECEIVED
        if(isset($request['img']))
        {

            //CREATE FILE NAME WITH THE FOLLOWING FORMAT -> TIMESTAMP.extension
            $imageName = str_replace(':', '', Carbon::now()) . '.' . 
                $request['img']->getClientOriginalExtension();

            //SAVE FILE TO PUBLIC FOLDER
            $request['img']->move(
                base_path() . '\\public\\img\\', $imageName
            );

            $img= '/img/'. $imageName;
        }

        $data= array_merge(request(['title', 'synopsis', 'release_year', 'rating', 'entry_type_id_id']), ['image_url'=> $img]);

        $entry= auth()->user()->entry()->save(new Entry($data));


        if(isset($request['genre'])){
           // $entry->genres()->attach(array_values($request['genre']));
            foreach($request['genre'] as $genre){
                Entries_genre::create([
                    "genre_id" => $genre,
                    "entry_id" => $entry->id
                ]);
            }
        }

         if(isset($request['actor'])){
            foreach($request['actor'] as $actor){
                Entries_actor::create([
                    "actor_id" => $actor,
                    "entry_id" => $entry->id
                ]);
            }
        }

        // if(count($request['actors'])===1){
        //     if($request['actors']!='divert'){
        //         $actors= 'not divert';
        //     }
        // }else{
        //     $actors= $request['actors'];
        //     $entry->actors()->attach(array_values($actors));
        // }

        return redirect('entry/edit-list');
    }
    
}
