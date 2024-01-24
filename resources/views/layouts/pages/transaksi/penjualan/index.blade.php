@extends('layouts.app')

@section('title', 'Transaksi/Penjualan')

@section('content')
    @include('partials.alert')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-4">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>STOK</th>
                            <th>KATEGORI</th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th>Hari - Tanggal - Jam</th>
                            <th>SEMATKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n = 1;
                        @endphp
                        @foreach ($barangJual as $i)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ Str::limit($i->nama, 35) }}</td>
                                <td>{{ $i->stok }}</td>
                                <td>{{ $i->kategori->nama }}</td>
                                <td>{{ Str::limit($i->deskripsi, 50) }}</td>
                                <td>{{number_format($i->harga->harga_tj, 0, ',', '.') }}</td>
                                <td>{{ $i->created_at->format('l - d M Y H:i:s') }}</td>
                                <td>
                                    <button class="nav-link nav-group-toggle" type="button" style="border: none; background-color: transparent; margin-left: 25px;">
                                        <svg class="nav-icon" style="width: 20px; height: 20px;">
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $barangJual->links() }}
            </div>
        </div>
    </div>

@endsection
