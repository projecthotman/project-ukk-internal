@extends('layouts.app')

@section('title', 'Enter item data')

@section('content')
@include('partials.alert')
<div class="container mb-auto">
    <div class="card mx-auto">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title">Daftar Kategori</h5>
                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal">
                    <svg class="nav-icon" width="15" height="15">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                    </svg>
                </button>
                @include('layouts.pages.input.kategori.modal')
            </div>

            <table class="table table-striped table-centered mb-0">
                <thead class="text-center">
                    <tr>
                        <th>Icon</th>
                        <th>Nama</th>
                        <th>Digunakan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($kategori as $ctgr)
                    <tr class="table-user">
                        <td>
                            @if ($ctgr->gambar)
                                <img src="{{ asset('storage/gambar/'.$ctgr->gambar) }}" height="100px" width="150px"/>
                            @else
                                <img src="https://e7.pngegg.com/pngimages/990/965/png-clipart-prohibition-in-the-united-states-computer-icons-symbol-none-angle-sign-thumbnail.png" height="7%" width="7%"/>
                            @endif

                        </td>
                        <td>{{ $ctgr->nama }}</td>
                        <td>889</td>
                        <td class="table-action">
                            <button class="btn btn-danger btn-sm">
                                <svg class="nav-icon" width="15" height="15">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                                </svg>
                            </button>
                            <button class="btn btn-primary btn-sm">
                                <svg class="nav-icon" width="15" height="15">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                                </svg>
                            </button>
                            <button class="btn btn-primary btn-sm">
                                <svg class="nav-icon" width="15" height="15">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-low-vision') }}"></use>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
