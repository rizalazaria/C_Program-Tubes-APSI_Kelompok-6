@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    {{-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Cetak Data Laporan</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('panel/laporanpengajuancetak') }}" method="get" target="_blank">
                                <div class="form-row align-items-end">
                                    <div class="col-sm-2 mb-3">
                                        <label for="">Tanggal Awal</label>
                                        <input type="date" name="awal" class="form-control">
                                    </div>
                                    <div class="col-sm-2 mb-3">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="akhir" class="form-control">
                                    </div>
                                    <div class="col-sm-2 mb-3">
                                        <button type="submit" class="btn btn-primary" name="cetak">Cetak</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" href="{{ url('panel/lombatambah') }}">Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Tanggal Batas Pendaftaran</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lomba as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->judul }}</td>
                                                <td>{{ $value->deskripsi }}</td>
                                                <td>{{ date('d/m/Y', strtotime($value->tanggal)) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($value->tanggalbataspendaftaran)) }}</td>
                                                <td><a href="{{ asset('lomba/' . $value->foto) }}">
                                                        <img src="{{ asset('lomba/' . $value->foto) }}" alt="foto"
                                                            width="100px">
                                                    </a></td>
                                                <td>
                                                    {{-- <a class="btn btn-success m-1"
                                                        href="{{ url('panel/arsipcetak/' . $value->idarsip) }}">Cetak</a> --}}
                                                    <a class="btn btn-primary m-1"
                                                        href="{{ url('panel/lombaedit/' . $value->idlomba) }}">Edit</a>
                                                    <a class="btn btn-danger bdel m-1"
                                                        href="{{ url('panel/lombahapus/' . $value->idlomba) }}">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
