<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Humas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class HumasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $agenda_id = Agenda::get();
        //Halaman data dukung
        // $datahumas =  Humas::where('id', $agenda_id->id)->first();
        // $listdatahumas = DB::table('agendas')
        //                 ->select('agendas.id','agendas.agenda','humas.agenda_id','humas.deskripsi','humas.tautan','datadukungs.file')
        //                 // ->leftJoin('datadukungs','datadukungs.agenda_id','=','agendas.id')
        //                 // ->where('datadukungs.agenda_id','=',$agenda_id->id[0])
        //                 ->get();
        return view('humas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        //
        $agenda = Agenda::findOrFail($id);
        return view('humas.create', compact('agenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //deklarasi file
        $file_path = '';
        //cek apakah ada file yang diupload
        if($request->hasFile('file')){
            $file_path = $request->file('file')->store('humas','public');
        }

        $input =Humas::create([
            'agenda_id' => $request->agenda_id,
            'deskripsi' => $request->deskripsi,
            'tautan' => $request->tautan,
            'file' => $file_path,
        ]);

        if(!$input){
            return redirect()->back()->with('Error Ada yang salah');
        }else{
            // return redirect()->route('datadukung.showdatadukung')->with('success', 'Data berhasil ditambahkan');
            return redirect()->route('agenda.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Humas $humas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Humas $humas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Humas $humas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Humas $humas)
    {
        //
    }
}
