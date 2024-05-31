@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ url('panel/beasiswaeditsimpan/' . $beasiswa->idbeasiswa) }}" method="post"
                                    enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input value="<?= $beasiswa->judul ?>" type="text" class="form-control"
                                            name="judul" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input value="<?= $beasiswa->deskripsi ?>" type="text" class="form-control"
                                            name="deskripsi" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input value="<?= $beasiswa->tanggal ?>" type="date" class="form-control"
                                            name="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Batas Pendaftaran</label>
                                        <input value="<?= $beasiswa->tanggalbataspendaftaran ?>" type="date"
                                            class="form-control" name="tanggalbataspendaftaran" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input value="" type="file" class="form-control" name="foto">
                                        <p>*kosongkan jika tidak ada perubahan foto</p>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right m-1"
                                        name="tambah">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
