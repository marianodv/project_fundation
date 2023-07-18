<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monto',
        'descripcion',
        'actividad_id',
        'alumno_id',
        'caja_id',
        'concepto_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'monto' => 'decimal:2',
        'actividad_id' => 'integer',
        'alumno_id' => 'integer',
        'caja_id' => 'integer',
        'concepto_id' => 'integer',
    ];


    public function whereNullActividad($query)
    {
        return Movimiento::whereHas('actividad', function ($query) {
            $query->whereNull('deleted_at');
        });
    }


    public function alumno()
    {
        return $this->hasOne(Alumno::class, 'id', 'alumno_id');
    }

    public function actividad()
    {
        return $this->hasOne(Actividad::class, 'id', 'actividad_id');
    }

    public function caja()
    {
        return $this->hasOne(Caja::class, 'id', 'caja_id');
    }

    public function concepto()
    {
        return $this->hasOne(Concepto::class, 'id', 'concepto_id');
    }

    public function scopeDeActividad($query, $keyword = null)
    {
        return $query->whereHas('actividad', function ($query) use ($keyword) {
            $query->whereNull('deleted_at')
                ->when($keyword,   fn ($query, $keyword) => $query->where('nombre', 'LIKE', '%' . $keyword . '%'));
        });
    }

    public function scopeDeCategoria($query, $keyword = null)
    {
        return $query->whereHas('actividad', function ($query) use ($keyword) {
            $query->whereHas('categoria', function ($query) use ($keyword) {
                $query->whereNull('deleted_at')
                ->when($keyword,   fn ($query, $keyword) => $query->where('nombre', 'LIKE', '%' . $keyword . '%'));
                });
            });
    }

    public function scopeDeCaja($query, $keyword = null)
    {
        return  $query->whereHas('caja', function ($query) use ($keyword) {
            $query->whereNull('deleted_at')
                ->when($keyword,   fn ($query, $keyword) => $query->where('nombre', 'LIKE', '%' . $keyword . '%'));
        });
    }

    public function scopeDeConcepto($query, $keyword = null)
    {
        return  $query->whereHas('concepto', function ($query) use ($keyword) {
            $query->whereNull('deleted_at')
                ->when($keyword,   fn ($query, $keyword) => $query->where('nombre', 'LIKE', '%' . $keyword . '%'));
        });
    }

    public function scopeDeAlumno($query, $keyword = null)
    {
        if(!empty($keyword)){
            return  $query->whereHas('alumno', function ($query) use ($keyword) {
                $query->whereNull('deleted_at')
                    ->when($keyword,   fn ($query, $keyword) => $query->where('nombre', 'LIKE', '%' . $keyword . '%'));
            });
        }else{
            return  $query;
        }
    }
}
