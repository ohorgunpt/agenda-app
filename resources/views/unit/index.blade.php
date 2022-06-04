  @extends('master')

  @section('title')
    <title>Data Unit</title>
  @endsection

  @section('content')
        <section class="section">
            <div class="section-header">
                <h1>Data Unit</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('unit.create') }}" class="btn btn-primary">Add Unit</a>
                            </div>
                            <div class="card-body">
                                <table class="table table.bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Unit</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unit as $u)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $u->nama_unit}}</td>
                                                <td>{{ $u->keterangan  }}</td>

                                                <td>
                                                    <a href="{{ route('unit.edit', $u->id) }}" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('unit.destroy', $u->id) }}" class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
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


