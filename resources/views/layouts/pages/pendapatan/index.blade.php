@extends('layouts.app')

@section('title', 'Enter item data')

@section('content')
    @include('partials.alert')
    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header"><strong>Card</strong><span class="small ms-1">Image caps</span></div>
                <div class="card-body">
                    <p class="text-medium-emphasis small">Similar to headers and footers, cards can include top and bottom
                        “image caps”—images at the top or bottom of a card.</p>
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1016">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h5 class="card-title">SUMBER PENDAPATAN</h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">List Data</h5>
                                                <!-- Tambahkan daftar data di sini -->

                                                <!-- Contoh progress bar -->
                                                <div class="progress mt-3">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">25%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header"><strong>Chart</strong><span
                                                    class="small ms-1">Doughnut</span></div>
                                            <div class="card-body">
                                                <div class="example">
                                                    <div class="tab-content rounded-bottom">
                                                        <div class="tab-pane p-3 active preview" role="tabpanel"
                                                            id="preview-1002">
                                                            <div class="c-chart-wrapper">
                                                                <canvas id="canvas-3"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-75 mb-3 mt-4">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h4><strong>Pemasukkan</strong></h4>
                                            </div>

                                            <div class="col mt-4">
                                                <div class="row mb-3 mx-auto">
                                                    <div class="col-md-3">
                                                        <label for="show" class="form-label"><h5>Show:</h5></label>
                                                        <input type="number" class="form-control" id="show">
                                                    </div>
                                                    <div class="col-md-3 mx-auto">
                                                        <label for="search" class="form-label"><h5>Search:</h5></label>
                                                        <input type="search" class="form-control" id="search">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-end">
                                                    <span class="ms-2">entries</span>
                                                </div>

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID TRANSAKSI</th>
                                                            <th>TANGGAL</th>
                                                            <th>HARGA</th>
                                                            <th>SUMBER</th>
                                                            <th>AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $i)
                                                        <tr>
                                                            <td>{{ $i->id_transk }}</td>
                                                            <td>{{ $i->tanggal }}</td>
                                                            <td>{{ $i->harga }}</td>
                                                            <td>{{ $i->barang->user->name }}</td>
                                                            <td></td>
                                                        </tr>
                                                        @endforeach
                                                        <!-- Tambahkan baris data sesuai kebutuhan -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
