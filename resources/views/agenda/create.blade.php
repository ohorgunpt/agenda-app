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
                <div class="card-body">
                    <form action="{{ route('agenda.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label>Agenda</label>
                            <input type="text" name="agenda" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option selected>Pilih Kategori</option>
                                @foreach ($category as $ct)
                                    <option value="{{ $ct->id }}">{{ $ct->namakategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 row">
                            <div class="col-xs-4 mb-3">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mx-sm-3 row">
                            <div class="col-xs-4 mb-3">
                                <label>Mulai</label>
                                <input class="form-control" type="time" name="mulai" placeholder="Mulai">
                            </div>
                        </div>
                        <div class="form-group mx-sm-3 row">
                            <div class="col-xs-4 mb-3">
                                <label>Selesai</label>
                                <input class="form-control" type="time" name="selesai" placeholder="Selesai">
                            </div>
                        </div>

                        {{-- <div class="form-group">
                                <label >Pendamping</label>
                                <select name="pendamping" class="form-control">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($personel as $pndamping)
                                        <option value="{{ $pndamping->id }}">{{ $pndamping->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" type="text" name="keterangan" placeholder="Keterangan">
                        </div>


                            <input type="hidden" type="text" name="status" placeholder="Status" value="Penjadwalan Awal">
                      

                        <div class="question">
                            <p>Sifat<span class="required"></span></p>
                            <div class="question-answer">
                                <label><input type="radio" value="Umum" name="sifat" required />
                                    <span>Umum</span></label>
                                <label><input type="radio" value="Rahasia" name="sifat" required />
                                    <span>Rahasia</span></label>
                                <label><input type="radio" value="Pribadi" name="sifat" required />
                                    <span>Pribadi</span></label>
                                <label><input type="radio" value="Unclassified" name="sifat" required />
                                    <span>Unclassified</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="">{{Auth::user()->unit_id}}</label> --}}
                            <input type="hidden" value="{{ Auth::user()->unit_id }}" name="unit_id" />
                        </div>

                        <div class="form-group">


                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </section>
    </section>
@endsection
