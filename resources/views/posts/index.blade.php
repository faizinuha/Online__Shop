@include('auth.layouts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Webiste</title>
    <link rel="stylesheet" href="/resources/css/renponsif.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        @yield('navbar')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered" id="data">
                            <thead>
                                <a href="{{ route('home') }}" class="btn btn-danger mb-2">back</a>
                                <a href="{{route('posts.create')}}" class="btn btn-primary">Add</a>
                                <tr>
                                    <th scope="col">Gambar buku:</th>
                                    <th scope="col">Pemilik:</th>
                                    <th scope="col">Nama Publish:</th>
                                    <th scope="col">Tentang Buku:</th>
                                    <th scope="col">Tanggal di buat:</th>
                                    <th scope="col">AKSI:</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($post as $post)
                                    <tr>

                                        <style>
                                            .img-hover {
                                                transition: transform 0.3s ease;
                                            }

                                            .img-hover:hover {
                                                transform: scale(1.1);
                                                /* Ubah angka sesuai dengan faktor perbesaran yang diinginkan */
                                            }
                                        </style>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="rounded img-fluid img-hover"
                                                style="width: 150px">
                                        </td>
                                        <td> {{ Auth::user()->name }} </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td>
                                            <p class="text-center text-muted">
                                                {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
                                        </td>
                                        <div class="row">

                                            <td class="align-items-center text-center">
                                                <form onsubmit="return confirm('Thanks You🎈');"
                                                    action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ route('posts.show', $post->id) }}"
                                                        class="btn btn-sm btn-dark">Show</a>
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-sm btn-primary">Edit Buku</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete
                                                        Buku:</button>
                                                    <a href="{{ asset('storage/' . $post->image) }}"
                                                        class=" btn btn-sm btn-primary">Download</a>
                                                </form>
                                            </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Datatbl --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    {{-- end tables --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error')) toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

    <script>
        new DataTable('#data');
    </script>
    @include('footer.inclaude')
</body>

</html>
