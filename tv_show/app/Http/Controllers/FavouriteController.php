<?php

namespace App\Http\Controllers;
use App\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$tvShows = Favourite::all();

        return view('favourites.index', compact('tvShows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('favourites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$request->validate([
            'Season'=>'required',
            'Episode'=>'required',
            'Quote'=>''
        ]);

        $contact = new Favourite([
            'Season' => $request->get('Season'),
            'Episode' => $request->get('Episode'),
            'Quote' => $request->get('Quote')
        ]);
        $contact->save();
        return redirect('/favourites')->with('success', 'saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$tvShow = Favourite::find($id);
        return view('favourites.edit', compact('tvShow'));       
    
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
		 $request->validate([
            'Season'=>'required',
            'Episode'=>'required',
            'Quote'=>''
        ]);

		$tvShow = Favourite::find($id);
		$tvShow->Season =  $request->get('Season');
        $tvShow->Episode = $request->get('Episode');
        $tvShow->Quote = $request->get('Quote');

        $tvShow->save();
		return redirect('/favourites')->with('success', 'updated!');
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
		 $tvShow = Favourite::find($id);
        $tvShow->delete();

        return redirect('/favourites')->with('success', 'deleted!');
    }
}
