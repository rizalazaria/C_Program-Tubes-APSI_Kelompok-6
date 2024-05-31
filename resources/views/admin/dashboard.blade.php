@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <h3>{{ $title }}</h3>
            <h5 class="mb-3">Rizana</h5>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url('panel/lombadaftar') }}">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Lomba Yang Masih Tersedia</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $jumlahlomba }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fas fa-flag"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('panel/beasiswadaftar') }}">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Beasiswa Yang Masih Tersedia</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $jumlahbeasiswa }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fas fa-user-graduate"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('panel/lokerdaftar') }}">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Loker Yang Masih Tersedia</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $jumlahloker }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fas fa-box-archive"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
