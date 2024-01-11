@extends('layout.template')

@section('title', 'Order Form')

@section('content')
    <h1>Pesanan {{ $product->nama }}</h1>

    <form action="{{ route('order.process') }}" method="POST">
        @csrf
        
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <!-- Tambahkan elemen formulir yang diperlukan untuk pesanan -->
        <div class="mb-3">
            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_dibeli" class="form-label">Jumlah yang Dibeli</label>
            <input type="number" class="form-control" id="jumlah_dibeli" name="jumlah_dibeli" min="1" value="1" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="Rp{{ $product->harga }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
@endsection
