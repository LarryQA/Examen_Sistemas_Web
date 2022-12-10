<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClasesController extends Controller
{
    public function indexImpartidas()
    {

        //Obtiene todas las clases impartidas
        $clases = Clase::whereHas('users', function ($q) {
            $q->where('enrollments.user_id', Auth::id())
                ->where('enrollments.estado_id', 1)
                ->where('enrollments.role_id', 1)
                ->orWhere('enrollments.role_id', 2);
        })->get();


        return view('clases.index', ['clases' => $clases,  'master' => true]);
    }

    public function indexRecibidas()
    {
        $clases = Clase::whereHas('users', function ($q) {
            $q->where('enrollments.user_id', Auth::id())
                ->where('enrollments.role_id', 3)
                ->where('enrollments.estado_id', 1);
        })->get();
        return view('clases.index', ['clases' => $clases, 'master' => false]);
    }

    public function show()
    {
        return view('clases.nueva-clase');
    }

    public function showClase($id)
    {
        $clase = Clase::find($id);
        DB::enableQueryLog();
        $assignments = $clase->assignments()->with('user:id,primer_nombre,primer_apellido')->get();
        $queries = DB::getQueryLog();
        
        $roleId = User::find(Auth::id())->clases()->where('clases.id', $id )->first()->pivot->role_id;
        

        return view('clases.show', ['clase' => $clase, 'roleId' => $roleId, 'claseId' => $id, 'assignments' => $assignments]);
    }

    public function showUnirse()
    {
        return view('clases.unirse');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_clase' => 'required|min:3',
            'descripcion_clase' => 'nullable|max:100',
            'grado_clase' => 'nullable',
            'seccion_clase' => 'nullable',
        ]);

        $clase = Clase::firstOrCreate(
            ['codigo_clase' => uniqid()],
            ['nombre_clase' => $request->nombre_clase, 'descripcion_clase' => $request->descripcion_clase,
            'grado_clase' => $request->grado_clase, 'seccion_clase' => $request->seccion_clase,]
        );

        // $clase = new Clase;
        // $clase->codigo_clase = uniqid();
        // $clase->titulo_clase = $request->titulo_clase;
        // $clase->descripcion_clase = $request->titulo_clase;
        // $clase->save();
        $clase->users()->attach(Auth::id(), ['role_id' => 1, 'estado_id' => 1]);

        //return route('clase-show',['id'=>$clase->id]);

        return redirect()->route('clase-show', ['id' => $clase->id]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'codigo_clase' => 'required|min:13|max:13',
        ]);

        
        $user = User::find(Auth::id());
        

        $clase = Clase::where('codigo_clase', $request->codigo_clase)->first();
        
        $mismaClase = Clase::where('codigo_clase', $request->codigo_clase)->whereHas('users', function ($q){
            $q->where('enrollments.user_id', Auth::id());
        })->first();
        
        if($mismaClase != null){
            return redirect()->route('clase-unirse')->with('error','Ya te has unido a esta clase.');
        }
        else{

            $clase->users()->attach(Auth::id(), ['role_id' => 3, 'estado_id' => 1]);

            return redirect()->route('clase-show', [$clase->id])
            ->with('success', '¡Bienvenido(a) a '.$clase->nombre_clase.' '.$user->primer_nombre.'!');
        }
    }
}
