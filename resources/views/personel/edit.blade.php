@extends('master')
@section('title')
    <title>Edit Personel Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Personel Page</h1>
        </div>
        <div class="section-body">
            {{-- show error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Wait</strong> There were some problems with your input<br>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit</h4>
                </div>
                <form action="{{ route('personel.update', $personel->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input class="form-control" value="{{$personel->nama}}" type="text" name="nama">
                            </td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>
                                <input class="form-control" value="{{$personel->nip}}" type="text" name="nip">
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>
                                <input class="form-control" value="{{$personel->jabatan}}" type="text" name="jabatan">
                            </td>
                        </tr>
                        <tr>
                            <td>Unit</td>
                            <td>
                                <input class="form-control" value="{{$personel->unit_id}}" type="text" name="unit_id">
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Save Data</button>
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>

    </section>
    </section>
@endsection
