@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center">Login</div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-danger text-center">
                            {{ $message }}
                        </div>
                    @endif

                    <form action="{{ route('authenticate') }}" method="post" id="loginForm" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <div class="valid-feedback">
                                    Looks good! <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <div class="valid-feedback">
                                    Looks good! <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info" onclick="sweetalert()">
                               Login
                            </button>
                        </div>
                        {{-- <div class="text-center" style="margin-top: 10px;">
                            <span style="margin-right: 5px;">||</span>
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function sweetalert() {
            // Menampilkan pesan sukses
            Swal.fire({
                icon: 'success',
                title: 'Login Successful!',
                showConfirmButton: false,
                timer: 1500 // Durasi pesan (dalam milidetik)
            });
        }
    </script>
    <script>
        // Menggunakan Bootstrap 5 validasi Form
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
