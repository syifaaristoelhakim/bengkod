@extends('layouts.app')


{{-- Customize layout sections --}}


@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

@section('content_body')
<div class="card-header">periksa</div>

                <div class="card-body">
                <table class="table">
  <thead>
    ...
  </thead>
  <tbody>
    <tr class="table-active">
    <th scope="row">1</th>
      <td>John</td>
      <td>Doe</td>
      <td class="table-active">@social</td>
    </tr>
    <tr>
    <th scope="row">2</th>
      <td>John</td>
      <td>Doe</td>
      <td class="table-active">@social</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td class="table-active">@social</td>
    </tr>
  </tbody>
</table>

                </div>
            

@endsection