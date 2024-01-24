@extends('layouts.app')

@section('title', 'Enter item data')

@section('content')
@include('partials.alert')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-center flex-grow-1">Daftar Barang</h5>
                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal">
                        <svg class="nav-icon" width="15" height="15">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                        </svg>
                    </button>
                </div>
                @include('layouts.pages.input.barang.modalpost')
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1005">
                        <div class="row">
                            @foreach ($brnga as $b)
                            @include('layouts.pages.input.barang.modalShow.modalJual')
                            <!-- /.col-->
                            <div class="col-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <div class="bg-secondary  text-white p-1 me-3">
                                            @if ($b->gambar) <!-- Periksa apakah objek gambar tersedia -->
                                                <!-- Tampilkan properti jika objek gambar barang tersedia -->
                                                <img src="{{ asset('storage/gambar_barang/' . $b->gambar->nama_gambar_barang) }}" alt="Gambar Barang" height="100px" width="100px">
                                            @else
                                                <!-- Tampilkan alternatif jika objek gambar barang tidak tersedia -->
                                                <img src="{{ asset('assets/img/default.png') }}" alt="Default Image">
                                            @endif
                                        </div>
                                        <div>
                                            <div class="fs-6 fw-semibold text-primary">Rp. {{ number_format($b->harga->harga_j, 0, ',', '.') }}</div>
                                            <div class="text-medium-emphasis text-uppercase fw-semibold" style="font-size: 0.8em;">{{ Str::limit($b->nama, 35) }}</div>
                                        </div>
                                    </div>
                                    <div class="card-footer px-3 py-2"><a
                                        class="btn-block text-medium-emphasis d-flex justify-content-between align-items-center"
                                        href="#" data-coreui-toggle="modal" data-coreui-target="#exampleModalShow{{ $b->id }}"><span class="small fw-semibold">View More</span>
                                        <svg class="icon">
                                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chevron-right') }}">
                                            </use>
                                        </svg></a></div>
                                </div>
                            </div>
                            <!-- /.col-->
                            @endforeach
                        </div>
                        <!-- /.row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
