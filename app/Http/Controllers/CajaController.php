<?php

namespace App\Http\Controllers;

use App\Http\Requests\CajaStoreRequest;
use App\Http\Requests\CajaUpdateRequest;
use App\Models\Caja;
use App\Models\Movimiento;
use Illuminate\Http\Request;

use PDF;
use Carbon\Carbon;

class CajaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cajas = Caja::all();

        return view('caja.index', compact('cajas'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('caja.create');
    }

    /**
     * @param \App\Http\Requests\CajaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CajaStoreRequest $request)
    {
        $caja = Caja::create($request->validated());

        $request->session()->flash('caja.id', $caja->id);

        return redirect()->route('caja.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caja $caja
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Caja $caja)
    {
        $fcreadoMin    = $request->input('fcreadoMin');
        $fcreadoMax    = $request->input('fcreadoMax');

        $movimientos = Movimiento::deCaja($caja->nombre)
            ->when($fcreadoMin,   function ($query, $fcreadoMin)   {$query->where('created_at', '>=', $fcreadoMin);})
            ->when($fcreadoMax,   function ($query, $fcreadoMax)   {$query->where('created_at', '<=', $fcreadoMax);})
            ->paginate();
            //->get();


        //dd( $movimientos);
        return view('caja.show', compact('caja', 'movimientos', 'fcreadoMin', 'fcreadoMax'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caja $caja
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Caja $caja)
    {
        return view('caja.edit', compact('caja'));
    }

    /**
     * @param \App\Http\Requests\CajaUpdateRequest $request
     * @param \App\Models\Caja $caja
     * @return \Illuminate\Http\Response
     */
    public function update(CajaUpdateRequest $request, Caja $caja)
    {
        $caja->update($request->validated());

        $request->session()->flash('caja.id', $caja->id);

        return redirect()->route('caja.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caja $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Caja $caja)
    {
        $caja->delete();

        return redirect()->route('caja.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request, $name)
    {
        $setNow = Carbon::now();
        $now = $setNow->format('d-m-Y-H-i');

        $result = Movimiento::deCaja($name)->orderBy('created_at', 'DESC')->get();

        $model = 'Caja';

        $pdf =  PDF::loadView('report', compact('name','result','model'));

        $PDFname = 'CAJA-'. (string)$name . '-' .$now;

        return $pdf->stream($PDFname.'.pdf', ['Attachment' => false]);
    }
}
