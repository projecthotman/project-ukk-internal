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
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">25%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                                <p class="card-text"><small class="text-medium-emphasis">Last updated 3 mins
                                                        ago</small></p>
                                            </div><img class="card-img-bottom" src="assets/img/full.jpg" alt="">
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
