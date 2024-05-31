@extends('layout')
@section('content')
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100"
                        src="https://images.pexels.com/photos/303383/pexels-photo-303383.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="Image" style="height: 700px; display: block; filter: brightness(80%);">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start" style="padding-top: 50px !important">
                                <div class="col-lg-8">
                                    <p
                                        class="d-inline-block border border-white rounded text-white fw-semi-bold py-1 px-3 animated slideInDown">
                                        Selamat datang di</p>
                                    <h1 class="display-5 mb-4 animated slideInDown text-white">Rizana
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp my-auto" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="{{ asset('foto/laptop.jpg') }}">
                </div>
                <div class="col-lg-6 wow fadeInUp my-auto" data-wow-delay="0.3s">
                    <h1 class="display-5">Tentang Kami</h1>
                    <p class="mb-4">Kami mahasiswa Teknik Industri Semester 4 dengan nomor kelompok 6 membuat website ini
                        bertujuan untuk memenuhi Tugas Besar Mata Kuliah Analisis Perancangan Sistem Informasi yaitu web
                        info lomba, info beasiswa dan info lowongan pekerjaan.
                    </p>
                    <p>Perkenalkan anggota kami :</p>
                    <li>Rizal Hakim Azaria (I0322109)</li>
                    <li>
                        Muhammad Ilham Ryan Kusuma (I0322080)</li>
                    <li>
                        Nadila Zalfa Nursantika (I0322090)</li>
                    <li>
                        Raditya Akmal Putra Isnanto (I0322100)</li>
                    <li>
                        Novita Arilfa (I0322095)</li>
                    <li>
                        Muhammad Marsanda Zarkasih (I0322085)</li>
                    <br>
                    <p>Contact Person : 085975404345</p>
                </div>
            </div>
        </div>
    </div>
@endsection
