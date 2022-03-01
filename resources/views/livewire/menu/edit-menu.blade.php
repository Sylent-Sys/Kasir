<div>
    @include('layouts.title',['title'=>'Edit Menu'])
    <form wire:submit.prevent='edit'>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" wire:model.lazy='menu.nama'>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" wire:model.lazy='menu.harga'>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" class="form-control" wire:model.lazy='gambar'>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" wire:model.lazy='menu.deskripsi'></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" wire:model.lazy='menu.stok'>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
