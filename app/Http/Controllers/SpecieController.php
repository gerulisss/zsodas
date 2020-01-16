<?php

namespace App\Http\Controllers;

use App\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Specie::all();
       return view('specie.index', ['species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specie = new Specie;
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index')->with('success_message', 'Nauja rusys '.$specie->name.' buvo prideta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function edit(Specie $specie)
    {
        return view('specie.edit', ['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specie $specie)
    {
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index')->with('success_message', 'Rusies pavadinimas '.$specie->name.' buvo pakeistas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specie $specie)
    {

    if(!$specie->manager->count() && !$specie->animal->count()) {
        $specie->delete();
    }
    else {
        if($specie->manager->count() && !$specie->animal->count()) {
            return redirect()->route('specie.index', ['manager', $specie])->with('info_message', 'Trinti negalima, nes turi priziuretoja');
        }
        return redirect()->route('specie.index', ['animal', $specie])->with('info_message', 'Trinti negalima, nes turi gyvunu');
    }
    return redirect()->route('specie.index')->with('success_message', 'Species '.$specie->name.' was deleted!');


    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
