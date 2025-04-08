@extends('layouts.app')

{{-- Set bagian layout --}}
@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Isi konten utama --}}
@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- Tambahan CSS --}}
@push('css')
    {{-- Tempatkan style tambahan di sini --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Tambahan Script --}}
@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
