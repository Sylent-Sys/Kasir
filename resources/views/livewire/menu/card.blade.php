<div class="col-4 mb-3">
    <div class="card">
        <img src="{{ App\Helpers\Globals::check_image_path($menu->gambar) }}" class="card-img-top" alt="gambar" height="200px">
        <div class="card-body">
            <h5 class="card-title">{{ $menu->nama }}</h5>
            <p>
                <span>Harga : {{ App\Helpers\Globals::rupiah($menu->harga) }}</span><br>
                <span>Stok : {{ $menu->stok }}</span><br>
                {{ $menu->deskripsi }}
            </p>
            <a href="{{ route('menu.edit',$menu->id) }}" class="btn btn-primary">Edit</a>
            <a wire:click="delete({{ $menu->id }})" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
