@if ($errors->any())
<div id="errorAlert" class="position-fixed top-0 end-0 p-3 mt-5" style="z-index: 9999; animation: slideInRight 0.5s ease-out;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 500px; max-height: 80px;">
        <strong>Error!</strong> {{ $errors->first() }}
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if (session('success'))
<div id="successAlert" class="position-fixed top-0 end-0 p-3 mt-5" style="z-index: 9999; animation: slideInRight 0.5s ease-out;">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 500px; max-height: 80px;">
        <strong>Selamat!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
