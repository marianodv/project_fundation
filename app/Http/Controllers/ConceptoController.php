<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConceptoStoreRequest;
use App\Http\Requests\ConceptoUpdateRequest;
use App\Models\Concepto;
use App\Models\Movimiento;
use Illuminate\Http\Request;



use PDF;
use Carbon\Carbon;



class ConceptoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conceptos = Concepto::all();

        return view('concepto.index', compact('conceptos'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('concepto.create');
    }

    /**
     * @param \App\Http\Requests\ConceptoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConceptoStoreRequest $request)
    {
        $concepto = Concepto::create($request->validated());

        $request->session()->flash('concepto.id', $concepto->id);

        return redirect()->route('concepto.index');
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Concepto $concepto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Concepto $concepto)
    {
        $fcreadoMin    = $request->input('fcreadoMin');
        $fcreadoMax    = $request->input('fcreadoMax');

        $movimientos = Movimiento::deConcepto($concepto->nombre)
            ->when($fcreadoMin,   function ($query, $fcreadoMin)   {$query->where('created_at', '>=', $fcreadoMin);})
            ->when($fcreadoMax,   function ($query, $fcreadoMax)   {$query->where('created_at', '<=', $fcreadoMax);})
            ->paginate();
            //->get();


        //dd( $movimientos);
        return view('concepto.show', compact('concepto', 'movimientos', 'fcreadoMin', 'fcreadoMax'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Concepto $concepto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Concepto $concepto)
    {
        return view('concepto.edit', compact('concepto'));
    }

    /**
     * @param \App\Http\Requests\ConceptoUpdateRequest $request
     * @param \App\Models\Concepto $concepto
     * @return \Illuminate\Http\Response
     */
    public function update(ConceptoUpdateRequest $request, Concepto $concepto)
    {
        $concepto->update($request->validated());

        $request->session()->flash('concepto.id', $concepto->id);

        return redirect()->route('concepto.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Concepto $concepto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Concepto $concepto)
    {
        $concepto->delete();

        return redirect()->route('concepto.index');
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

        $result = Movimiento::deConcepto($name)->orderBy('created_at', 'DESC')->get();

        $model = 'Concepto';

        $pdf =  PDF::loadView('report', compact('name','result','model'));

        $PDFname = 'CONCEPTO-'. (string)$name . '-' .$now;

        return $pdf->stream($PDFname.'.pdf', ['Attachment' => false]);
    }
}
