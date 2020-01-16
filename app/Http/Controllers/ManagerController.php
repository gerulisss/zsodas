<?php

namespace App\Http\Controllers;
use App\Manager;
use Illuminate\Http\Request;
use App\Specie;
use Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::all();
       return view('manager.index', ['managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
       return view('manager.create', ['species' => $species]);
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
        'manager_name' => ['required', 'min:3', 'max:64']
        ],
        [
            'manager_name.required' => 'Prasome uzpildyti name laukeli'
         ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->route('manager.create')->withErrors($validator);

        }
        
        $manager = new Manager;
       $manager->name = $request->manager_name;
       $manager->surname = $request->manager_surname;
       $manager->specie_id = $request->specie_id;
       $manager->save();
       return redirect()->route('manager.index')->with('success_message', 'Naujas priziuretojas '.$manager->name.' '.$manager->surname.' buvo pridetas');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $species = Specie::all();
       return view('manager.edit', ['manager' => $manager, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Priziuretojo duomenys '.$manager->name.' '.$manager->surname.' sekmingai atnaujinti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        if(!$manager->animal->count()) {
            $manager->delete();
        }
        else {
            if($manager->animal->count()) {
                return redirect()->route('manager.index', ['animal', $manager])->with('info_message', 'Negalima trinti, nes turi gyvunu');
            }
        }
        return redirect()->route('manager.index')->with('success_message', 'Priziuretojas '.$manager->name.' sekmingai istrintas');

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
