@extends('layouts.app')

@section('title', 'Tambah Permintaan Periksa')
@section('content_header')
    <h1>Permintaan Periksa Baru</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pasien.periksa.store') }}">
                @csrf

                <div class="form-group">
                    <label for="id_dokter">Pilih Dokter</label>
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

                <div class="d-flex justify-content-end" style="gap:10px;">
                    <button type="submit" class="btn btn-success">Ajukan</button>
                    <a href="{{ route('periksa.pasienindex') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
