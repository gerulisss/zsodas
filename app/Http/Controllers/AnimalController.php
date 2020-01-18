<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use App\Manager;
use App\Specie;
use Validator;
use PDF;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $animals = Animal::all();
        // return view('animal.index', ['animals' => $animals]);

        if($request->filter) {
            $animals = Animal::where('manager_id', $request->filter)->get();
        }
        else {
            $animals = Animal::all();
        }

        if($request->sort) {
            if($request->sort == 'az') { 
                $animals = $animals->sortBy('title');
            }
            elseif($request->sort == 'za') { 
                $animals = $animals->sortByDesc('title');
            }
            elseif ($request->sort == 'azt') {
                $animals = $animals->sortByDesc('created_at');
            }
            elseif ($request->sort == 'zat') {
                $animals = $animals->sortBy('created_at');
            }


        }


        $managers = Manager::all();
        return view('animal.index', [
            'managers' => $managers,
            'animals' => $animals,
            'filter' => $request->filter ?? 0,
            'sortDef' => $request->sort ?? 'az',
            'sorts' => Animal::getSort()
            ]);
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

        $validator = Validator::make($request->all(),
        [
        'animal_birth_year' => ['required', 'min:4', 'max:4']
        ],
        [
            'animal_birth_year.required' => 'Prasome uzpildyti datos laukeli laukeli'
         ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->route('animal.create')->withErrors($validator);

        }

        $managerb_id = $request->manager_id;
        $speciesb_id = $request->specie_id;
        $managerbp = Manager::find($managerb_id);
        if ($managerbp->specie_id == $speciesb_id) {


        $animal = new Animal;
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Gyvunas '.$animal->name.' sekmingai sukurtas');
    }
  else {
    return redirect()->route('animal.create')->with('info_message', 'Pasirinktas blogai priziuretojas');
      }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return view('animal.show', ['animal' => $animal]);
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
        $managerb_id = $request->manager_id;
        $speciesb_id = $request->specie_id;
        $managerbp = Manager::find($managerb_id);
        if ($managerbp->specie_id == $speciesb_id) {


        $animal->name = $request->animal_name;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Gyvuno duomenys '.$animal->name.' sekmingai atnaujinti');
    }
else {
  return redirect()->route('animal.index')->with('info_message', 'Pasirinktas blogai priziuretojas');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animal.index')->with('info_message', 'Gyvunas '.$animal->name.' Sekmingai istrintas');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf(Animal $animal)
    {
        $pdf = PDF::loadView('animal.pdf', ['animal' => $animal]);
        return $pdf->download($animal->name.'.pdf');
    }
}
