@extends('master')
@section('title')
    <title>Create Unit Page</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Unit Page</h1>
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
                    <h4>Form Add Unit</h4>
                </div>
                <form action="{{ route('unit.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <table class="table table-outline-primary table-border">
                        <tr>
                            <td>Nama Unit</td>
                            <td>
                                <input class="form-control" type="text" name="nama_unit" placeholder="Nama Unit">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <input class="form-control" type="text" name="keterangan" placeholder="Keterangan">
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
