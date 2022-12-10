<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsuarioCorrecto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            $clase_id = $request->route('id');

            $clase = Clase::where('id', $clase_id)->first();

            if ($clase != null) {

                $claseUser = Clase::where('id', $clase_id)->whereHas('users', function ($q) {
                    $q->where('enrollments.user_id', Auth::id());
                })->first();

                // $claseUser = Clase::wherehas('users', function ($q) use($clase_id) {
                //     $q->where('enrollments.user_id', Auth::id())
                //     ->where('clases.id', $clase_id);
                // })->first();
                if ($claseUser != null) {

                    $claseUserActive = Clase::where('id', $clase_id)->whereHas('users', function ($q) {
                        $q->where('enrollments.user_id', Auth::id())
                            ->where('enrollments.estado_id', 1);
                    })->first();

                    if ($claseUserActive != null) {
                        return $next($request);
                    } else {
                        return redirect()->route('clase-unirse')->with('error', 'Tu inscripción a esta clase está desactivada,
                    comunícate con tu  profesor.');
                    }
                } 
                else {
                    return redirect()->route('clase-unirse')->with('error', 'No tienes acceso a esta clase, ingresa el código.');
                }
            } else {
                return redirect()->route('clase-unirse')->with('error', 'Clase no encontrada.');
            }
        }
        return redirect()->route('login')->with('error', 'Debes iniciar seción para acceder.');
    }
}
