<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Datadukung;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Personel;
use App\Models\User;
use App\Models\Sambutan;
use App\Models\Pointer;

use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = Unit::all();

        // $agenda = Agenda::where('unit_id','=',Auth::user()->unit_id)->get();
        $agenda = DB::table('agendas')
                  ->join('units','units.id','=','agendas.unit_id')
                   ->join('add_pedampings','add_pedampings.agenda_id','=','agendas.id')
                //    ->leftJoin('agendas','add_pedampings.user_id','=','users.id')
                  ->where('unit_id','=',Auth::user()->unit_id)
                  ->whereDate('tanggal','=', Carbon::now())
                  ->get();
                //   ->where('units.id','=',3)
                //   ->where('tanggal','=',Carbon::now())->get();
        // $agenda = Agenda::whereDate('tanggal',Carbon::now())->get();
        // dd($agenda);
        return view('agenda.index', compact('agenda', 'units'));
    }

// sestama
public function index_sestama(Request $request)
    {
        $units = Unit::all();

        $agenda = Agenda::where('unit_id','=',Auth::user()->unit_id)->get();

        $agenda = Agenda::all();

        return view('agenda_all.index', compact('agenda', 'units'));
    }

    public function getDate(Request $request)
    {
        //kategori
        // $category = Category::all();

        //agenda with text
        // if ($request->q) {
        //     $keyword = $request->input('q');
        //     $data = Agenda::where('agenda','like','%'. $keyword . '%');
        // }
        //tanggal

            $data['result'] = Agenda::whereBetween('tanggal',[$request->start, $request->end])->get();



        return view('agenda.getdate', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::all();//select * from kategori
        $unit = Unit::all(); //select * from unit
        $personel = Personel::all(); //select * from Personel
        $user = User::all(); //select * from Personel, tulisan 'User' dari model 'User'
        return view('agenda.create', compact('unit','category', 'personel', 'user'));
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
            'tempat' => 'required',
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
        $agenda = Agenda::findOrFail($id);
        $sambutan = Sambutan::where('id', $agenda->id)->first();
        $pointer = Pointer::where('id', $agenda->id)->first();
        // $datadukungagenda = Datadukung::where('id', $agenda->id)->first();
        // dd($datadukung);
        $datadukungagenda = DB::table('agendas')
                        ->select('agendas.id','agendas.agenda','datadukungs.agenda_id','datadukungs.nama_data_dukung','datadukungs.file', 'datadukungs.created_at')
                        ->leftJoin('datadukungs','datadukungs.agenda_id','=','agendas.id')
                        ->where('datadukungs.agenda_id','=',$agenda->id)
                        ->get();
                        // dd($datadukungagenda);
        $datahumas = DB::table('agendas')
                        ->select('agendas.id','agendas.agenda','humas.agenda_id','humas.deskripsi','humas.tautan','humas.file')
                        ->leftJoin('humas','humas.agenda_id','=','agendas.id')
                        ->where('humas.agenda_id','=',$agenda->id)
                        ->get();
        return view('agenda.showdetail', compact('datadukungagenda','agenda','sambutan','pointer','datahumas'));
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
        // $pendamping = AddPedamping::all("agenda_id", "=", $agenda->id)->first();
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
            'tempat' => 'required',
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
        $agenda->tempat = $request->input('tempat');
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
    public function search(Request $request)
    {
        $keyword = $request->search;
        $agendas = Agenda::where('tanggal', 'like', "%" . $keyword . "%")->paginate(5);
        return view('agenda.index_pencarian', compact('agendas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
