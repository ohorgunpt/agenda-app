@extends('master')
@section('title')
    <title>Data Dukung</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Dukung</h1>
        </div>
        <div class="section-body">
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data_dukung.create') }}" class="btn btn-primary">Add Data Dukung</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Data Dukung</th>
                                        <th>Keterangan</th>
                                        <th>ID Agenda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datadukung as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_data_dukung }}</td>
                                        <td>{{ $d->keterangan }}</td>
                                        <td>{{ $d->agenda_id }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
