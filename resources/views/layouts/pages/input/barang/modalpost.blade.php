<!-- Modal 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input barang</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="{{ route('input-jual') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row-4">
                        <label class="form-label">Barang</label>
                        <select class="form-select" aria-label="Default select example" name="barang" id="barangSelect" required>
                            <option selected>Pilih Barang</option>
                            @foreach ($brngb as $n)
                                <option value="{{ $n->id }}" data-stok="{{ $n->stok }}" data-harga_b="{{ $n->harga->harga_b }}">{{ $n->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="hargaBeli" name="harga_b" disabled>
                    </div>

                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Untung (%)</label>
                        <input type="number" class="form-control" id="validationDefault01" name="untung" placeholder="Dalam jumlah persen..." required max="100">
                    </div>

                    <div class="row-4">
                        <label for="validationDefault01" class="form-label">Jumlah <small id="stokLabel">max:</small></label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Jangan input nilai melebihi batas max" required>
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
<script>
    // Tambahkan event listener ke elemen select
    document.getElementById('barangSelect').addEventListener('change', function () {
        // Ambil nilai harga dan stok dari data-* attribute pada elemen option yang dipilih
        var selectedOption = this.options[this.selectedIndex];
        var hargaBeli = selectedOption.getAttribute('data-harga_b');
        var stok = selectedOption.getAttribute('data-stok');

        stok = stok === null ? 0 : stok;

        // Update nilai input harga beli dan stok
        document.getElementById('hargaBeli').value = hargaBeli;
        document.getElementById('stokLabel').textContent = 'max:' +' '+stok;
    });
</script>
