@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
@section('content')
@include('partials.alert')
<div class="body flex-grow-1 px-3" style="overflow-y: auto;">
    <div class="container-lg">
        <div class="card mb-4" style="max-height: 900px; overflow-y: auto;">
            <div class="card-body">
                <h1 class="mt-3 mb-4">Detail Barang</h1>

                    @if(isset($barang))
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th style="width: 30%">Nama</th>
                                        <td>{{ $barang->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>User</th>
                                        <td>{{ $barang->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>{{ $barang->kategori->nama }}</td>
                                    </tr>
                                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                                </table>

                                <div class="mt-4">
                                    <p class="fw-bold">Deskripsi:</p>
                                    <p>{!! nl2br(e($barang->deskripsi)) !!}</p>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('beli-barang', ['id' => $barang->id]) }}" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/gambar_barang/' . $barang->gambar->nama_gambar_barang) }}" class="img-fluid rounded" alt="Product Image">
                            </div>
                        </div>
                    @else
                        <p class="mt-3">Barang tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
