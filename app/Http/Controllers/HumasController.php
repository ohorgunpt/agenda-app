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
        $agenda_id = Agenda::get();
        //Halaman data dukung
        $datahumas =  Datahumas::where('id', $agenda_id->id)->first();
        $listdatahumas = DB::table('agendas')
                        ->select('agendas.id','agendas.agenda','humas.agenda_id','datadukungs.nama_data_dukung','datadukungs.file')
                        ->leftJoin('datadukungs','datadukungs.agenda_id','=','agendas.id')
                        ->where('datadukungs.agenda_id','=',$agenda_id->id[0])
                        ->get();
        return view('data_dukung.index', compact('listdatadukung', 'datadukung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
