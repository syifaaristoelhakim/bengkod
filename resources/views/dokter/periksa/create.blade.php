@extends('layouts.app')

@section('title', 'Tambah Periksa')
@section('content_header')
    <h1>Tambah Periksa</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('periksa.store') }}">
                @csrf

                <div class="form-group">
                    <label for="id_pasien">Pasien</label>
                    <select name="id_pasien" id="id_pasien" class="form-control" required>
                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_dokter">Dokter</label>
                    <select name="id_dokter" id="id_dokter" class="form-control" required>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tgl_periksa">Tanggal Periksa</label>
                    <input type="datetime-local" name="tgl_periksa" id="tgl_periksa" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="biaya_periksa">Biaya Periksa</label>
                    <input type="number" name="biaya_periksa" id="biaya_periksa" class="form-control">
                </div>

                <!-- Menambahkan input untuk memilih obat -->
                <div class="form-group">
                    <label for="obat">Pilih Obat</label>
                    <select name="obat[]" id="obat" class="form-control" multiple>
                        @foreach ($obats as $obat)
                            <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Pilih obat yang diberikan kepada pasien. Anda dapat memilih lebih dari satu obat.</small>
                </div>

                <div class="d-flex justify-content-end" style="gap:10px;">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('periksa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
