<?php

namespace App\Http\Controllers;

use App\Models\Spka;
use Illuminate\Http\Request;

class SkpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Spka::simplePaginate(6);
        return view('pages.ekspa.index')->with([
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
        return view('pages.ekspa.create');
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
            'Kd_dinas' => 'required|string',
            'Nm_dinas' => 'required|string'
        ]);

        $data = $request->all();

        Spka::create($data);
        return redirect()->route('spka.index');
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
        $item = Spka::findOrFail($id);
        return view('pages.ekspa.update')->with([
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
            'Kd_dinas' => 'string',
            'Nm_dinas' => 'string'
        ]);

        $data = $request->all();
        $skpa =  Spka::findOrFail($id);
        $skpa->fill($data);
        $skpa->save();
        return redirect()->route('spka.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Spka::findOrFail($id);
        $item->delete();
        return redirect()->route('spka.index');
    }
}
