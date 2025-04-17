@extends('layouts.app')

@section('title', 'Edit Pemeriksaan')
@section('content_header')
    <div class="card-header">
        <a href="{{ route('periksa.index') }}" class="btn btn-primary">Kembali ke Daftar Pemeriksaan</a>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('periksa.update', $periksa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Form untuk Pasien -->
                <div class="form-group">
                    <label for="id_pasien">Pasien</label>
                    <select name="id_pasien" class="form-control" required>
                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}" 
                                {{ $pasien->id == $periksa->id_pasien ? 'selected' : '' }}>
                                {{ $pasien->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Form untuk Dokter -->
                <div class="form-group">
                    <label for="id_dokter">Dokter</label>
                    <select name="id_dokter" class="form-control" required>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}" 
                                {{ $dokter->id == $periksa->id_dokter ? 'selected' : '' }}>
                                {{ $dokter->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Form untuk Tanggal Pemeriksaan -->
                <div class="form-group">
                    <label for="tgl_periksa">Tanggal Periksa</label>
                    <input type="datetime-local" name="tgl_periksa" value="{{ $periksa->tgl_periksa }}" class="form-control" required>
                </div>

                <!-- Form untuk Catatan -->
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" class="form-control">{{ $periksa->catatan }}</textarea>
                </div>

                <!-- Form untuk Biaya Pemeriksaan -->
                <div class="form-group">
                    <label for="biaya_periksa">Biaya Pemeriksaan</label>
                    <input type="number" name="biaya_periksa" value="{{ $periksa->biaya_periksa }}" class="form-control">
                </div>

                <!-- Form untuk Obat -->
                <div class="form-group">
                    <label for="obat_ids">Obat (bisa pilih lebih dari satu)</label>
                    <select name="obat_ids[]" class="form-control" multiple>
                        @foreach ($obats as $obat)
                            <option value="{{ $obat->id }}" 
                                {{ in_array($obat->id, $periksa->obats->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $obat->nama_obat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol submit dan kembali -->
                <div class="wrapper d-flex justify-content-end" style="gap: 10px;">
                    <button type="submit" class="btn btn-success">Ubah</button>
                    <a href="{{ route('periksa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
