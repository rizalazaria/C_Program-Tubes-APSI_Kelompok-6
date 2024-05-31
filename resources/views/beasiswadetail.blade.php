@extends('layout')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $title }}</h1>

        </div>
    </div>
    <div class="container-fluid my-5 pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-12 col-12 mb-5">
                    <div class="card border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <center>
                            <h1 class="mt-3">{{ $beasiswa->judul }}</h1>

                        </center>
                        <br>
                        <br>
                        <div class="row g-3">
                            <div class="col-md-12 col-12 d-flex justify-content-center">
                                <img src="{{ asset('beasiswa/' . $beasiswa->foto) }}" width="70%"
                                    style="border-radius:10px;">
                            </div>
                            <div class="col-md-12 col-12">
                                <span style="text-align: justify" class="mt-2 text-dark">
                                    Deskripsi : <?php echo $beasiswa->deskripsi; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
