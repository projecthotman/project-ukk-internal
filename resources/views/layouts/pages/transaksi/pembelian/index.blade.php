@extends('layouts.app')

@section('title', 'Transaksi/Pembelian')

@section('content')
    @include('partials.alert')
    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="card mb-4">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>JUMLAH</th>
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
                        @foreach ($barangBeli as $i)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ Str::limit($i->nama, 25) }}</td>
                                <td>{{ $i->history->jumlah }}</td>
                                <td>{{ $i->kategori->nama }}</td>
                                <td>{{ Str::limit($i->deskripsi, 40) }}</td>
                                <td>{{number_format($i->history->harga, 0, ',', '.') }}</td>
                                <td>{{ $i->created_at->translatedFormat('l - d F Y/H:i:s') }}</td>
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
                {{ $barangBeli->links() }}
            </div>
        </div>
    </div>

@endsection
