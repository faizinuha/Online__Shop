@include('navbar.post')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website</title>

    <!-- Menghubungkan CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsif.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- Tautan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .img-hover {
            transition: transform 0.3s ease;
        }

        .img-hover:hover {
            transform: scale(1.1);
        }

        .table-actions button {
            margin-right: 5px;
        }
    </style>
</head>


<body class="bg-light">

    <div class="container mt-5">
        @yield('navbar')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('home') }}" class="btn btn-danger">Kembali</a>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Buku</a>
                        </div>
                        <table class="table table-bordered" id="data">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar Buku</th>
                                    <th scope="col">Pemilik</th>
                                    <th scope="col">Nama Publish</th>
                                    <th scope="col">Tentang Buku</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="rounded img-fluid img-hover" style="width: 150px">
                                        </td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td class="text-center text-muted">{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="text-center">
                                            <div class="table-actions d-flex justify-content-center">
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark" title="Lihat Detail">
                                                    <i class="fa-solid fa-eye"></i> <!-- Perhatikan penggunaan "fa-solid" -->
                                                </a>
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary" title="Edit Buku">
                                                    <i class="fa-solid fa-edit"></i>
                                                </a>
                                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Buku">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ asset('public/storage' . $post->image) }}" class="btn btn-sm btn-success" download title="Download Gambar">
                                                    <i class="fa-solid fa-download"></i>
                                                </a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center alert alert-warning">Data Post belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghubungkan JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Ikon Font Awesome -->

    <script>
        // Menampilkan pesan dengan toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'Berhasil!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'Gagal!');
        @endif

        // Inisialisasi DataTable
        new DataTable('#data');
    </script>

    @include('footer.inclaude')
</body>

</html>
