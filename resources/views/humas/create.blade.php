@extends('master')
@section('title')
    <title>Create Data Dukung Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Data Humas </h1>
        </div>
        <div class="section-body">
            {{-- show erroRoute [datahumas.index] not defined.r message --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Wait</strong> There were some problems with your input<br>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="card">
                <div class="card-header">
                    <h4>Form Add Data Humas</h4>
                </div>
                <form action="{{ route('humas.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('POST')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>ID Agenda</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->id }}" type="text" readonly name="agenda_id">
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>
                                <input class="form-control" type="text" name="deskripsi">
                            </td>
                        </tr>
                        <tr>
                            <td>Tautan</td>
                            <td>
                                <input class="form-control" type="text" name="tautan">
                            </td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>
                                <input class="form-control" type="file" name="file">
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
