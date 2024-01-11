@extends('layout.template')

@section('title', 'Konfirmasi Pesanan')

@section('content')
    <div class="alert alert-success" role="alert">
        Pesanan Anda untuk produk {{ $product->nama }} telah berhasil diterima!
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rincian Pesanan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Jumlah yang Dibeli</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $nama_pembeli }}</td>
                            <td>{{ $jumlah_dibeli }}</td>
                            <td>Rp {{ $total_harga }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-3">Terima kasih telah memesan dari Coffee Shop!</p>
            <a href="/menu" class="btn btn-primary mt-3">Pesan Lagi</a>
        </div>
    </div>
@endsection
