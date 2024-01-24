<div class="modal fade modal-lg" id="exampleModalShow{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Barang</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-5 text-center d-flex align-items-center" style="border: 6px solid #4f5d73;">
                        <img src="{{ asset('storage/gambar_barang/' . $b->gambar->nama_gambar_barang) }}" class="img-fluid rounded mx-auto" alt="Product Image" style="width: 350px; height: 350px;">
                    </div>

                    <!-- Details Column -->
                    <div class="col-md-7">
                        <h4 class="fw-bold mb-4 mt-4">{{ $b->nama }}</h4>
                        <p class="fw-bold text-primary">Rp. {{ number_format($b->harga->harga_b, 0, ',', '.') }}</p>
                        <p><strong>Kategori:</strong> {{ $b->kategori->nama }}</p>
                        <p><strong>Stok:</strong> {{ $b->stok }}</p>
                        <p><strong>Status:</strong> {{ $b->status }}</p>
                    </div>
                </div>

                <!-- Description Row -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5 class="fw-bold mt-3">Deskripsi:</h5>
                        <p class="text-justify">{!! nl2br(e($b->deskripsi)) !!}</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="d-flex justify-content-end">
                            <div>
                                <p class="text-end">{{ $b->created_at->format('d M Y') }}</p>
                                <p class="text-end">{{ $b->created_at->format('H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
