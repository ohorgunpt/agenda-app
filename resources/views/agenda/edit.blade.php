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
                                <select name="kategori" id="">
                                    <option value="{{ $agenda->kategori }}" selected>{{ $agenda->kategori }}</option>
                                    @foreach ($category as $ct)
                                        <option value="{{ $ct->namakategori }}">{{ $ct->namakategori }}</option>
                                    @endforeach
                                </select>
                                {{-- </select> --}}
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td><input type="text" name="tempat" value="{{ $agenda->tempat }}" class="form-control">
                            </td>
                        </tr>
                        <tr>ph
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
                                                {{-- <th>Action</th> --}}
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
                                                    <td><a href="{{ route('pendamping.destroy', $daftar_pendamping->id) }}"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
                                {{-- <input class="form-control" value="{{ $agenda->status }}" type="text" name="status"> --}}
                                <select name="status" class="form-control">
                                    <option value="{{ $agenda->status }}" selected="selected">{{ $agenda->status }}
                                    </option>
                                    <option value="Terlaksana">Terlaksana</option>
                                    <option value="Ditunda">Ditunda</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                </select>

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
