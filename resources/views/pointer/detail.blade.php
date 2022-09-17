@extends('master')

@section('title')
    <title>Detail Pointer</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pointer</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <p class="text-center" align='center'>
                    <h4>{{ $agenda_id->agenda }}</h4>
                    <h6>{{ $agenda_id->tanggal }}</h6>
                    <h6>{{ $agenda_id->mulai }}</h6>
                    </p>
                    <blockquote>
                        {{ $pointer->pointer }}
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
@endsection
