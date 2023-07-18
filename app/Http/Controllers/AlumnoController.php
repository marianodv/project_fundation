<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoStoreRequest;
use App\Http\Requests\AlumnoUpdateRequest;
use App\Models\Alumno;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AlumnoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $deletes = $request->get('deletes');

        $nombre= $request->get('nombre');
        $apellido= $request->get('apellido');
        $mail= $request->get('mail');
        $dni= $request->get('dni');

        if ($deletes) {

            $alumnos = Alumno::nombre($nombre)
                ->apellido($apellido)
                ->mail($mail)
                ->dni($dni)
                ->onlyTrashed()
                ->paginate(10);

            return view('alumno.index', compact('alumnos','nombre','apellido','mail','dni','deletes'));

        }else {

            $alumnos = Alumno::nombre($nombre)
                ->apellido($apellido)
                ->mail($mail)
                ->dni($dni)
                ->whereNull('deleted_at')
                ->paginate(10);

            return view('alumno.index', compact('alumnos','nombre','apellido','mail','dni','deletes'));

        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('alumno.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function individual(AlumnoStoreRequest $request)
    {

        $request->validated();
        try {
            $dni = $request->input('dni');

            $alumno = Alumno::where('dni','=',$dni)->firstOrFail();

            $preview = Movimiento::where('alumno_id','=',$alumno->id)->limit(10)->get();

            return view('alumno.preview', compact('alumno','preview'));

        } catch (\Throwable $th) {

            return view('errors.DBNotFound');
        }

    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request, $id)
    {
        $setNow = Carbon::now();
        $now = $setNow->toDateTimeString();

        $alumno = Alumno::where("id", $id)->first();

        $result = Movimiento::where('alumno_id','=',$alumno->id)->orderBy('created_at', 'DESC')->get();

        $pdf =  PDF::loadView('alumno.report', compact('alumno','result'));

        $name = (string)$alumno->apellido . '-' .$now;

        return $pdf->stream(trim($name).'.pdf', ['Attachment' => false]);
    }


    /**
     * @param \App\Http\Requests\AlumnoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoStoreRequest $request)
    {
        $alumno = Alumno::create($request->validated());

        $request->session()->flash('alumno.id', $alumno->id);

        return redirect()->route('alumno.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Alumno $alumno)
    {
        return view('alumno.show', compact('alumno'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Alumno $alumno)
    {
        return view('alumno.edit', compact('alumno'));
    }

    /**
     * @param \App\Http\Requests\AlumnoUpdateRequest $request
     * @param \App\Models\Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoUpdateRequest $request, Alumno $alumno)
    {
        $alumno->update($request->validated());

        $request->session()->flash('alumno.id', $alumno->id);

        return redirect()->route('alumno.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumno.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, int $id)
    {

        $alumno = Alumno::withTrashed()->find($id);
        $alumno->restore();

        return redirect()->route('alumno.index');
    }
}
