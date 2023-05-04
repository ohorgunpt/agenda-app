@extends('master')
@section('title')
    <title>Edit Agenda Page</title>
@endsection




@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Agenda Page</h1>
        </div>
        <div class="section-body">
            {{-- show error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Wait</strong> There were some problems with your update<br>
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
                <form action="{{ route('sambutan.update', $agenda->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Agenda</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->agenda }}" type="text" name="agenda"
                                    readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <input class="form-control" value="{{ $agenda->tanggal }}" type="date" readonly
                                    name="tanggal">
                            </td>
                        </tr>
                        <tr>
                            <td>Sambutan</td>
                            <td>
                                <textarea id="mytextarea" class="form-control" style="height:150px" name="sambutan">
                                   {{ $sambutan->sambutan }}
                                </textarea>

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
