<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimientoStoreRequest;
use App\Http\Requests\MovimientoUpdateRequest;
use App\Models\Movimiento;
use App\Models\Alumno;
use App\Models\Caja;
use App\Models\Actividad;
use App\Models\Concepto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fid           = $request->input('fid');
        $fmontoMin     = $request->input('fmontoMin');
        $fmontoMax     = $request->input('fmontoMax');
        $fdescripcion  = $request->input('fdescripcion');
        $fcreadoMin    = $request->input('fcreadoMin');
        $fcreadoMax    = $request->input('fcreadoMax');
        $factividad    = $request->input('factividad');
        $factCategoria = $request->input('factCategoria');
        $fcaja         = $request->input('fcaja');
        $fconcepto     = $request->input('fconcepto');
        $falumno       = $request->input('falumno');
        $movimientos = Movimiento::
              when($fid,          function ($query, $fid)          {$query->where('id', $fid);})
            ->when($fmontoMin,    function ($query, $fmontoMin)    {$query->where('monto', '>=', $fmontoMin);})
            ->when($fmontoMax,    function ($query, $fmontoMax)    {$query->where('monto', '<=', $fmontoMax);})
            ->when($fdescripcion, function ($query, $fdescripcion) {$query->where('descripcion', 'LIKE', "%{$fdescripcion}%");})
            ->when($fcreadoMin,   function ($query, $fcreadoMin)   {$query->where('created_at', '>=', $fcreadoMin);})
            ->when($fcreadoMax,   function ($query, $fcreadoMax)   {$query->where('created_at', '<=', $fcreadoMax);})
            ->deActividad($factividad)
            ->deCategoria($factCategoria)
            ->deConcepto($fconcepto)
            ->deCaja($fcaja)
            ->deAlumno($falumno)
            ->paginate(10);

        return view('movimiento.index', compact('movimientos','fid','fmontoMin','fmontoMax','fdescripcion','fcreadoMin','fcreadoMax','factividad','fcaja','fconcepto','falumno','factCategoria'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $actividads = Actividad::all();
        $alumnos = Alumno::all();
        $cajas = Caja::all();
        $conceptos = Concepto::all();
        return view('movimiento.create', compact('actividads','alumnos','cajas','conceptos'));
    }

    /**
     * @param \App\Http\Requests\MovimientoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovimientoStoreRequest $request)
    {
        $movimiento = Movimiento::create($request->validated());

        $request->session()->flash('movimiento.id', $movimiento->id);

        return redirect()->route('movimiento.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Movimiento $movimiento)
    {
        return view('movimiento.show', compact('movimiento'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Movimiento $movimiento)
    {
        return view('movimiento.edit', compact('movimiento'));
    }

    /**
     * @param \App\Http\Requests\MovimientoUpdateRequest $request
     * @param \App\Models\Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(MovimientoUpdateRequest $request, Movimiento $movimiento)
    {
        $movimiento->update($request->validated());

        $request->session()->flash('movimiento.id', $movimiento->id);

        return redirect()->route('movimiento.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Movimiento $movimiento)
    {
        $movimiento->delete();

        return redirect()->route('movimiento.index');
    }
}
