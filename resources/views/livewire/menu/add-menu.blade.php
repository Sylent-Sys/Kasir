<div>
    @include('layouts.title',['title'=>'Add Menu'])
    <form wire:submit.prevent='add'>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" wire:model.lazy='data.nama'>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" wire:model.lazy='data.harga'>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" class="form-control" wire:model.lazy='data.gambar'>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" wire:model.lazy='data.deskripsi'></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" wire:model.lazy='data.stok'>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
