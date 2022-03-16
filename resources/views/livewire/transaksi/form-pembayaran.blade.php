<div>
    @include('layouts.title', [
        'title' => 'Form Pembayaran',
    ])
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiDetail->transaksiItems()->get() as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->menu->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ App\Helpers\Globals::rupiah($item->menu->harga) }}</td>
                        <td>{{ App\Helpers\Globals::rupiah($item->jumlah * $item->menu->harga) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class='text-center fw-bold'>Total</td>
                    <td>{{ App\Helpers\Globals::rupiah($transaksiDetail->total) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class='text-center fw-bold'>No Meja</td>
                    <td>{{ $transaksiDetail->no_meja }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Membayar : </label>
        <div class="col-sm-10">
            <input class="form-control" type="integer" wire:model.lazy='membayar'>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Kembalian : </label>
        <div class="col-sm-10">
            @php
                if ($membayar == '') {
                    $membayar = 0;
                }
                $kembalian = $membayar - $transaksiDetail->total;
                if($kembalian < 0) {
                    $kembalian = 0;
                    $this->dispatchBrowserEvent('alert', ['type'=>'error','message'=>'Uang pembayaran kurang']);
                }
            @endphp
            <input class="form-control" type="integer" value="{{ $kembalian }}" readonly>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" wire:click='pembayaran({{ $kembalian }})'><i class="bi bi-credit-card"></i></button>
    </div>
</div>
