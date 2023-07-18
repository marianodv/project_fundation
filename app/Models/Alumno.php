<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'nacimiento',
        'mail',
        'dni',
        'telefono',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nacimiento' => 'date',
    ];

    //Query Scope


    public function scopeNombre($query, $nombre)
    {
        if($nombre)
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }

    public function scopeApellido($query, $apellido)
    {
        if($apellido)
        return $query->where('apellido', 'LIKE', "%$apellido%");
    }

    public function scopeMail($query, $mail)
    {
        if($mail)
        return $query->where('mail', 'LIKE', "%$mail%");
    }

    public function scopeDni($query, $dni)
    {
        if($dni)
            return $query->where('dni', 'LIKE', "%$dni%");
    }

}
