@extends('layouts.dashboard')

@section('content')
     <h2>Selamat datang, {{ Auth::user()->nama }}!</h2>
    <p>Ini adalah halaman dashboard untuk admin.</p>
@endsection
