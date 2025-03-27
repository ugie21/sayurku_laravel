@extends('layouts.main')
@section('container')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
            <h1>Pesan Sayuran</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio aliquam, nulla iure eligendi cupiditate vitae adipisci natus voluptates cum reprehenderit.</p>
            </div>
        </div>
    </div>
</div>
    <main class="content">
        <section class="products">
            <div class="container-xxl">
                <div class="galleries page-content">
                    @foreach($products as $product)
                        <div class="item">
                            <a href="{{ url('produk-kami/'.$product->id) }}">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                            </a>
                            <div class="product-name">{{ $product->product_name }}</div>
                            <div class="product-description">
                                {{ $product->product_description }}
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
        </section>

    <section class="order">
        <div class="container">
            <h2 class="mt-4 mb-4">Pesan Sayuran</h2>
                <form id="order-form" class="order-form">
                    <p>
                        Silahkan isi form dibawah ini untuk melakukan pemesanan. 
                        Admin kami akan menghubungi Anda untuk konfirmasi pesanan dan pembayaran
                    </p>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number">Nomor HP</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="">
                    </div>                  
                    <div class="mb-3">
                        <label for="address">Alamat Pengiriman</label>
                        <textarea name="address" class="form-control" id="address" rows="10"></textarea>
                    </div>                  
                    <div class="mb-3">
                        <label for="order_detail">Sayur yang akan dipesan</label>
                        <textarea name="order_detail" id="order_detail" rows="10"></textarea>
                    </div>                  
                    <div class="mb-3">
                        <input id="submit" type="submit" name="submit" value="Submit">
                    </div> 
                </form>
            </div>
        </section>
    </main>
@endsection