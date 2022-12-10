<?php

namespace App\Models;

use App\Models\Recurso;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_asignacion',
        'descripcion_asignacion',
        'clase_id',
        'user_id',
    ];

    public function recursos(){
        return $this->hasMany(Recurso::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function usuarios(){
        return $this->belongsToMany(User::class, 'Trabajo');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
