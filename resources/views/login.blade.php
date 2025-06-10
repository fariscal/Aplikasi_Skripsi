@extends('layouts.app')

@section('content')
    <style>
        /* Background blur */
        .bg-blur {
            background: url('{{ asset('images/intikom.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            filter: blur(6px);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        /* Overlay putih semi transparan */
        .overlay {
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 20px;
            z-index: 1;
            color: white;
        }
    </style>

    <div class="position-relative">
        <!-- Background blur -->
        <div class="bg-blur"></div>

        <!-- Isi halaman -->
        <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
            <div class="row w-100 shadow-lg overlay p-0" style="max-width: 900px;">

                <!-- Gambar di sisi kiri -->
                <div class="col-md-6 d-md-block p-0">
                    <img src="{{ asset('images/itk.png') }}" alt="Login Image"
                        class="img-fluid p-2 w-75 w-md-100 h-100 object-fit-cover rounded-start mx-auto d-block">
                </div>

                <!-- Form login -->
                <div class="col-md-6 p-5">

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 px-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="form-label text-white">NIK</label>
                            <input type="text" name="nik" class="form-control" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-white">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
