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
                <form action="{{ route('agenda.update', $agenda->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Agenda</td>
                            <td>
                                <input class="form-control" value="{{$agenda->agenda}}" type="text" name="agenda">
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <input class="form-control" value="{{$agenda->kategori}}" type="text" name="kategori">
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <input class="form-control" value="{{$agenda->tanggal}}" type="date" name="tanggal">
                            </td>
                        </tr>
                        <tr>
                            <td>Mulai</td>
                            <td>
                                <input class="form-control" value="{{$agenda->mulai}}" type="time" name="mulai">
                            </td>
                        </tr>
                        <tr>
                            <td>Selesai</td>
                            <td>
                                <input class="form-control" value="{{$agenda->selesai}}" type="time" name="selesai">
                            </td>
                        </tr>
                        <tr>
                            <td>Pendamping</td>
                            <td>
                                <input class="form-control" value="{{$agenda->pendamping}}" type="text" name="pendamping">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <input class="form-control" value="{{$agenda->keterangan}}" type="text" name="keterangan">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input class="form-control" value="{{$agenda->status}}" type="text" name="status">
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
                                        <option value="{{ $unit->id }}" {{ $agenda->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->nama_unit }}</option>
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
