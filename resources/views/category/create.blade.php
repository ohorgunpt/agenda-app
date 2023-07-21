@extends('master')
@section('title')
        <title>Data Kategori</title>
@endsection
@section('content')
<Section class="section">
    <div class="section-header">
        <h1>Data Kategori</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <a href="" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store')}}" method="post">
                            @csrf
                            @method('POST')
                           <div class="for-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="namakategori" class="form-control">
                           </div>
                           <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>
@endsection
