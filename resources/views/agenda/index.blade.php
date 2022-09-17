  @extends('master')

  @section('title')
      <title>Data Agenda</title>
  @endsection

  @section('content')
      <section class="section">
          <div class="section-header">
              <h1>Data Agenda</h1>
          </div>
          <div class="section-body">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <a href="{{ route('agenda.create') }}" class="btn btn-primary">Add Agenda</a>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table.bordered">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Tanggal</th>
                                              <th>Agenda</th>
                                              <th>Kategori</th>
                                              <th>Mulai</th>
                                              <th>Selesai</th>
                                              <th>Pendamping</th>
                                              <th>Keterangan</th>
                                              <th>Status</th>
                                              <th>ID Unit</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($agenda as $a)
                                              <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td>{{ $a->tanggal }}</td>
                                                  <td>{{ $a->agenda }}</td>
                                                  <td>{{ $a->kategori }}</td>
                                                  <td>{{ $a->mulai }}</td>
                                                  <td>{{ $a->selesai }}</td>
                                                  <td>{{ $a->pendamping }}</td>
                                                  <td>{{ $a->keterangan }}</td>
                                                  <td>{{ $a->status }}</td>
                                                  <td>{{ $a->unit_id }}</td>
                                                  <td>
                                                      <a href="{{ route('agenda.edit', $a->id) }}" class="btn btn-warning"
                                                          title="Edit"><i class="fas fa-edit"></i></a>
                                                      <a href="{{ route('sambutan.input', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="Tambah Sambutan"><i class="fas fa-swatchbook"></i></a>
                                                      <a href="{{ route('pointer.input', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="Tambah Pointer">Tambah Pointers</a>
                                                      <a href="{{ route('data_dukung.create', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="Tambah Data Dukung">Tambah Data Dukung</a>
                                                      <a href="{{ route('data_dukung.index', $a->id) }}"
                                                          class="btn btn-icon icon-left btn-warning"
                                                          title="List Data Dukung">List Data Dukung</a>

                                                      <a href="{{ route('agenda.showdetail', $a->id) }}" class="btn btn-primary"
                                                          title="Detail"><i class="fas fa-meh-rolling-eyes"></i></a>
                                                      <a href="{{ route('agenda.destroy', $a->id) }}"
                                                          class="btn btn-danger" title="Hapus"><i
                                                              class="fas fa-trash"></i></a>
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
          </div>
      </section>
  @endsection
