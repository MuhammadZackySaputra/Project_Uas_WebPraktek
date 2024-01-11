@extends('layout.template')

@section('title', $product['nama'])

@section('content')

<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-3">
        <img src="/images/{{ $product['foto_sampul'] }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-9">
        <div class="card-body">
          <h2 class="card-title">{{ $product['nama'] }}</h2>
          <p class="card-text">{{ $product['keterangan'] }}</p>
          <p class="card-text">Harga : {{ $product['harga'] }}</p>
          <a href="/" class="btn btn-success">Kembali</a>
        </div>
      </div>
    </div>
  </div>
    
@endsection