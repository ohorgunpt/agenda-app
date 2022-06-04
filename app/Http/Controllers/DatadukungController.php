<?php

namespace App\Http\Controllers;

use App\Models\Datadukung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class DatadukungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Halaman data dukung
        $datadukung = Datadukung::all();
        return view ('data_dukung.index',compact('datadukung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ///redirect to create page
        return view('data_dukung.create');
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
        $this->validate($request,[
            'nama_data_dukung' => 'required',
            'keterangan' => 'required',
            'file' => 'nullable|file',
            'agenda_id' => 'required'
        ]);
        //deklarasi file
        $file_path = '';
        //jika ada file
        if($request->hasFile('file')){
            $file_path = $request->file('file')->store('file','public');
        }
        $input = Datadukung::create([
            'nama_data_dukung'=>$request->input('nama_data_dukung'),
            'agenda_id'=>$request->input('agenda_id'),
            'keterangan'=>$request->input('keterangan'),
            'file'=>$file_path
        ]);
        //redirect
        if(!$input){
            return redirect()->back()->with('Error Ada yang salah');
        }else{
            return redirect()->route('data_dukung.index')->with('success', 'Data berhasil ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datadukung  $datadukung
     * @return \Illuminate\Http\Response
     */
    public function show(Datadukung $datadukung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datadukung  $datadukung
     * @return \Illuminate\Http\Response
     */
    public function edit(Datadukung $datadukung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datadukung  $datadukung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datadukung $datadukung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datadukung  $datadukung
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Datadukung::destroy($id);
        //redirect to index personel
        return redirect()->route('data_dukung.index')->with('success', 'Data berhasil dihapus');
    }
}
