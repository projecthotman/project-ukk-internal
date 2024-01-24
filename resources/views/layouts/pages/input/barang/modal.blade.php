  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beli barang</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="{{ route('input-pembelian') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="validationDefault01" name="nama"
                            placeholder="Masukkan nama barang..." required>
                    </div>
                    <div class="row-4">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori_id" required>
                            <option selected>Buka menu pilihan ini</option>
                            @foreach ($nk as $n)
                                <option value="{{ $n->id }}">{{ $n->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name="gambar" id="formFile"
                            onchange="showRemoveIcon()" required>
                    </div>

                    <div id="previewContainer" class="card mx-auto">
                        <div id="button">
                            <span id="removeIcon" onclick="cancelFile()">×</span>
                        </div>
                        <img id="imagePreview" src="#" alt="Preview">
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="validationDefault02" name="deskripsi" placeholder="Masukkan deskripsi barang..."
                            required></textarea>
                    </div>
                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Harga per 1 barang</label>
                        <input type="number" class="form-control" id="validationDefault01" name="harga_b"
                            placeholder="note! 100rb = 100000 bukan 100.000" required>
                    </div>
                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="validationDefault01" name="stok"
                            placeholder="Jumlah barang" required>
                    </div>

                    <div>
                        <label for="formFile" class="form-label">Bukti Transaksi</label>
                        <input class="form-control" type="file" name="gambar_transaksi" id="formFile"
                            onchange="showRemoveIcon()" required>
                    </div>

                    <div id="previewContainer" class="card mx-auto">
                        <div id="button">
                            <span id="removeIcon" onclick="cancelFile()">×</span>
                        </div>
                        <img id="imagePreview" src="#" alt="Preview">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><svg class="nav-icon" width="15"
                            height="15">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-save') }}"></use>
                        </svg></button>
                </div>
            </form>
        </div>
    </div>
</div>
