<?php

namespace App\Http\Controllers;

use App\Models\AreaPersona;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener de AreaPersona la persona y el area en que la persona se encuentra o encontraba en un momento dado
        $personasDeAreas = AreaPersona::with(['persona', 'area'])
            ->orderBy('created_at', 'asc')
            ->get();

        //dd($personasDeAreas);
        //dd($personasDeAreas->first()->getAttributes());
        //dd($personasDeAreas->first()->persona->getAttributes());
        //dd($personasDeAreas->first()->area->getAttributes());
        
        return view('administrator.people.index', compact('personasDeAreas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $person)
    {
        //
    }
}