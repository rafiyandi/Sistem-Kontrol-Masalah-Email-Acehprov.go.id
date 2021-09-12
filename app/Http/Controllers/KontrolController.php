<?php

namespace App\Http\Controllers;

use App\Models\Kontrol;
use App\Models\Spka;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class KontrolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kontrol::with('skpa')->paginate(5);
        return view('pages.Kontrol.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Spka::all();
        return view('pages.Kontrol.create')->with([
            "items"=>$items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'server' => 'required|in:mail.acehprov.go.id,mail2.acehprov.go.id',
            'skpa_id' => 'required|exists:tb_dinas,id',
            'deskripsi_masalah' => 'required|string',
            'kategori' => 'required|in:spam,server',
            'deskripsi_penyelesaian' => 'required|string',
            'koordinasi' => 'required|string',
            'ket' => 'required|string'
        ]);

        $data = $request->all();
        $data['tgl'] = Carbon::now();
        $data['jam'] = date('H:i:s');

        Kontrol::create($data);

        return redirect()->route('kontrol.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kontrol::findOrFail($id);

        return view('pages.Kontrol.update')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'server' => 'in:mail.acehprov.go.id,mail2.acehprov.go.id',
            'deskripsi_masalah' => 'string',
            'kategori' => 'in:spam,server',
            'deskripsi_penyelesaian' => 'string',
            'koordinasi' => 'string',
            'ket' => 'string'
        ]);
        $kontrol = Kontrol::findOrFail($id);

        $data = $request->all();
        $data['tgl'] = Carbon::now();
        $data['jam'] = date('H:i:s');


        $kontrol->fill($data);
        $kontrol->save();

        return redirect()->route('kontrol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kontrol::findOrFail($id)->delete();
        return redirect()->route('kontrol.index');
    }

public function generatePDF()
    {
        $data = Kontrol::with('skpa')->get();

        $pdf = PDF::loadView('pdfKontrol', ['data' => $data]);
        return $pdf->stream();
    }

}
