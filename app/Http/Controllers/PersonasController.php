<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Htpp\Request\SavePersonaRequest;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::get();
        return view('personas.personas', compact('personas'));

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
        $personas = new Persona();

        $request->validate([
            'perCurp' => 'required',
            'perApellido1' => 'required',
            'perNombre' => 'required',
            'perSexo' => 'required'
        ]);

        $fecha_nacimiento = $request->input('perFechaNac');
        $date = date("Y-m-d", strtotime($fecha_nacimiento));

        $personas->perCurp = $request->input('perCurp');
        $personas->perApellido1 = $request->input('perApellido1');
        $personas->perApellido2 = $request->input('perApellido2');
        $personas->perNombre = $request->input('perNombre');
        $personas->perFechaNac = $date;
        $personas->perSexo = $request->input('perSexo');
        $personas->perCorreo1 = $request->input('perCorreo1');

        $personas->save();
        $notification = array(
            'message' => 'Persona agregada',
            'alert-type' => 'nuevo'
        );
        return redirect()->route('personas')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'perCurp2' => 'required',
            'perApellido12' => 'required',
            'perNombre2' => 'required',
            'perSexo2' => 'required'
        ]);

        $fecha_nacimiento = $request->input('perFechaNac');
        $date = date("Y-m-d", strtotime($fecha_nacimiento));

        $personas = Persona::findOrFail($request->id_p);
        $personas->perCurp = $request->input('perCurp2');
        $personas->perApellido1 = $request->input('perApellido12');
        $personas->perApellido2 = $request->input('perApellido22');
        $personas->perNombre = $request->input('perNombre2');
        $personas->perFechaNac = $date;
        $personas->perSexo = $request->input('perSexo2');
        $personas->perCorreo1 = $request->input('perCorreo12');

        $personas->save();
        $notification = array(
            'message' => 'Persona actualizada',
            'alert-type' => 'actualizar'
        );
        return redirect()->route('personas')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas)
    {
        //
    }
}