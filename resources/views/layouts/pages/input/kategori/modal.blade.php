<!-- Modal Input Kategori -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="{{ route('input-kategori') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="validationDefault01" name="nama" placeholder="masukkan nama kategori..." required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name="gambar" id="formFile"
                            onchange="showRemoveIcon()" placeholder="Masukkan gambar...">
                    </div>

                    <div id="previewContainer" class="card mx-auto">
                        <div id="button">
                            <span id="removeIcon" onclick="cancelFile()">×</span>
                        </div>
                        <img id="imagePreview" src="#" alt="Preview">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><svg class="nav-icon" width="15" height="15">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-save') }}"></use>
                    </svg></button>
                </div>
            </form>
        </div>
    </div>
</div>
