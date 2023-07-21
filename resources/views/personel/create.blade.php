@extends('master')
@section('title')
    <title>Create Personel Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Personel Page</h1>
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
                    <h4>Form Add Personel</h4>
                </div>
                <form action="{{ route('personel.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input class="form-control" type="text" name="nama" placeholder="Nama">
                            </td>
                        </tr>
                        <tr>
                            <td>nip</td>
                            <td>
                                <input class="form-control" type="text" name="nip" placeholder="NIP">
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>
                                <input class="form-control" type="text" name="jabatan" placeholder="Jabatan">
                            </td>
                        </tr>
                        <tr>
                            <td>Unit</td>
                            <td>
                                <select name="unit_id" id="" class="form-control">
                                    <option value="0">--Pilih Data--</option>
                                    @foreach ($unit as $units)
                                        <option value="{{$units->id}}">{{$units->nama_unit}}</option>

                                    @endforeach
                                </select>
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
