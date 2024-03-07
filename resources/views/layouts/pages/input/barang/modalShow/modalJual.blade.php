<div class="modal fade modal-lg" id="exampleModalShow{{ $b->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Barang</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center d-flex align-items-center" style="border: 6px solid #4f5d73;">
                        <img src="{{ asset('storage/gambar_barang/' . $b->gambar->nama_gambar_barang) }}"
                            class="img-fluid rounded mx-auto" alt="Product Image" style="width: 350px; height: 350px;">
                    </div>

                    <div class="col-md-7">
                        <h4 class="fw-bold mb-4 mt-4">{{ $b->nama }}</h4>
                        <p class="fw-bold text-primary">Rp. {{ number_format($b->harga->harga_j, 0, ',', '.') }}</p>
                        <p><strong>Kategori:</strong> {{ $b->kategori->nama }}</p>
                        <p><strong>Jumlah:</strong> {{ $b->stok }}</p>
                        <p><strong>Status:</strong> {{ $b->status }}</p>
                    </div>
                </div>
                <div class="row-md-12 d-flex align-items-center">
                    @if ($b->user->gambar != null)
                        <img src="{{ asset('storage/gambar/' . $b->user->gambar) }}" alt="User Image"
                            class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                    @else
                        <img src="{{ asset('assets/img/default.png') }}" alt="Default Image"
                            class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                    @endif
                    <p class="mt-3 ms-3">{{ $b->user->name }}</p>
                </div>
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
                <form action="{{ route('beli-barang', ['id' => $b->id]) }}" method="post">
                    @csrf
                    <p><strong>Jumlah:</strong> <input type="range" id="angka" name="angka" min="0"
                            max="{{ $b->stok }}">
                        <output for="angka" id="output">0</output>
                    </p>
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    @if ($b->id_user != $user_id)
                    <button type="submit" class="btn btn-primary" data-coreui-dismiss="modal">Beli</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var inputRange = document.getElementById('angka');
    var outputValue = document.getElementById('output');

    inputRange.value = {{ $b->stok }};
    outputValue.value = inputRange.value;

    inputRange.addEventListener('input', function() {
        outputValue.value = this.value;
    });
</script>
