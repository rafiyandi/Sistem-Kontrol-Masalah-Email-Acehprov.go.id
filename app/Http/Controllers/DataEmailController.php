<?php

namespace App\Http\Controllers;

use App\Models\DataEmail;
use App\Models\Spka;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use DataTables;

class DataEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getKd_dinas(Request $request)
    {
        $kd_dinas = Spka::where('Kd_dinas', '=', $request->Kd_dinas)->count();
        if (!$kd_dinas == 1) {
            return "&#10060; Kode Dinas tidak tersedia";
        } else {
            return "&#10004; Kode Dinas tersedia";
        }
    }

    public function generatePDF()
    {
        $data = DataEmail::all();

        $pdf = PDF::loadView('myPDF', ['data' => $data]);
        return $pdf->stream();
    }

    public function list()
    {
        $data = DataEmail::all();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="data-email/edit/' . $data->id . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a> <form action="data-email/hapus/' . $data->id . '" method="delete"> ' . csrf_field() . ' <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash mt-2"></i></button></form>';
            })
            ->make(true);
    }

    public function index(Request $request)
    {

        return view('pages.DataEmail.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DataEmail.create');
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
            'ni' => 'required|integer',
            'nama_p' => 'required|string',
            'Kd_dinas' => 'required|exists:tb_dinas,Kd_dinas',
            'gd' => 'required',
            'gb' => 'required',
            'hp' => 'required|integer',
            'nama_e' => 'required|email',
            'jabatan' => 'required',
            'jenis' => 'required',
            'gol' => 'required',
        ], [
            'Kd_dinas.required' => 'testes'
        ]);

        $data = $request->all();
        $data['tanggal'] = Carbon::now();
        DataEmail::create($data);
        return redirect()->route('data-email.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DataEmail::findOrFail($id);
        return view('pages.DataEmail.update')->with([
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
            'ni' => 'required|integer',
            'nama_p' => 'required|string',
            'Kd_dinas' => 'required|exists:tb_dinas,Kd_dinas',
            'gd' => 'required',
            'gb' => 'required',
            'hp' => 'required|integer',
            'nama_e' => 'required|email',
            'jabatan' => 'required',
            'jenis' => 'required',
            'gol' => 'required',
        ]);

        $data = $request->all();
        $data['tanggal'] = Carbon::now();
        $DataEmail = DataEmail::findOrFail($id);

        $DataEmail->update($data);
        return redirect()->route('data-email.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DataEmail = DataEmail::findOrFail($id);
        $DataEmail->delete();
        return redirect()->route('data-email.index');
    }
}
