  @extends('master')

  @section('title')
    <title>Data Personel</title>
  @endsection

  @section('content')
        <section class="section">
            <div class="section-header">
                <h1>Data Personel</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('personel.create') }}" class="btn btn-primary">Add Personel</a>
                            </div>
                            <div class="card-body">
                                <table class="table table.bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personel as $p)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->nip  }}</td>
                                                <td>{{ $p->jabatan}}</td>
                                                <td>{{ $p->unit_id  }}</td>
                                                <td>
                                                    <a href="{{ route('personel.edit', $p->id) }}" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('personel.destroy', $p->id) }}" class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
                                                </td>
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


