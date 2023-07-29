@extends('master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="title">result</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>date 1</th>
                            <th>date 2</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($result as $item)
                            <tr>
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->agenda}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
