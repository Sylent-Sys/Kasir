<div class="col-4 mb-3">
    <div class="card">
        <img src="{{ $menu->gambar }}" class="card-img-top" alt="gambar" height="200px">
        <div class="card-body">
            <h5 class="card-title">{{ $menu->nama }}</h5>
            <p>
                <span>Harga : {{ App\Helpers\Globals::rupiah($menu->harga) }}</span><br>
                <span>Stok : {{ $menu->stok }}</span><br>
                {{ $menu->deskripsi }}
            </p>
        </div>
    </div>
</div>
