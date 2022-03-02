<div>
    @include('layouts.title',['title'=>'Pesanan'])
    <div class="row">
        <div class="row col-9">
            @foreach ($data as $item)
                @include('livewire.menu.card',['menu'=>$item,'options'=>['pesanan'=>true]])
            @endforeach
        </div>
        <div class="col-3">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalHarga = 0;
                    @endphp
                    @foreach ($dataPesanan as $key => $value)
                        @if ($value['jumlah'] == 0 || $value['jumlah'] == '')
                            @continue
                        @endif
                        @php
                            $modelsMenu = App\Models\Menu::find($key);
                            $totalHarga += $modelsMenu->harga * $value['jumlah'];
                        @endphp
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $modelsMenu->nama }}</td>
                            <td>{{ $modelsMenu->harga * $value['jumlah'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Harga</td>
                        <td>{{ $totalHarga }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-3">
                <small>No Meja</small>
                <input class="form-control form-control-sm" type="number" wire:model='no_meja'>
            </div>
            <button class="btn btn-primary" wire:click='pesan'><i class="bi bi-cart-check"></i></button>
        </div>
    </div>
</div>
