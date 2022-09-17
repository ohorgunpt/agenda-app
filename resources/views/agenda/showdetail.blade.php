@extends('master')

@section('title')
    <title>Detail</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Detail Agenda</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center">
                                <button class="btn btn-primary btn-lg-8">POINTER</button>

                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-lg-8">SAMBUTAN</button>

                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Data Dukung</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datadukung as $dk)
                                <tr>
                                    <td>{{ $dk->nama_data_dukung }}</td>
                                    <td> <a href="storage/{{ $dk->file }}" class="btn btn-info" title="File"><i
                                                class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
