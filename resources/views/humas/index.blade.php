
@extends('master')
@section('title')
    <title>Data Humas</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Humas</h1>
        </div>
        <div class="section-body">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('category.create')}}" class="btn btn-primary">Add Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>Nama Agenda</th>
                                    <th>Nama Data Dukung</th>
                                    <th>Keterangan</th>
                                    <th>ID Agenda</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($listdatadukung as $item)
                                    <tr>
                                        <td>{{ $item->agenda }}</td>
                                        <td>{{ $item->nama_data_dukung }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->agenda_id }}</td>
                                        {{-- <td>{{ $d->tipebalai->nama_tipe }}</td> --}}
                                        {{-- <td>
                                            <a href="{{ Storage::url($item->file) }}" class="btn btn-info"
                                                title="File"><i class="far fa-file"></i></a> --}}
                                            {{-- <a href="{{ route('balai.edit', $d->id) }}" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a> --}}
                                            {{-- <a href="{{ route('datadukung.destroy', $item->id) }}"
                                                class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
