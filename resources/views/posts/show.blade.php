<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail makanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS untuk menyesuaikan ukuran gambar */
        .img-sm {
            max-width: 300px; /* Sesuaikan dengan lebar yang diinginkan */
            height: auto; /* Biarkan tinggi menyesuaikan dengan lebar */
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <h3 class="text-center">Lihat Buku</h3>
                    <div class="card-body">
                        <img src="{{ asset('storage/'.$post->image) }}" class="img-sm mx-auto d-block rounded">
                        <hr>
                        <h4>{{ $post->title }}</h4>
                        <p class="mt-3">
                            {!! $post->content !!}
                        </p>
                        <a href="{{ asset('storage/'.$post->image) }}" download class="btn btn-primary">Download</a>
                        <a href="{{ route('posts.index')}}" class="btn btn-dark">Back</a>
                    </div>
                    <p class="text-center text-muted">Uploaded at: {{ $post->created_at->format('Y-m-d H:i:s') }}</p>                
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
