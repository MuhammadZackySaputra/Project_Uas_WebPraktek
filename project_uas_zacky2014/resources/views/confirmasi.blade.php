@extends('layout.template')

@section('title', 'Konfirmasi Pesanan')

@section('content')
    <!-- Konten konfirmasi pesanan lainnya -->
    <a href="{{ route('order.form', ['product_id' => $product->id]) }}" class="btn btn-primary mt-3">Pesan Lagi</a>
@endsection

