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
                <div class="card-body">
                    <p class="text-center" align='center'>
                    <h4>{{ $agenda->agenda }}</h4>
                    <h6>{{ $agenda->tanggal }}</h6>
                    <h6>{{ $agenda->mulai }}</h6>

                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('pointer.show', $pointer->id) }}"
                                        class="btn btn-primary btn-lg-8">POINTER</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('sambutan.show', $sambutan->id) }}"
                                        class="btn btn-primary btn-lg-8">SAMBUTAN</a>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><strong>Data Dukung</strong></th>
                                    <th>File</th>
                                    <th>As Off</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datadukungagenda as $item)
                                    <tr>
                                        <td>{{ $item->nama_data_dukung }}</td>
                                        <td> <a href="{{ Storage::url($item->file) }}" class="btn btn-info"
                                                title="File"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                           <strong> {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:m') }} </strong>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <h2>Data Humas</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Deskripsi</th>
                                    <th>Link</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datahumas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td><a href="{{ $item->tautan }}" target="_blank"
                                                rel="noopener noreferrer">Tautan</a></td>
                                        <td> <a href="{{ Storage::url($item->file) }}" class="btn btn-info"
                                                title="File"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
