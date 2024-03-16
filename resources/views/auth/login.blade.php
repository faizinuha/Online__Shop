@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center ">Login</div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-danger text-center">
                            {{ $message }}
                        </div>
                    @endif

                    <form action="{{ route('authenticate') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email
                                Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info" onclick="sweetalert()">
                                <i class="fa fa-circle" aria-hidden="true"></i> Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sweetalert() {
            // Tambahkan kode Swal.fire() di sini
            Swal.fire({
                title: "Terima kasih Silakan Masuk!",
                text: "Silakan Masuk ke dashboard",
                icon: "success"
            });
        }
    </script>
@endsection
