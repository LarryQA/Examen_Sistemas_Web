<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_clase',
        'nombre_clase',
        'descripcion_clase',
        'grado_clase',
        'seccion_clase',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'enrollments')->withPivot('role_id', 'estado_id');
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
    
}
