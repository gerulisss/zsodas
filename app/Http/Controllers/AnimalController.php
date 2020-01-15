<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use App\Manager;
use App\Specie;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return view('animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        $managers = Manager::all();
       return view('animal.create', ['species' => $species, 'managers' => $managers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal;
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Gyvunas '.$animal->name.' sekmingai sukurtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $species = Specie::all();
        $managers = Manager::all();
       return view('animal.edit', ['animal' => $animal,'species' => $species, 'managers' => $managers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Gyvuno duomenys '.$animal->name.' sekmingai atnaujinti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        if($animal->specie->count()){
            return 'Trinti negalima, nes turi priziuretoju';
        }
        $animal->delete();
        return redirect()->route('animal.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
