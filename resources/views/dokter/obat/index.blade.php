@extends('layouts.app')

@section('subtitle', 'Dokter')
@section('content_header_title', 'Obat')
@section('content_body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
        </div>
        <div class="card-body">
            <table class="table tbale-striped table-hover">
                <thead>
                    <tr>
                        
                        <th>Nama Obat</th>
                        <th>Kemasan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($obats as $obat)
                        <tr>
                           
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->kemasan }}</td>
                            <td>{{ $obat->harga }}</td>

                            <td>
                                <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST"
                                    style="display:inline;">
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

