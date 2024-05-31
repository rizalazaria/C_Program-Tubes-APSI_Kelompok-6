@extends('layout')
@section('content')
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-2 animated slideInDown">{{ $title }}</h1>

        </div>
    </div>
    <div class="container-fluid my-1 pt-1">
        <div class="container pt-2">
            <div class="row mt-1 justify-content-center">
                @foreach ($lomba as $row)
                    <div class="col-md-6 col-12 mb-5">
                        <a href="{{ url('lombadetail/' . $row->idlomba) }}">
                            <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" style="height: 550px"
                                data-wow-delay="0.5s">
                                <div class="-+-row g-3">
                                    <div class="col-md-12">
                                        <img src="{{ url('lomba/' . $row->foto) }}" width="100%"
                                            style="height: 300px;object-fit:cover" style="border-radius:10px">
                                        <h5 class="mt-3">{{ potong($row->judul, 35) }}...</h5>

                                        <p style="text-align: justify" class="mt-2 text-dark">
                                            Deskripsi : {{ potong(strip_tags($row->deskripsi), 100) }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{ $lomba->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
