@extends('layouts.app')

@section('subtitle', 'Periksa')
@section('content_header_title', 'Data Periksa')
@section('content_body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('periksa.create') }}" class="btn btn-primary">Tambah Periksa</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal Periksa</th>
                        <th>Catatan</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periksas as $periksa)
                        <tr>
                            <td>{{ $periksa->pasien->name ?? '-' }}</td>
                            <td>{{ $periksa->dokter->name ?? '-' }}</td>
                            <td>{{ $periksa->tgl_periksa }}</td>
                            <td>{{ $periksa->catatan }}</td>
                            <td>Rp{{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('periksa.edit', $periksa->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('periksa.destroy', $periksa->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
