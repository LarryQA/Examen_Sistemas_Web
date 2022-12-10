<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsignacionesController extends Controller
{

    public function create($id)
    {
        return view('asignaciones.create', ['claseId' => $id]);
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'titulo_asignacion' => 'required|min:3',
            'descripcion_asignacion' => 'nullable|max:100',
        ]);

        $asignacion = Assignment::create([
            'titulo_asignacion' => $request->titulo_asignacion,
            'descripcion_asignacion' => $request->descripcion_asignacion,
            'clase_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('asignaciones-show', ['asignacion' => $asignacion ->id, 'id' => $id]);
    }

    public function show($id, $claseId)
    {
        $asignacion = Assignment::find($id);
        $roleId = User::find(Auth::id())->clases()->where('clases.id', $claseId)->first()->pivot->role_id;
        
        //DB::enableQueryLog();
        //$roleId = User::find(Auth::id())->clases()->where('clases.id', $id )->first()->pivot->role_id;
        //$queries = DB::getQueryLog();
        return view('asignaciones.show', ['assignment' => $asignacion, 'roleId' => $roleId, 'claseId' => $claseId]);
    }


    public function edit($asignacionId, $id)
    {
        $asignacion = Assignment::find($asignacionId);
        return view('asignaciones.edit', [ 'asignacion' => $asignacion, 'claseId' => $id]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_asignacion' => 'required|min:3',
            'descripcion_asignacion' => 'nullable|max:100',
        ]);

        $asignacion = Assignment::find($id);
        $asignacion->titulo_asignacion = $request->titulo_asignacion;
        $asignacion->descripcion_asignacion = $request->descripcion_asignacion;
        $asignacion->save();

        $claseId = $asignacion->clase_id;

        return redirect()->route('asignaciones-show', ['asignacion' => $asignacion ->id, 'id' => $claseId])->with('success','La asignación ha sido actualizada');
    }

    public function destroy($id)
    {
        $asigancion = Assignment::find($id);
        $claseId = $asigancion->clase_id;
        $asigancion->delete();
        return redirect()->route('clase-show', ['id' => $claseId])->with('success','La asiganación ha sido eliminada.');
    }
}
