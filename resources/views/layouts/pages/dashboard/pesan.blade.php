@extends('layouts.app')

@section('title', 'Pesan')

@section('content')
@include('partials.alert')
<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-body">

                <table class="table table-striped table-centered mb-0">
                    <tbody class="text-center">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="card mb-4">
                                <div class="card-body">
                                  <!-- /.row--><br>
                                  <div class="table-responsive">
                                    <table class="table border mb-0">
                                      <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                          <th class="text-center">
                                            <svg class="icon">
                                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                            </svg>
                                          </th>
                                          <th>User</th>
                                          <th class="text-center">Alamat</th>
                                          <th>Pesan</th>
                                          <th class="text-center">Metode Pembayaran</th>
                                          <th>Aksi</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        @foreach ($pesan as $i)
                                        <tr class="align-middle">
                                            <td class="text-center">
                                              <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                                            </td>
                                            <td>
                                              <div>{{ $i->user->name }}</div>
                                              <div class="small text-medium-emphasis"><span>New</span> | Registered: {{ $i->created_at }}</div>
                                            </td>
                                            <td class="text-center">
                                              <div>{{ $i->user }}</div>
                                            </td>
                                            <td>
                                              <div class="clearfix">
                                                <div class="float-start">
                                                  <div class="fw-semibold">50%</div>
                                                </div>
                                                <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                                              </div>
                                              <div class="progress progress-thin">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </td>
                                            <td class="text-center">
                                              <svg class="icon icon-xl">
                                                <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard"></use>
                                              </svg>
                                            </td>
                                            <td>
                                              <div class="small text-medium-emphasis">Last login</div>
                                              <div class="fw-semibold">10 sec ago</div>
                                            </td>
                                            <td>
                                              <div class="dropdown">
                                                <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                  </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                              </div>
                                            </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.col-->
                          </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
