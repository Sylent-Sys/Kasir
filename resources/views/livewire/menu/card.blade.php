<div class="col-md-3 col-sm-4 mb-3">
    <div class="card">
        <img src="{{ App\Helpers\Globals::check_image_path($menu->gambar) }}" class="card-img-top" alt="gambar"
            height="100px">
        <div class="card-body">
            <h6 class="card-title">{{ $menu->nama }}</h6>
            <small class="d-block">Harga : {{ App\Helpers\Globals::rupiah($menu->harga) }}</small>
            <small class="d-block">Stok : {{ $menu->stok }}</small>
            @if (Request::routeIs('menu.index'))
                <div>
                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a wire:click="delete({{ $menu->id }})" class="btn btn-sm btn-danger">Delete</a>
                </div>
            @endif
        </div>
    </div>
</div>
