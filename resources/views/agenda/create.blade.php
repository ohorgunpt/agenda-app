@extends('master')
@section('title')
    <title>Create Agenda Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Agenda Page</h1>
        </div>
        <div class="section-body">
            {{-- show error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Wait,</strong> There were some problems with your input<br>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Form Add Agenda</h4>
                </div>
                <form action="{{ route('agenda.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Agenda</td>
                            <td>
                                <input class="form-control" type="text" name="agenda" placeholder="Agenda">
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <input class="form-control" type="text" name="kategori" placeholder="Kategori">
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <input class="form-control" type="date" name="tanggal">
                            </td>
                        </tr>
                        <tr>
                            <td>Mulai</td>
                            <td>
                                <input class="form-control" type="time" name="mulai" placeholder="Mulai">
                            </td>
                        </tr>
                        <tr>
                            <td>Selesai</td>
                            <td>
                                <input class="form-control" type="time" name="selesai" placeholder="Selesai">
                            </td>
                        </tr>
                        <tr>
                            <td>Pendamping</td>
                            <td>
                                <input class="form-control" type="text" name="pendamping" placeholder="Pendamping">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <input class="form-control" type="text" name="keterangan" placeholder="Keterangan">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input class="form-control" type="text" name="status" placeholder="Status">
                            </td>
                        </tr>
                        <tr>
                            <td>ID Unit</td>
                            <td>
                                <input class="form-control" type="text" name="unit_id" placeholder="ID Unit">
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
