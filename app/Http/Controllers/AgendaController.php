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
use App\Models\AddPedamping;

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
        $agenda = Agenda::with('pendamping')->where('unit_id', Auth::user()->unit_id)->whereDate('tanggal', Carbon::now())->get();


        return view('agenda.index', compact('agenda', 'units'));
    }

// sestama
public function index_sestama(Request $request)
    {
        $units = Unit::all();
        // $user = Auth::user();
        // $addPendamping = AddPedamping::where('unit_id', '=', Auth::user()->unit_id)->get();
        $addPendamping = AddPedamping::where('unit_id', Auth::user()->unit_id)->get();

            $agendaIds = [];

            foreach ($addPendamping as $item) {
                // Akses relasi Agenda dan ambil agenda_id
                $agendaId = $item->agenda->id; // Sesuaikan dengan nama relasi Anda dan kolom agenda_id

                // Tambahkan agenda_id ke dalam array jika belum ada
                if (!in_array($agendaId, $agendaIds)) {
                    $agendaIds[] = $agendaId;
                }
            }
            $agenda = Agenda::with('pendamping')->where('id','=', $agendaIds)->whereDate('tanggal', Carbon::now())->get();
        // $agenda = Agenda::where('id', '=', $idAgenda)->get();
        // $agenda = Agenda::all();

        // dd($agenda);
        return view('agenda_all.index', compact('agenda', 'units'));
    }

    public function getDate(Request $request)
    {

            // $data['result'] = Agenda::whereBetween('tanggal',[$request->start, $request->end])
            //                         ->where('unit_id','=',Auth::user()->unit_id)
            //                         ->where('kategori','like','%'. $request->kategori . '%')
            //                         ->where('status','like','%'. $request->status . '%')
            //                         ->where('agenda','like','%'. $request->q . '%')
            //                         ->where('sifat','like','%'. $request->sifat . '%')
            //                         ->get();
                                    // dd($request->kategori);
         // Retrieve input values from the request
         $startDate = $request->input('start');
         $endDate = $request->input('end');
         $kategori = $request->input('kategori');
         $status = $request->input('status');
         $sifat = $request->input('sifat');
         $searchQuery = $request->input('q');

         // Query the database based on the input values
         $query = Agenda::query();

         if ($startDate) {
             $query->whereDate('tanggal', '>=', $startDate);
         }

         if ($endDate) {
             $query->whereDate('tanggal', '<=', $endDate);
         }

         if ($kategori) {
             $query->where('kategori', $kategori);
         }

         if ($status) {
             $query->where('status', $status);
         }

         if ($sifat) {
             $query->where('sifat', $sifat);
         }

         if ($searchQuery) {
             $query->where('agenda', 'LIKE', '%' . $searchQuery . '%');
             // Replace 'column_name' with the actual column name you want to search on
         }

         $data = $query->get();

         // Pass the results to the view
        //  return view('your_view', ['results' => $results]);


            // dd($data);
        return view('agenda.getdate', ['data' => $data]);
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
