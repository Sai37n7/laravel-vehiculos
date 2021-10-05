<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se obtienen todos los vehiculos en la base de datos.
        $vehiculos = Vehiculo::all();
        return response()->json(['vehiculos' => $vehiculos], 200);
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
        try {
            DB::beginTransaction();
            // Si existe un ID igual a 0 se crea un nuevo vehiculo
            // de lo contrario se actualiza el vehiculo con el ID dado.
            if($request->id==0){
                $vehiculo = new Vehiculo($request->all());
                $vehiculo->save();
            }else{
                $vehiculo = Vehiculo::find($request->id);
                $vehiculo->fill($request->all())->save();
            }
            DB::commit();
            return response()->json(['status' => 'ok'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return response()->json(['status' => $e], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Se elimina el vehiculo con el ID proporcionado.
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return response()->json(['status' => 'ok'], 200);
    }
}
