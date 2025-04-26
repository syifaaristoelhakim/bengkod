@extends('layouts.app')

@section('subtitle', 'Periksa')
@section('content_header_title', 'Data Periksa')
@section('content_body')
    <div class="card">
        
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal Periksa</th>
                        <th>Catatan</th>
                        <th>Biaya</th>
                        <th>Obat</th>
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
    @if($periksa->obats->count())
        <ul class="mb-0 ps-3">
            @foreach($periksa->obats as $obat)
                <li>{{ $obat->nama_obat }}</li>
            @endforeach
        </ul>
    @else
        <span>-</span>
    @endif
</td>
                            <td>
                                <a href="{{ route('periksa.edit', $periksa->id) }}" class="btn btn-warning">periksa</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
