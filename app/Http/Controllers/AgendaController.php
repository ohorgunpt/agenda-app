<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Datadukung;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Sambutan;
use App\Models\Pointer;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kita test master bladenya
        $agenda = Agenda::all();
        return view('agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unit = Unit::all(); //select * from unit
        return view('agenda.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Function add to database
        //menampilkan pesan error apabila tidak diisi
        $this->validate($request, [
            'agenda' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'pendamping' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'unit_id' => 'required'
        ]);
        //mengambil data dari form
        //$nama_satker = $-POST ['nama_satker'];
        $input = $request->all();
        //insert data ke table balai
        //INSERT INTO balai (nama_satker) VALUES ('$nama_satker);
        $agenda_id = Agenda::create($input);
        $agenda = Agenda::findOrFail($agenda_id->id);

        // foreach ($request->agenda_id as $unit_id) {
        //     $sambutan = new Sambutan;
        //     $sambutan->agenda_id = $agenda_id->id;
        //     $sambutan->unit_id = $unit_id->keterangan;
        //     dd($sambutan);
        // }
        Sambutan::create(
            [
                'agenda_id' => $agenda->id,
                'sambutan' => $request->sambutan,
                'keterangan' => $request->keterangan
            ]
        );
        Pointer::create([
            'agenda_id' => $agenda->id,
            'pointer' => $request->pointer,
            'keterangan' => $request->keterangan
        ]);


        // $sambutan = new Sambutan();

        // $sambutan->agenda_id = $agenda->id;
        // $sambutan->sambutan = $request->sambutan;
        // $sambutan->keterangan = $request->keterangan;
        // $sambutan->save();

        //redirect to index balai
        return redirect()->route('agenda.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    public function showdetail($id)
    {

        $datadukung = Datadukung::all();
        $agenda = Agenda::findOrFail($id);
        $sambutan = Sambutan::where('id', $agenda->id)->first();
        return view('agenda.showdetail', compact('datadukung','agenda','sambutan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //passing to edit page
        $agenda = Agenda::find($id);
        $units = Unit::all();
        //redirect to edit page
        return view('agenda.edit', compact('agenda', 'units'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update data unit
        $this->validate($request, [
            'agenda' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'pendamping' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'unit_id' => 'required'
        ]);
        $agenda = Agenda::find($id);
        $agenda->agenda = $request->input('agenda');
        $agenda->kategori = $request->input('kategori');
        $agenda->tanggal = $request->input('tanggal');
        $agenda->mulai = $request->input('mulai');
        $agenda->selesai = $request->input('selesai');
        $agenda->pendamping = $request->input('pendamping');
        $agenda->keterangan = $request->input('keterangan');
        $agenda->status = $request->input('status');
        $agenda->unit_id = $request->input('unit_id');
        //save/update
        $agenda->save();
        //dd($unit);
        return redirect()->route('agenda.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Agenda::destroy($id);
        //redirect to index agenda
        return redirect()->route('agenda.index')->with('success', 'Data berhasil dihapus');
    }
}
