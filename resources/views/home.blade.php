@extends('auth.layouts')

@section('content')
<style>
  /* Global Styles */
body {
    font-family: 'Mulish', sans-serif; /* Menggunakan font Mulish */
    background-color: #f7f9fc; /* Warna latar belakang yang lembut */
    color: #333;
    margin: 0;
    padding: 20px;
}

h1 {
    color: #4a4a4a;
    font-weight: bold;
    margin-bottom: 30px;
}

/* Card Styling */
.card {
    background-color: #fff;
    border: none;
    border-radius: 10px; /* Sudut melengkung untuk kartu */
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    height: 100%; /* Menjadikan kartu memiliki tinggi penuh */
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15); /* Bayangan yang lebih dalam saat di-hover */
}

.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    height: 200px; /* Tinggi gambar tetap */
    object-fit: cover; /* Gambar memenuhi container */
}

.card-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

.card-text {
    font-size: 0.95rem;
    color: #666;
    margin-top: 10px;
    flex-grow: 1; /* Memastikan teks memiliki ruang untuk mengisi */
}

.card-footer {
    background-color: transparent;
    border-top: none;
    text-align: right;
}

/* Responsive Grid */
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.col-md-2,
.col-sm-6,
.col-md-4,
.col-lg-3 {
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 768px) {
    .col-md-2 {
        flex: 0 0 16.66667%;
        max-width: 16.66667%;
    }
}

@media (min-width: 992px) {
    .col-md-4 {
        flex: 0 0 33.33333%;
        max-width: 33.33333%;
    }

    .col-lg-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
}

@media (max-width: 576px) {
    .col-sm-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

/* Additional Utilities */
.text-center {
    text-align: center;
}

.mb-3 {
    margin-bottom: 1rem;
}

.btn-primary {
    background-color: #5a67d8;
    border-color: #5a67d8;
}

.btn-primary:hover {
    background-color: #434190;
    border-color: #434190;
}

</style>
    <h1 class="text-center mb-4">Daftar Buku</h1>
    
    @if($perpus->isEmpty())
        <p class="text-center text-muted">Tidak ada post yang ditemukan.</p>
    @else
        <div class="row">
            @foreach($perpus as $post)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4"> 
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-muted">{{ $post->content }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
