@extends('store.store_master')

@section('header')
	
@endsection

@section('main_menu')

	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
	
@endsection

@section('content')
<hr>
	<div class="bg-secondary text-white p-2">
	Petunjuk Pemesanan Barang:
	</div>

<div class="col-8">
	<ul class="list-group list-group-flush">
		<div class="mt-4">Pengunjung yang terhormat. Pemesanan produk dari situs ini dapat Anda lakukan dengan cara sebagai berikut :</div>
		<li class="list-group-item">Silahkan masuk ke website Toko online "Foris brand" dengan mengetikan alamat {{url()->current()}}</li>
		<li class="list-group-item">Di dalam situs ini anda dapat melihat produk-produk yang ditawarkan.</li>
		<li class="list-group-item">Tampilkan produk yang Anda minati dengan cara meng-klik pada suatu item produk.  
		Klik pada tombol "Pesan via WhatsApp" yang akan membawa anda pada aplikasi Whatsapp (smartphone) atau Whatsapp web.  
		Selanjutnya Anda akan otomatis terhubung dengan penjual melalui aplikasi Whatsapp</li>
		<li class="list-group-item">Untuk melakukan pemesanan lebih dari satu barang sekaligus, Anda dapat menambahkan terlebih dahulu setiap item barang
		ke dalam keranjang.  Setelah produk-produk yang Anda minati semua masuk ke dalam keranjang, pemesanan dilakukan dengan cara meng-klik tombol Pesan/Order.</li>
		<li class="list-group-item">Setelah terhubung melalui WhatsApp, Anda dapat melakukan komunikasi dengan penjual, melakukan penawaran, dan membuat kesepakatan transaksi, teknis pembayaran serta pengiriman barang dengan penjual</li>
		<li class="list-group-item">Proses transaski dan pengiriman barang dilakukan dengan cara-cara yang telah disepakati antara penjual dengan pembeli</li>
	</ul>
	-Terima kasih dan Selamat Berbelanja-

</div>
@endsection