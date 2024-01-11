@extends('layout.template')

@section('title', 'Menu')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Coffee Menu</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="/images/{{ $product->foto_sampul }}" class="card-img-top" alt="{{ $product->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->keterangan }}</p>
                            <p class="card-text"><strong>Harga:</strong> Rp{{ $product->harga }}</p>
                            <a href="{{ route('order.form', ['product_id' => $product->id]) }}" class="btn btn-dark btn-sm">Order Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
