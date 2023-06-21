@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nip') }}</label>

                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus>

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Unit') }}</label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Pendamping dari user</label>
                                @php
                                use App\Models\Unit;
                                $unit = Unit::all();
                                @endphp
                                <select name="pendamping" class="form-control">
                                    <option selected>Pilih Pendamping</option>
                                    @foreach ($unit as $it)
                                        <option value="{{ $it->id }}">{{ $it->nama_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Hak Akses') }}</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option value="0">Pilih Hak AKses</option>
                                    <option value="superadmin">Super Admin</option>
                                    <option value="kepala_bpom">Kepala BPOM</option>
                                    <option value="plt_plh_kepala_bpom">Plh./Plt. Kepala BPOM</option>
                                    <option value="sestama">Sestama</option>
                                    <option value="plt_plh_sestama">Plh./Plt. Sestama</option>
                                    <option value="irtama">Irtama</option>
                                    <option value="plt_plh_irtama">Plh./Plt. Irtama</option>
                                    <option value="deputi_1">Deputi 1</option>
                                    <option value="plt_plh_deputi_1">Plh./Plt. Deputi 1</option>
                                    <option value="deputi_2">Deputi 2</option>
                                    <option value="plt_plh_deputi_2">Plh./Plt. Deputi 2</option>
                                    <option value="deputi_3">Deputi 3</option>
                                    <option value="plt_plh_deputi_3">Plh./Plt. Deputi 3</option>
                                    <option value="deputi_4">Deputi 4</option>
                                    <option value="plt_plh_deputi_4">Plh./Plt. Deputi 4</option>
                                    <option value="tu_kepala">TU Kepala</option>
                                    <option value="protokol">Protokol</option>
                                    <option value="dsp">DSP</option>
                                    <option value="humas">Humas</option>
                                    <option value="staf_tu_kepala">Staf TU Kepala</option>
                                    <option value="staf_protokol">Staf Protokol</option>
                                    <option value="staf_dsp">Staf DSP</option>
                                    <option value="staf_humas">Staf Humas</option>
                                    <option value="tu_sestama">TU Sestama</option>
                                    <option value="adm_sestama">Adm. Sestama</option>
                                    <option value="tu_irtama">TU Irtama</option>
                                    <option value="adm_irtama">Adm. Irtama</option>
                                    <option value="tu_deputi_1">TU Deputi 1</option>
                                    <option value="adm_deputi_1">Adm. Deputi 1</option>
                                    <option value="tu_deputi_2">TU Deputi 2</option>
                                    <option value="adm_deputi_2">Adm. Deputi 2</option>
                                    <option value="tu_deputi_3">TU Deputi 3</option>
                                    <option value="adm_deputi_3">Adm. Deputi 3</option>
                                    <option value="tu_deputi_4">TU Deputi 4</option>
                                    <option value="adm_deputi_4">Adm. Deputi 4</option>
                                </select>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name="status" value="Active" checked>Active
                                <input type="radio" name="status" value="Deactive">Deactive
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
