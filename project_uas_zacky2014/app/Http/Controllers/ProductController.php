<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $query = Product::latest();
        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('keterangan', 'like', '%' . request('search') . '%');
        }
        $products = $query->paginate(6)->withQueryString();
        return view('homepage', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }

    public function menu()
    {
        $products = Product::all();
        return view('menu', ['products' => $products]);
    }

    public function order(Request $request)
    {
        // Mendapatkan data dari form pesanan
        $productId = $request->input('product');
        $quantity = $request->input('quantity');

        // Mendapatkan informasi produk berdasarkan ID
        $product = Product::find($productId);

        // Melakukan validasi apakah produk ditemukan
        if (!$product) {
            return back()->with('error', 'Product not found');
        }

        // Proses penyimpanan pesanan ke dalam database atau sistem lainnya
        // Misalnya, menyimpan informasi pesanan ke dalam tabel pesanan

        // Contoh: Menyimpan informasi pesanan dalam session
        $request->session()->put('order', [
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $product->harga * $quantity,
        ]);

        // Redirect ke halaman sukses pesanan
        return redirect()->route('order.success');
    }

    public function orderSuccess(Request $request)
    {
        // Mendapatkan informasi pesanan dari session
        $orders = Order::all();
        
        // Pastikan variabel $order telah didefinisikan sebelum dipassing ke view
        return view('confirmasi', compact('orders'));
    }

    public function showOrderForm($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('order', compact('product'));
    }

    public function processOrder(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'nama_pembeli' => 'required',
            'jumlah_dibeli' => 'required|numeric|min:1',
        ]);

        $product = Product::findOrFail($validatedData['product_id']);
        $totalHarga = $product->harga * $validatedData['jumlah_dibeli'];

        // Simpan data pesanan ke dalam database
        $order = new Order();
        $order->product_id = $validatedData['product_id'];
        $order->nama_pembeli = $validatedData['nama_pembeli'];
        $order->jumlah_dibeli = $validatedData['jumlah_dibeli'];
        $order->total_harga = $totalHarga;
        $order->save();

        return view('data-order', [
            'product' => $product,
            'nama_pembeli' => $validatedData['nama_pembeli'],
            'jumlah_dibeli' => $validatedData['jumlah_dibeli'],
            'total_harga' => $totalHarga,
        ]);
    }
}