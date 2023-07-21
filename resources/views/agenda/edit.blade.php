@extends('master')
@section('title')
    <title>Edit Agenda Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Agenda Page</h1>
        </div>
        <div class="section-body">
            {{-- show error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Wait</strong> There were some problems with your update<br>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit</h4>
                </div>
                @php

                    use App\Models\User;
                    $user = User::all();

                @endphp
                <form action="{{ route('tambahpendamping.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="agenda_id" value="{{ $agenda->id }}">
                    <select name="pendamping_id" class="form-control" onchange="func1(this.value)">
                        <option selected>Pilih Pendamping</option>
                        @foreach ($user as $pendamping)
                            <option value="{{ $pendamping->id }}">{{ $pendamping->name }}</option>
                        @endforeach
                    </select>

                     <button class="btn btn-primary">Add</button> |

                </form>

                <form action="{{ route('agenda.update', $agenda->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Agenda</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->agenda }}" type="text" name="agenda">
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                {{-- <input class="form-control" value="{{ $agenda->kategori }}" type="text" name="kategori">
                                <select name="kategori" class="form-control"> --}}
                                @php
                                    use App\Models\Category;
                                    $category = Category::all();
                                @endphp
                                @foreach ($category as $kategori)
                                    {{-- <option value="{{ $kategori->id }}">{{ $kategori->namakategori }}</option> --}}
                                    <input class="form-control" type="text" name="kategori"
                                        value="{{ $kategori->namakategori }}">
                                @endforeach
                                {{-- </select> --}}
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->tanggal }}" type="date" name="tanggal">
                            </td>
                        </tr>
                        <tr>
                            <td>Mulai</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->mulai }}" type="time" name="mulai">
                            </td>
                        </tr>
                        <tr>
                            <td>Selesai</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->selesai }}" type="time" name="selesai">
                            </td>
                        </tr>
                        <tr>


                            <td>Pendamping</td>
                            <td>

                                <hr class="mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pendamping</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                use App\Models\AddPedamping;

                                                $pendamping = AddPedamping::where('agenda_id', '=', $agenda->id)->get();
                                            @endphp
                                            @foreach ($pendamping as $daftar_pendamping)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $daftar_pendamping->namaPendamping->name }}</td>
                                                    <td>


                                                        {{--
                                                    <a href="{{ route('agenda.edit', $a->id) }}" class="btn btn-warning"
                                                        title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('sambutan.input', $a->id) }}"
                                                        class="btn btn-icon icon-left btn-warning"
                                                        title="Tambah Sambutan"><i class="fas fa-file-word"></i></a>
                                                    <a href="{{ route('pointer.input', $a->id) }}"
                                                        class="btn btn-icon icon-left btn-warning"
                                                        title="Tambah Pointer"><i class="fas fa-folder-plus"></i></a>
                                                    <a href="{{ route('data_dukung.create', $a->id) }}"
                                                        class="btn btn-icon icon-left btn-warning"
                                                        title="Tambah Data Dukung"><i class="fas fa-file-upload"></i></a>
                                                    <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                        class="btn btn-icon icon-left btn-warning"
                                                        title="List Data Dukung"><i class="fas fa-clipboard-list"></i></a>

                                                    <a href="{{ route('agenda.showdetail', $a->id) }}" class="btn btn-primary"
                                                        title="Detail"><i class="fas fa-folder-open"></i></a>
                                                    <a href="{{ route('agenda.destroy', $a->id) }}"
                                                        class="btn btn-danger" title="Hapus"><i
                                                            class="fas fa-trash"></i></a>

                                                            @elseif(Auth::user()->role=='tu_sestama')
                                                            <a href="{{ route('agenda.edit', $a->id) }}" class="btn btn-warning"
                                                                title="Edit"><i class="fas fa-edit"></i></a>
                                                            <a href="{{ route('sambutan.input', $a->id) }}"
                                                                class="btn btn-icon icon-left btn-warning"
                                                                title="Tambah Sambutan"><i class="fas fa-file-word"></i></a>
                                                            <a href="{{ route('pointer.input', $a->id) }}"
                                                                class="btn btn-icon icon-left btn-warning"
                                                                title="Tambah Pointer"><i class="fas fa-folder-plus"></i></a>
                                                            <a href="{{ route('data_dukung.create', $a->id) }}"
                                                                class="btn btn-icon icon-left btn-warning"
                                                                title="Tambah Data Dukung"><i class="fas fa-file-upload"></i></a>
                                                            <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                                class="btn btn-icon icon-left btn-warning"
                                                                title="List Data Dukung"><i class="fas fa-clipboard-list"></i></a>

                                                            <a href="{{ route('agenda.showdetail', $a->id) }}" class="btn btn-primary"
                                                                title="Detail"><i class="fas fa-folder-open"></i></a>
                                                            <a href="{{ route('agenda.destroy', $a->id) }}"
                                                                class="btn btn-danger" title="Hapus"><i
                                                                    class="fas fa-trash"></i></a>



                                                      <a href="{{ route('sambutan.input', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="Tambah Sambutan"><i class="fas fa-file-word"></i></a>
                                                      <a href="{{ route('pointer.input', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="Tambah Pointer"><i class="fas fa-folder-plus"></i></a>
                                                      <a href="{{ route('data_dukung.create', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="Tambah Data Dukung"><i class="fas fa-file-upload"></i></a>
                                                      <a href="{{ route('datadukung.showdatadukung', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="List Data Dukung"><i class="fas fa-clipboard-list"></i></a>

                                                      <a href="{{ route('agenda.showdetail', $a->id) }}" class="btn btn-primary"
                                                          title="Detail"><i class="fas fa-folder-open"></i></a>


                                                          <a href="{{ '#'}}"
                                                              class="btn btn-icon icon-left btn-warning"
                                                              title="Link Humas"><i class="fas fa-file-word"></i></a>


                                                      <a href="{{ route('agenda.showdetail', $a->id) }}" class="btn btn-primary"
                                                              title="Detail"><i class="fas fa-folder-open"></i></a>


                                                          <a href="{{ '#'}}"
                                                              class="btn btn-icon icon-left btn-warning"
                                                              title="Protokol menambahkan informasi detail"><i class="fas fa-file-word"></i></a>
                                                          <a href="{{ route('agenda.showdetail', $a->id) }}" class="btn btn-primary"
                                                                  title="Detail"><i class="fas fa-folder-open"></i></a>

                                                   --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->keterangan }}" type="text"
                                    name="keterangan">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->status }}" type="text" name="status">
                            </td>
                        </tr>
                        <tr>
                            <td>Unit</td>
                            <td>
                                <select name="unit_id" class="form-control">
                                    {{-- @if ($agenda->unit_id == null)
                                        <option value="">-- Pilih Unit --</option>

                                    @elseif ($agenda->unit_id == unit_id)
                                        <option value="{{$agenda->unit_id}}">{{$agenda->unit->nama}}</option>

                                    @endif --}}
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $agenda->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Save Data</button>
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>

    </section>
    </section>
@endsection

