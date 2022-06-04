<?php

namespace App\Http\Controllers;

use App\Models\sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sambutan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function show(sambutan $sambutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ////passing to edit page
        $agenda = Sambutan::find($id);
        //redirect to edit page
        return view('sambutan.add', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //update data unit
        //  $this->validate($request,[
        //     'agenda' => 'required',
        //     'kategori' => 'required',
        //     'tanggal' => 'required',
        //     'mulai' => 'required',
        //     'selesai' => 'required',
        //     'pendamping' => 'required',
        //     'keterangan' => 'required',
        //     'status' => 'required',
        //     'unit_id' => 'required'
        // ]);
        // $agenda = Sambutan::find($id);
        // $agenda->agenda = $request->input('agenda');
        // $agenda->kategori = $request->input('kategori');
        // $agenda->tanggal = $request->input('tanggal');
        // $agenda->mulai = $request->input('mulai');
        // $agenda->selesai = $request->input('selesai');
        // $agenda->pendamping = $request->input('pendamping');
        // $agenda->keterangan = $request->input('keterangan');
        // $agenda->status = $request->input('status');
        // $agenda->unit_id = $request->input('unit_id');
        // //save/update
        // $agenda->save();
        // //dd($unit);
        // return redirect()->route('sambutan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function destroy(sambutan $sambutan)
    {
        //
    }
}
