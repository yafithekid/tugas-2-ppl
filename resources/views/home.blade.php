@extends('layouts.master')

@section('content')
<div class="carousel slide" id="landingCarousel">
	<div class="carousel-inner">
		<div class="item active">
			<img src="{{asset('atia/img/angkutan.png')}}" alt="angkutan" />
			<div class="carousel-caption">
				<h4>Selamat Datang!</h4>
				<p>Aplikasi web terkait Izin Usaha Angkutan merupakan bagian dari Sistem Informasi Terpadu milik Pemerintah Kota Bandung.</p>
			</div>
		</div>
		<div class="item">
			<img src="{{asset('atia/img/taxy.png')}}" alt="angkutan" />
			<div class="carousel-caption">
				<h4>Prosedur Permohonan Izin</h4>
				<p>Aplikasi web terkait Izin Usaha Angkutan merupakan bagian dari Sistem Informasi Terpadu milik Pemerintah Kota Bandung.</p>
			</div>
		</div>
	</div>
	<a href="#landingCarousel" class="carousel-control left" data-slide="prev">Prev</a>
	<a href="#landingCarousel" class="carousel-control right" data-slide="next">Next</a>
</div>
@endsection
