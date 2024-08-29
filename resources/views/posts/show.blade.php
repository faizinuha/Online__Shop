<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Background yang lebih soft */
            font-family: 'Mulish', sans-serif; /* Menggunakan font Mulish */
        }

        .card {
            border: none;
            border-radius: 15px; /* Membuat kartu lebih melengkung */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            overflow: hidden;
        }

        .card h3 {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            margin: 0;
            font-size: 1.5rem;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .img-sm {
            max-width: 100%; /* Gambar memenuhi lebar container */
            height: 250px;
            margin-bottom: 20px;
            border-radius: 10px; /* Sudut melengkung pada gambar */
        }

        .btn-primary {
            background-color: #5a67d8;
            border-color: #5a67d8;
        }

        .btn-primary:hover {
            background-color: #434190;
            border-color: #434190;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-dark:hover {
            background-color: #23272b;
            border-color: #23272b;
        }

        p.text-muted {
            font-size: 0.85rem;
            margin-top: 10px;
        }

        hr {
            border-top: 1px solid #eaeaea;
        }

    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded">
                    <h3 class="text-center">Detail Buku</h3>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/'.$post->image) }}" class="img-sm rounded">
                        <hr>
                        <h4>Name:{{ $post->title }}</h4>
                        <p class="mt-3">
                            Content:{!! $post->content !!}
                        </p>
                        <a href="{{ asset('storage/'.$post->image) }}" download class="btn btn-primary mr-2">Download</a>
                        <a href="{{ route('posts.show', $post->id) }}">Read Comic</a>
                        <button class="btn btn-dark" onclick="goBack()">Back</button>
                    </div>
                    <p class="text-center text-muted">Uploaded at: {{ $post->created_at->format('Y-m-d H:i:s') }}</p>                
                </div>
            </div>
        </div>
    </div>
    <script>
       function goBack() {
        window.history.back();
    }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
