  @extends('master')

  @section('title')
      <title>Data Agenda</title>
  @endsection

  @section('content')
      <section class="section">
          <div class="section-header">
              {{-- {{ Auth::user()->unit_id }} --}}
              @php
                  use App\Models\Unit;

                  $dataUnit = Unit::all();
              @endphp
              <h1>Data Agenda {{ Auth::user()->namaUnit->nama_unit }}</h1> {{-- <h1>Data Agenda  </h1> --}}
          </div>
          <div class="section-body">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          @if (Auth::user()->role == 'tu_kepala' || Auth::user()->role == 'tu_sestama')
                              <div class="card-header">
                                  <a href="{{ route('agenda.create') }}" class="btn btn-primary">Add Agenda</a>
                                  &nbsp;&nbsp;
                                  <form action="{{ route('agenda.getdate') }}" class="row" method="POST">
                                      @csrf
                                      <div class="col">
                                          <div class="input-group">
                                              <input type="date" name="start" class="form-control">

                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="input-group">
                                              <input type="date" name="end" class="form-control">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="input-group">
                                              <select name="" class="form-control" id="">
                                                  <option value="">Semua Kategori</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="input-group">
                                              <select name="" class="form-control" id="">
                                                  <option value="">Semua Status</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col">
                                          <input type="text" name="q" placeholder="Cari Disini ..."
                                              class="form-control">
                                      </div>
                                      <div class="col">
                                          <button class="btn btn-success" type="submit">Search...</button>
                                      </div>
                                  </form>
                              </div>
                          @elseif(Auth::user()->role == 'tu_deputi_1')
                              <div class="card-header">
                                  <a href="{{ route('agenda.create') }}" class="btn btn-primary">Add Agenda</a>
                              </div>
                          @elseif(Auth::user()->role == 'tu_sestama')
                              <div class="card-header">
                                  <a href="{{ route('agenda.create') }}" class="btn btn-primary">Add Agenda</a>
                              </div>
                          @endif

                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table.bordered">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Tanggal</th>
                                              <th>Agenda</th>
                                              <th>Kategori</th>
                                              <th>Tempat</th>
                                              <th>Mulai</th>
                                              <th>Selesai</th>
                                              <th>Pendamping</th>
                                              <th>Keterangan</th>
                                              <th>Status</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          @if (Auth::user()->role == 'tu_kepala' || Auth::user()->role == 'dsp' || Auth::user()->role == 'humas')
                                              {{-- <h1>{{$b->agenda}}</h1> --}}

                                              @foreach ($agenda as $a)
                                                  <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>{{ Carbon\Carbon::parse($a->tanggal) }}
                                                      </td>
                                                      <td>{{ $a->agenda }}</td>
                                                      <td>{{ $a->kategori }}</td>
                                                      <td>{{ $a->tempat }}</td>
                                                      <td>{{ $a->mulai }}</td>
                                                      <td>{{ $a->selesai }}</td>
                                                      <td>
                                                          <ul>
                                                              @foreach ($a->pendamping()->get() as $item)
                                                                  <li>{{ $item->namaUser->name }}</li>
                                                              @endforeach
                                                          </ul>

                                                      </td>



                                                      <td>{{ $a->keterangan }}</td>
                                                      <td>{{ $a->status }}</td>
                                                      <td>
                                                          @if (Auth::user()->role == 'tu_kepala')
                                                              <a href="{{ route('agenda.edit', $a->id) }}"
                                                                  class="btn btn-warning" title="Edit"><i
                                                                      class="fas fa-edit"></i></a>
                                                              <a href="{{ route('sambutan.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Sambutan"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('pointer.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Pointer"><i
                                                                      class="fas fa-folder-plus"></i></a>
                                                              <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Data Dukung"><i
                                                                      class="fas fa-file-upload"></i></a>
                                                              <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="List Data Dukung"><i
                                                                      class="fas fa-clipboard-list"></i></a>

                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                              <a href="{{ route('agenda.destroy', $a->id) }}"
                                                                  class="btn btn-danger" title="Hapus"><i
                                                                      class="fas fa-trash"></i></a>
                                                          @elseif(Auth::user()->role == 'tu_sestama')
                                                              <a href="{{ route('agenda.edit', $a->id) }}"
                                                                  class="btn btn-warning" title="Edit"><i
                                                                      class="fas fa-edit"></i></a>
                                                              <a href="{{ route('sambutan.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Sambutan"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('pointer.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Pointer"><i
                                                                      class="fas fa-folder-plus"></i></a>
                                                              <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Data Dukung"><i
                                                                      class="fas fa-file-upload"></i></a>
                                                              <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="List Data Dukung"><i
                                                                      class="fas fa-clipboard-list"></i></a>

                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                              <a href="{{ route('agenda.destroy', $a->id) }}"
                                                                  class="btn btn-danger" title="Hapus"><i
                                                                      class="fas fa-trash"></i></a>
                                                          @elseif (Auth::user()->role == 'dsp')
                                                              <a href="{{ route('sambutan.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Sambutan"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('pointer.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Pointer"><i
                                                                      class="fas fa-folder-plus"></i></a>
                                                              <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Data Dukung"><i
                                                                      class="fas fa-file-upload"></i></a>
                                                              <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="List Data Dukung"><i
                                                                      class="fas fa-clipboard-list"></i></a>

                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                          @elseif (Auth::user()->role == 'humas')
                                                              <a href="{{ route('humas.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Link Humas"><i class="fas fa-file-word"></i></a>


                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                          @elseif (Auth::user()->role == 'protokol')
                                                              <a href="{{ '#' }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Protokol menambahkan informasi detail"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                          @endif
                                                      </td>
                                                  </tr>
                                              @endforeach
                                              {{-- ===================================================== --}}
                                          @elseif (Auth::user()->role == 'tu_sestama')
                                              {{-- <h1>{{$b->agenda}}</h1> --}}

                                              @foreach ($agenda as $a)
                                                  <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>{{ Carbon\Carbon::parse($a->tanggal)->translatedFormat('l, d F Y') }}
                                                      </td>
                                                      <td>{{ $a->agenda }}</td>
                                                      <td>{{ $a->kategori }}</td>
                                                      <td>{{ $a->mulai }}</td>
                                                      <td>{{ $a->selesai }}</td>
                                                      <td>
                                                          <ul>
                                                              @foreach ($a->pendamping()->get() as $item)
                                                                  <li>{{ $item->namaUser->name }}</li>
                                                              @endforeach
                                                          </ul>
                                                      </td>
                                                      <td>{{ $a->keterangan }}</td>
                                                      <td>{{ $a->status }}</td>

                                                      <td>
                                                          @if (Auth::user()->role == 'tu_kepala')
                                                              <a href="{{ route('agenda.edit', $a->id) }}"
                                                                  class="btn btn-warning" title="Edit"><i
                                                                      class="fas fa-edit"></i></a>
                                                              <a href="{{ route('sambutan.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Sambutan"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('pointer.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Pointer"><i
                                                                      class="fas fa-folder-plus"></i></a>
                                                              <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Data Dukung"><i
                                                                      class="fas fa-file-upload"></i></a>
                                                              <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="List Data Dukung"><i
                                                                      class="fas fa-clipboard-list"></i></a>

                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                              <a href="{{ route('agenda.destroy', $a->id) }}"
                                                                  class="btn btn-danger" title="Hapus"><i
                                                                      class="fas fa-trash"></i></a>
                                                          @elseif(Auth::user()->role == 'tu_sestama')
                                                              <a href="{{ route('agenda.edit', $a->id) }}"
                                                                  class="btn btn-warning" title="Edit"><i
                                                                      class="fas fa-edit"></i></a>
                                                              <a href="{{ route('sambutan.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Sambutan"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('pointer.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Pointer"><i
                                                                      class="fas fa-folder-plus"></i></a>
                                                              <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Data Dukung"><i
                                                                      class="fas fa-file-upload"></i></a>
                                                              <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="List Data Dukung"><i
                                                                      class="fas fa-clipboard-list"></i></a>

                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                              <a href="{{ route('agenda.destroy', $a->id) }}"
                                                                  class="btn btn-danger" title="Hapus"><i
                                                                      class="fas fa-trash"></i></a>
                                                          @elseif (Auth::user()->role == 'dsp')
                                                              <a href="{{ route('sambutan.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Sambutan"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('pointer.input', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Pointer"><i
                                                                      class="fas fa-folder-plus"></i></a>
                                                              <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Tambah Data Dukung"><i
                                                                      class="fas fa-file-upload"></i></a>
                                                              <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="List Data Dukung"><i
                                                                      class="fas fa-clipboard-list"></i></a>

                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                          @elseif (Auth::user()->role == 'humas')
                                                              <a href="{{ '#' }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Link Humas"><i class="fas fa-file-word"></i></a>


                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                          @elseif (Auth::user()->role == 'protokol')
                                                              <a href="{{ '#' }}"
                                                                  class="btn btn-icon icon-left btn-warning"
                                                                  title="Protokol menambahkan informasi detail"><i
                                                                      class="fas fa-file-word"></i></a>
                                                              <a href="{{ route('agenda.showdetail', $a->id) }}"
                                                                  class="btn btn-primary" title="Detail"><i
                                                                      class="fas fa-folder-open"></i></a>
                                                          @endif
                                                      </td>
                                                  </tr>
                                              @endforeach
                                              {{-- ===================================================== --}}
                                          @endif



                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  @endsection
