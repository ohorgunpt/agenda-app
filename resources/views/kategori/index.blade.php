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
                                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Add Kategori</a>
                            </div>
                            <div class="card-body">
                                <table class="table table.bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $p)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $p->namakategori }}</td>

                                                <td>
                                                    <a href="#" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
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


